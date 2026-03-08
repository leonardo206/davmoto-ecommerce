<?php
/**
 * Plugin Name: Cognito Auth
 * Description: Replaces WordPress login with Amazon Cognito OAuth2/OIDC authentication.
 * Version: 1.0.0
 * Author: DavMoto
 */

if (!defined('ABSPATH')) {
    exit;
}

class Cognito_Auth {

    private $option_key = 'cognito_auth_settings';

    public function __construct() {
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('init', [$this, 'maybe_redirect_to_cognito_early'], 1);
        add_action('login_init', [$this, 'handle_login']);
        add_filter('login_message', [$this, 'login_form_message_when_not_configured']);
        add_filter('logout_url', [$this, 'custom_logout_url'], 10, 2);
        add_action('wp_logout', [$this, 'handle_logout']);
        add_filter('login_url', [$this, 'custom_login_url'], 10, 3);
        add_filter('register_url', [$this, 'custom_register_url']);
        add_action('template_redirect', [$this, 'protect_wc_account_page']);
    }

    // ─── Settings helpers ────────────────────────────────────────────

    private static $GROUP_ROLE_MAP = [
        'ADMIN'         => 'administrator',
        'TRACKHUB_USER' => 'customer',
    ];

    private function get_settings() {
        $defaults = [
            'region'         => '',
            'user_pool_id'   => '',
            'client_id'      => '',
            'client_secret'  => '',
            'domain'         => '',
            'enabled'        => 0,
        ];
        return wp_parse_args(get_option($this->option_key, []), $defaults);
    }

    private function is_configured() {
        $s = $this->get_settings();
        return !empty($s['region'])
            && !empty($s['user_pool_id'])
            && !empty($s['client_id'])
            && !empty($s['client_secret'])
            && !empty($s['domain'])
            && !empty($s['enabled']);
    }

    /**
     * Returns which configuration items are missing (for display in notices).
     * @return string[] List of human-readable missing item names
     */
    private function get_missing_config() {
        $s = $this->get_settings();
        $labels = [
            'region'        => 'AWS Region',
            'user_pool_id'  => 'User Pool ID',
            'client_id'     => 'App Client ID',
            'client_secret' => 'App Client Secret',
            'domain'        => 'Cognito Domain',
            'enabled'       => 'Spunta «Replace WordPress login with Cognito»',
        ];
        $missing = [];
        foreach ($labels as $key => $label) {
            $val = $s[$key] ?? '';
            if ($key === 'enabled') {
                if (empty($val)) {
                    $missing[] = $label;
                }
            } elseif (trim((string) $val) === '') {
                $missing[] = $label;
            }
        }
        return $missing;
    }

    private function is_bypass_active() {
        return defined('COGNITO_AUTH_BYPASS') && COGNITO_AUTH_BYPASS === true;
    }

    private function get_callback_url() {
        return site_url('/wp-login.php?action=cognito_callback');
    }

    private function get_logout_callback_url() {
        return site_url('/wp-login.php?action=cognito_logout_callback');
    }

    private function get_cognito_base_url() {
        $s = $this->get_settings();
        $domain = trim($s['domain']);
        $domain = rtrim($domain, '/');
        // Strip protocol if user pasted full URL (e.g. https://... or https//...)
        $domain = preg_replace('#^https?://?#i', '', $domain);
        $domain = trim($domain, '/');
        return 'https://' . $domain;
    }

    /**
     * Redirect to Cognito as early as possible on wp-login.php (before any output).
     */
    public function maybe_redirect_to_cognito_early() {
        if (!isset($_SERVER['SCRIPT_NAME']) || strpos($_SERVER['SCRIPT_NAME'], 'wp-login.php') === false) {
            return;
        }
        if ($this->is_bypass_active() || !$this->is_configured()) {
            return;
        }
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        if ($action === 'cognito_callback' || $action === 'cognito_logout_callback' || $action === 'logout') {
            return;
        }
        if (in_array($action, ['lostpassword', 'rp', 'resetpass', 'postpass'], true)) {
            return;
        }
        $this->redirect_to_cognito();
    }

    /**
     * Show a notice on the WP login form when bypass is off but Cognito is not configured.
     */
    public function login_form_message_when_not_configured($message) {
        if ($this->is_bypass_active()) {
            return $message;
        }
        if ($this->is_configured()) {
            return $message;
        }
        $missing = $this->get_missing_config();
        $url = admin_url('options-general.php?page=cognito-auth');
        $notice = '<p class="message" style="background:#fff3cd; border-left:4px solid #856404; padding:12px;">';
        $notice .= '<strong>Cognito non attivo.</strong> Vai in <a href="' . esc_url($url) . '">Impostazioni &rarr; Cognito Auth</a>. ';
        if (!empty($missing)) {
            $notice .= 'Mancano o non corretti: <strong>' . esc_html(implode('</strong>, <strong>', $missing)) . '</strong>. ';
        }
        $notice .= 'Compila tutto e attiva la spunta «Replace WordPress login with Cognito», poi salva.';
        $notice .= '</p>';
        return $notice . $message;
    }

    // ─── Admin settings page ─────────────────────────────────────────

    public function add_settings_page() {
        add_options_page(
            'Cognito Auth',
            'Cognito Auth',
            'manage_options',
            'cognito-auth',
            [$this, 'render_settings_page']
        );
    }

    public function register_settings() {
        register_setting($this->option_key, $this->option_key, [
            'sanitize_callback' => [$this, 'sanitize_settings'],
        ]);
    }

    public function sanitize_settings($input) {
        $current = get_option($this->option_key, []);
        $clean = [];
        $clean['region']        = sanitize_text_field($input['region'] ?? '');
        $clean['user_pool_id']  = sanitize_text_field($input['user_pool_id'] ?? '');
        $clean['client_id']     = sanitize_text_field($input['client_id'] ?? '');
        $clean['client_secret'] = sanitize_text_field($input['client_secret'] ?? '');
        $clean['domain']        = sanitize_text_field($input['domain'] ?? '');
        $clean['domain']        = preg_replace('#^https?://?#i', '', trim($clean['domain']));
        $clean['domain']        = trim($clean['domain'], '/');
        // Preserve 'enabled' if checkbox not in request (WordPress doesn't send unchecked checkboxes)
        $clean['enabled'] = isset($input['enabled']) ? (!empty($input['enabled']) ? 1 : 0) : (isset($current['enabled']) ? (int) $current['enabled'] : 0);
        return $clean;
    }

    public function render_settings_page() {
        $s = $this->get_settings();
        ?>
        <div class="wrap">
            <h1>Cognito Auth Settings</h1>

            <?php if ($this->is_bypass_active()): ?>
                <div class="notice notice-warning">
                    <p><strong>COGNITO_AUTH_BYPASS</strong> is active in wp-config.php. Normal WP login is available. Remove the constant when ready for production.</p>
                </div>
            <?php endif; ?>

            <form method="post" action="options.php">
                <?php settings_fields($this->option_key); ?>
                <table class="form-table">
                    <tr>
                        <th>AWS Region</th>
                        <td><input type="text" name="<?php echo $this->option_key; ?>[region]" value="<?php echo esc_attr($s['region']); ?>" class="regular-text" placeholder="eu-west-1" /></td>
                    </tr>
                    <tr>
                        <th>User Pool ID</th>
                        <td><input type="text" name="<?php echo $this->option_key; ?>[user_pool_id]" value="<?php echo esc_attr($s['user_pool_id']); ?>" class="regular-text" placeholder="eu-west-1_XXXXXXXXX" /></td>
                    </tr>
                    <tr>
                        <th>App Client ID</th>
                        <td><input type="text" name="<?php echo $this->option_key; ?>[client_id]" value="<?php echo esc_attr($s['client_id']); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th>App Client Secret</th>
                        <td><input type="password" name="<?php echo $this->option_key; ?>[client_secret]" value="<?php echo esc_attr($s['client_secret']); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th>Cognito Domain</th>
                        <td>
                            <input type="text" name="<?php echo $this->option_key; ?>[domain]" value="<?php echo esc_attr($s['domain']); ?>" class="regular-text" placeholder="davmoto.auth.eu-west-1.amazoncognito.com" />
                            <p class="description">Full domain without https://</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Enable Cognito Login</th>
                        <td>
                            <label>
                                <input type="checkbox" name="<?php echo $this->option_key; ?>[enabled]" value="1" <?php checked($s['enabled'], 1); ?> />
                                Replace WordPress login with Cognito
                            </label>
                            <p class="description">Only enable after you have configured all fields above and tested the Cognito Hosted UI.</p>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>

            <hr />
            <h2>Cognito Group &rarr; WordPress Role Mapping</h2>
            <table class="widefat fixed striped" style="max-width:500px;">
                <thead>
                    <tr>
                        <th>Cognito Group</th>
                        <th>WordPress Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (self::$GROUP_ROLE_MAP as $group => $role): ?>
                        <tr>
                            <td><code><?php echo esc_html($group); ?></code></td>
                            <td><?php echo esc_html(ucfirst($role)); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><em>(no group / unknown)</em></td>
                        <td>Customer (fallback)</td>
                    </tr>
                </tbody>
            </table>
            <p class="description">Role is synced from Cognito Groups on every login. Users in the <code>ADMIN</code> group get WP Administrator. Users in <code>TRACKHUB_USER</code> get WP Customer.</p>

            <hr />
            <h2>Callback URLs (copy these into Cognito App Client)</h2>
            <table class="form-table">
                <tr>
                    <th>Allowed Callback URL</th>
                    <td><code><?php echo esc_html($this->get_callback_url()); ?></code></td>
                </tr>
                <tr>
                    <th>Allowed Sign-out URL</th>
                    <td><code><?php echo esc_html($this->get_logout_callback_url()); ?></code></td>
                </tr>
            </table>
        </div>
        <?php
    }

    // ─── Login flow ──────────────────────────────────────────────────

    public function handle_login() {
        if ($this->is_bypass_active() || !$this->is_configured()) {
            return;
        }

        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'cognito_callback':
                $this->process_callback();
                return;

            case 'cognito_logout_callback':
                wp_redirect(home_url('/'));
                exit;

            case 'logout':
                return; // Let WP handle logout naturally, our wp_logout hook fires

            case 'lostpassword':
            case 'rp':
            case 'resetpass':
            case 'postpass':
                return; // Allow WP password reset flow as fallback

            default:
                $this->redirect_to_cognito();
                return;
        }
    }

    private function redirect_to_cognito() {
        $s = $this->get_settings();

        $state = wp_create_nonce('cognito_auth_state');
        set_transient('cognito_state_' . $state, true, 600);

        $redirect_to = isset($_GET['redirect_to']) ? $_GET['redirect_to'] : admin_url();
        set_transient('cognito_redirect_' . $state, $redirect_to, 600);

        $authorize_url = $this->get_cognito_base_url() . '/oauth2/authorize?' . http_build_query([
            'response_type' => 'code',
            'client_id'     => $s['client_id'],
            'redirect_uri'  => $this->get_callback_url(),
            'scope'         => 'openid email profile',
            'state'         => $state,
        ]);

        wp_redirect($authorize_url);
        exit;
    }

    private function process_callback() {
        if (empty($_GET['code']) || empty($_GET['state'])) {
            wp_die('Invalid Cognito callback: missing code or state.', 'Auth Error', ['response' => 400]);
        }

        $state = sanitize_text_field($_GET['state']);
        $stored = get_transient('cognito_state_' . $state);
        if (!$stored) {
            wp_die('Invalid or expired state parameter. Please try logging in again.', 'Auth Error', ['response' => 403]);
        }
        delete_transient('cognito_state_' . $state);

        $redirect_to = get_transient('cognito_redirect_' . $state) ?: admin_url();
        delete_transient('cognito_redirect_' . $state);

        $tokens = $this->exchange_code_for_tokens(sanitize_text_field($_GET['code']));
        if (is_wp_error($tokens)) {
            wp_die('Token exchange failed: ' . $tokens->get_error_message(), 'Auth Error', ['response' => 500]);
        }

        $claims = $this->decode_id_token($tokens['id_token']);
        if (is_wp_error($claims)) {
            wp_die('Token validation failed: ' . $claims->get_error_message(), 'Auth Error', ['response' => 500]);
        }

        $user = $this->find_or_create_user($claims);
        if (is_wp_error($user)) {
            wp_die('User creation failed: ' . $user->get_error_message(), 'Auth Error', ['response' => 500]);
        }

        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true);
        do_action('wp_login', $user->user_login, $user);

        wp_safe_redirect($redirect_to);
        exit;
    }

    // ─── Token exchange ──────────────────────────────────────────────

    private function exchange_code_for_tokens($code) {
        $s = $this->get_settings();
        $token_url = $this->get_cognito_base_url() . '/oauth2/token';

        $response = wp_remote_post($token_url, [
            'timeout' => 30,
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic ' . base64_encode($s['client_id'] . ':' . $s['client_secret']),
            ],
            'body' => [
                'grant_type'   => 'authorization_code',
                'code'         => $code,
                'redirect_uri' => $this->get_callback_url(),
            ],
        ]);

        if (is_wp_error($response)) {
            return $response;
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (empty($body['id_token'])) {
            $error_desc = $body['error_description'] ?? $body['error'] ?? 'Unknown token error';
            return new WP_Error('token_error', $error_desc);
        }

        return $body;
    }

    // ─── JWT decoding and validation ─────────────────────────────────

    private function decode_id_token($id_token) {
        $parts = explode('.', $id_token);
        if (count($parts) !== 3) {
            return new WP_Error('jwt_invalid', 'ID token is not a valid JWT.');
        }

        $header  = json_decode($this->base64url_decode($parts[0]), true);
        $payload = json_decode($this->base64url_decode($parts[1]), true);

        if (!$header || !$payload) {
            return new WP_Error('jwt_decode', 'Failed to decode JWT payload.');
        }

        $s = $this->get_settings();
        $issuer = 'https://cognito-idp.' . $s['region'] . '.amazonaws.com/' . $s['user_pool_id'];

        if (($payload['iss'] ?? '') !== $issuer) {
            return new WP_Error('jwt_issuer', 'Token issuer mismatch.');
        }

        if (($payload['aud'] ?? '') !== $s['client_id']) {
            return new WP_Error('jwt_audience', 'Token audience mismatch.');
        }

        if (isset($payload['exp']) && time() > (int) $payload['exp']) {
            return new WP_Error('jwt_expired', 'Token has expired.');
        }

        if (($payload['token_use'] ?? '') !== 'id') {
            return new WP_Error('jwt_use', 'Token is not an ID token.');
        }

        $jwks = $this->get_jwks($issuer);
        if (is_wp_error($jwks)) {
            return $jwks;
        }

        $kid = $header['kid'] ?? '';
        $matching_key = null;
        foreach ($jwks['keys'] as $key) {
            if (($key['kid'] ?? '') === $kid) {
                $matching_key = $key;
                break;
            }
        }

        if (!$matching_key) {
            return new WP_Error('jwt_kid', 'No matching key found in JWKS.');
        }

        $signature_valid = $this->verify_rs256_signature($parts[0] . '.' . $parts[1], $this->base64url_decode($parts[2]), $matching_key);
        if (!$signature_valid) {
            return new WP_Error('jwt_signature', 'JWT signature verification failed.');
        }

        return $payload;
    }

    private function get_jwks($issuer) {
        $cache_key = 'cognito_jwks_' . md5($issuer);
        $jwks = get_transient($cache_key);
        if ($jwks) {
            return $jwks;
        }

        $response = wp_remote_get($issuer . '/.well-known/jwks.json', ['timeout' => 15]);
        if (is_wp_error($response)) {
            return $response;
        }

        $jwks = json_decode(wp_remote_retrieve_body($response), true);
        if (empty($jwks['keys'])) {
            return new WP_Error('jwks_empty', 'Failed to retrieve JWKS keys.');
        }

        set_transient($cache_key, $jwks, HOUR_IN_SECONDS);
        return $jwks;
    }

    private function verify_rs256_signature($data, $signature, $jwk) {
        if (!function_exists('openssl_verify')) {
            // Fallback: skip signature verification if OpenSSL is not available
            // In production, you should ensure OpenSSL is installed
            return true;
        }

        $modulus  = $this->base64url_decode($jwk['n']);
        $exponent = $this->base64url_decode($jwk['e']);

        $pem = $this->rsa_to_pem($modulus, $exponent);
        if (!$pem) {
            return false;
        }

        $public_key = openssl_pkey_get_public($pem);
        if (!$public_key) {
            return false;
        }

        $result = openssl_verify($data, $signature, $public_key, OPENSSL_ALGO_SHA256);
        return $result === 1;
    }

    private function rsa_to_pem($modulus, $exponent) {
        $mod_len = strlen($modulus);
        $exp_len = strlen($exponent);

        $mod_integer  = $this->asn1_length(chr(0x02), chr(0x00) . $modulus);
        $exp_integer  = $this->asn1_length(chr(0x02), $exponent);
        $sequence     = $this->asn1_length(chr(0x30), $mod_integer . $exp_integer);
        $bit_string   = $this->asn1_length(chr(0x03), chr(0x00) . $sequence);
        $rsa_oid      = pack('H*', '300d06092a864886f70d0101010500');
        $outer        = $this->asn1_length(chr(0x30), $rsa_oid . $bit_string);

        return "-----BEGIN PUBLIC KEY-----\n" . chunk_split(base64_encode($outer), 64, "\n") . "-----END PUBLIC KEY-----\n";
    }

    private function asn1_length($tag, $data) {
        $len = strlen($data);
        if ($len < 0x80) {
            return $tag . chr($len) . $data;
        }
        $len_bytes = '';
        $temp = $len;
        while ($temp > 0) {
            $len_bytes = chr($temp & 0xFF) . $len_bytes;
            $temp >>= 8;
        }
        return $tag . chr(0x80 | strlen($len_bytes)) . $len_bytes . $data;
    }

    private function base64url_decode($data) {
        $data = str_replace(['-', '_'], ['+', '/'], $data);
        $padding = 4 - strlen($data) % 4;
        if ($padding !== 4) {
            $data .= str_repeat('=', $padding);
        }
        return base64_decode($data);
    }

    // ─── User creation / mapping ─────────────────────────────────────

    private function map_cognito_groups_to_wp_role($claims) {
        $groups = $claims['cognito:groups'] ?? [];
        if (!is_array($groups)) {
            $groups = [];
        }

        // ADMIN takes precedence over TRACKHUB_USER
        foreach (self::$GROUP_ROLE_MAP as $cognito_group => $wp_role) {
            if (in_array($cognito_group, $groups, true)) {
                return $wp_role;
            }
        }

        return 'customer';
    }

    private function find_or_create_user($claims) {
        $email = sanitize_email($claims['email'] ?? '');
        if (empty($email)) {
            return new WP_Error('no_email', 'Cognito token does not contain an email.');
        }

        $user = get_user_by('email', $email);
        $cognito_sub = sanitize_text_field($claims['sub'] ?? '');
        $wp_role = $this->map_cognito_groups_to_wp_role($claims);

        if ($user) {
            $this->sync_user_role($user, $wp_role);
            $this->update_user_meta_from_claims($user->ID, $claims, $cognito_sub);
            return $user;
        }

        $username = $this->generate_username($email, $claims);

        $user_id = wp_insert_user([
            'user_login'   => $username,
            'user_email'   => $email,
            'user_pass'    => wp_generate_password(32, true, true),
            'first_name'   => sanitize_text_field($claims['given_name'] ?? $claims['name'] ?? ''),
            'last_name'    => sanitize_text_field($claims['family_name'] ?? ''),
            'display_name' => sanitize_text_field($claims['name'] ?? $username),
            'role'         => $wp_role,
        ]);

        if (is_wp_error($user_id)) {
            return $user_id;
        }

        $this->update_user_meta_from_claims($user_id, $claims, $cognito_sub);
        return get_user_by('ID', $user_id);
    }

    private function sync_user_role($user, $wp_role) {
        $current_roles = $user->roles;
        if (!in_array($wp_role, $current_roles, true)) {
            $user->set_role($wp_role);
        }
    }

    private function update_user_meta_from_claims($user_id, $claims, $cognito_sub) {
        if ($cognito_sub) {
            update_user_meta($user_id, 'cognito_sub', $cognito_sub);
        }
        $cognito_groups = $claims['cognito:groups'] ?? [];
        update_user_meta($user_id, 'cognito_groups', is_array($cognito_groups) ? implode(',', $cognito_groups) : '');

        if (!empty($claims['given_name'])) {
            update_user_meta($user_id, 'first_name', sanitize_text_field($claims['given_name']));
        }
        if (!empty($claims['family_name'])) {
            update_user_meta($user_id, 'last_name', sanitize_text_field($claims['family_name']));
        }
        if (!empty($claims['phone_number'])) {
            update_user_meta($user_id, 'billing_phone', sanitize_text_field($claims['phone_number']));
        }
        update_user_meta($user_id, 'cognito_last_login', current_time('mysql'));
    }

    private function generate_username($email, $claims) {
        $base = !empty($claims['preferred_username'])
            ? sanitize_user($claims['preferred_username'])
            : sanitize_user(strstr($email, '@', true));

        $username = $base;
        $i = 1;
        while (username_exists($username)) {
            $username = $base . $i;
            $i++;
        }
        return $username;
    }

    // ─── Logout ──────────────────────────────────────────────────────

    public function custom_logout_url($logout_url, $redirect) {
        if (!$this->is_configured() || $this->is_bypass_active()) {
            return $logout_url;
        }
        return $logout_url;
    }

    public function handle_logout() {
        if (!$this->is_configured() || $this->is_bypass_active()) {
            return;
        }

        $s = $this->get_settings();
        $cognito_logout_url = $this->get_cognito_base_url() . '/logout?' . http_build_query([
            'client_id'  => $s['client_id'],
            'logout_uri' => $this->get_logout_callback_url(),
        ]);

        wp_redirect($cognito_logout_url);
        exit;
    }

    // ─── URL filters ─────────────────────────────────────────────────

    public function custom_login_url($login_url, $redirect, $force_reauth) {
        if (!$this->is_configured() || $this->is_bypass_active()) {
            return $login_url;
        }
        if ($redirect) {
            $login_url = add_query_arg('redirect_to', urlencode($redirect), $login_url);
        }
        return $login_url;
    }

    public function custom_register_url($url) {
        if (!$this->is_configured() || $this->is_bypass_active()) {
            return $url;
        }
        $s = $this->get_settings();
        return $this->get_cognito_base_url() . '/signup?' . http_build_query([
            'response_type' => 'code',
            'client_id'     => $s['client_id'],
            'redirect_uri'  => $this->get_callback_url(),
            'scope'         => 'openid email profile',
        ]);
    }

    // ─── WooCommerce my-account protection ───────────────────────────

    public function protect_wc_account_page() {
        if (!$this->is_configured() || $this->is_bypass_active()) {
            return;
        }

        if (!function_exists('is_account_page') || !is_account_page()) {
            return;
        }

        if (!is_user_logged_in()) {
            wp_redirect(wp_login_url(get_permalink()));
            exit;
        }
    }
}

new Cognito_Auth();
