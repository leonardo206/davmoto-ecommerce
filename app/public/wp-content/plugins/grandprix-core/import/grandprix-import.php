<?php

if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

class GrandPrixCoreImport {
	/**
	 * @var instance of current class
	 */
	private static $instance;
	
	/**
	 * Name of folder where revolution slider will stored
	 * @var string
	 */
	private $revSliderFolder;
	
	/**
	 *
	 * URL where are import files
	 * @var string
	 */
	private $importURI;
	
	/**
	 * @return GrandPrixCoreImport
	 */
	public static function getInstance() {
		if ( self::$instance === null ) {
			return new self();
		}
		
		return self::$instance;
	}
	
	public $message = "";
	public $attachments = false;
	
	function __construct() {
		$this->revSliderFolder = 'mkdf-rev-sliders';
		$this->importURI       = defined( 'GRANDPRIX_MIKADO_PROFILE_SLUG' ) ? 'http://export.' . GRANDPRIX_MIKADO_PROFILE_SLUG . '-themes.com/' : '';
		
		add_action( 'admin_menu', array( &$this, 'mkdf_admin_import' ) );
		add_action( 'admin_menu', array( &$this, 'mkdf_register_theme_settings' ), 20 ); // permission 20 is set in order to mkdf_register_theme_settings be after the mkdf_admin_import
	}
	
	function mkdf_register_theme_settings() {
		register_setting( 'mkdf_options_import_page', 'mkdf_options_import' );
	}
	
	public function import_content( $file ) {
		ob_start();
		require_once( GRANDPRIX_CORE_ABS_PATH . '/import/class.wordpress-importer.php' );
		$grandprix_import = new WP_Import();
		set_time_limit( 0 );
		
		$grandprix_import->fetch_attachments = $this->attachments;
		$returned_value                  = $grandprix_import->import( $file );
		
		if ( is_wp_error( $returned_value ) ) {
			$this->message = esc_html__( 'An Error Occurred During Import', 'grandprix-core' );
		} else {
			$this->message = esc_html__( 'Content imported successfully', 'grandprix-core' );
		}
		
		ob_get_clean();
	}
	
	public function import_widgets( $file, $file2 ) {
		$this->import_custom_sidebars( $file2 );
		$options = $this->file_options( $file );
		
		foreach ( (array) $options['widgets'] as $grandprix_widget_id => $grandprix_widget_data ) {
			update_option( 'widget_' . $grandprix_widget_id, $grandprix_widget_data );
		}
		
		$this->import_sidebars_widgets( $file );
		$this->message = esc_html__( 'Widgets imported successfully', 'grandprix-core' );
	}
	
	public function import_sidebars_widgets( $file ) {
		$grandprix_sidebars = get_option( "sidebars_widgets" );
		unset( $grandprix_sidebars['array_version'] );
		$data = $this->file_options( $file );
		
		if ( is_array( $data['sidebars'] ) ) {
			$grandprix_sidebars = array_merge( (array) $grandprix_sidebars, (array) $data['sidebars'] );
			unset( $grandprix_sidebars['wp_inactive_widgets'] );
			$grandprix_sidebars                  = array_merge( array( 'wp_inactive_widgets' => array() ), $grandprix_sidebars );
			$grandprix_sidebars['array_version'] = 2;
			wp_set_sidebars_widgets( $grandprix_sidebars );
		}
	}
	
	public function import_custom_sidebars( $file ) {
		$options = $this->file_options( $file );
		update_option( 'mkdf_sidebars', $options );
		$this->message = esc_html__( 'Custom sidebars imported successfully', 'grandprix-core' );
	}
	
	public function import_options( $file ) {
		$options       = $this->file_options( $file );
		$result        = update_option( 'mkdf_options_grandprix', $options );
		$this->message = esc_html__( 'Options imported successfully', 'grandprix-core' );
	}
	
	public function import_menus( $file ) {
		global $wpdb;
		
		$menus_data = $this->file_options( $file );
		$menu_array       = array();
		$terms_table      = $wpdb->prefix . "terms";
		
		foreach ( $menus_data as $registered_menu => $menu_slug ) {
			$term_rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$terms_table} where slug=%s", $menu_slug ), ARRAY_A );
			
			if ( isset( $term_rows[0]['term_id'] ) ) {
				$term_id_by_slug = $term_rows[0]['term_id'];
			} else {
				$term_id_by_slug = null;
			}
			
			$menu_array[ $registered_menu ] = $term_id_by_slug;
		}
		
		set_theme_mod( 'nav_menu_locations', array_map( 'absint', $menu_array ) );
	}
	
	public function import_settings_pages( $file ) {
		$pages = $this->file_options( $file );
		
		foreach ( $pages as $grandprix_page_option => $grandprix_page_id ) {
			update_option( $grandprix_page_option, $grandprix_page_id );
		}
	}
	
	public function rev_sliders() {
		$rev_sldiers = array(
			'landing.zip',
			'landing-inner-1.zip',
			'main-home.zip',
			'main-home-inner-1.zip',
			'main-home-inner-2.zip',
			'motorcycle-home.zip',
			'motorcycle-home-inner.zip',
			'motorcycle-shop.zip',
			'product-showcase.zip'
		);

		return $rev_sldiers;
	}
	
	public function create_rev_slider_files( $folder ) {
		$rev_list = $this->rev_sliders();
		$dir_name = $this->revSliderFolder;
		
		$upload     = wp_upload_dir();
		$upload_dir = $upload['basedir'];
		$upload_dir = $upload_dir . '/' . $dir_name;
		if ( ! is_dir( $upload_dir ) ) {
			mkdir( $upload_dir, 0700 );
			mkdir( $upload_dir . '/' . $folder, 0700 );
		}
		
		foreach ( $rev_list as $rev_slider ) {
			file_put_contents( WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . '/' . $rev_slider, file_get_contents( $this->importURI . $folder . '/revslider/' . $rev_slider ) );
		}
	}
	
	public function rev_slider_import( $folder ) {
		$this->create_rev_slider_files( $folder );
		
		$rev_sliders   = $this->rev_sliders();
		$dir_name      = $this->revSliderFolder;
		$absolute_path = __FILE__;
		$path_to_file  = explode( 'wp-content', $absolute_path );
		$path_to_wp    = $path_to_file[0];
		
		require_once( $path_to_wp . '/wp-load.php' );
		require_once( $path_to_wp . '/wp-includes/functions.php' );
		require_once( $path_to_wp . '/wp-admin/includes/file.php' );
		
		$rev_slider_instance = new RevSlider();
		
		foreach ( $rev_sliders as $rev_slider ) {
			$nf = WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . '/' . $rev_slider;
			$rev_slider_instance->importSliderFromPost( true, true, $nf );
		}
	}
	
	public function file_options( $file ) {
		$file_content = $this->mkdf_file_contents( $file );
		
		if ( $file_content ) {
			$unserialized_content = unserialize( base64_decode( $file_content ) );
			
			if ( $unserialized_content ) {
				return $unserialized_content;
			}
		}
		
		return false;
	}
	
	function mkdf_file_contents( $path ) {
		$url      = $this->importURI . $path;
		$response = wp_remote_get( $url );
		$body     = wp_remote_retrieve_body( $response );
		
		return $body;
	}
	
	function mkdf_admin_import() {
		if ( grandprix_core_theme_installed() ) {
			global $grandprix_mikado_global_Framework;
			
			$slug           = "_tabimport";
			$pagehook = add_submenu_page(
                GRANDPRIX_MIKADO_OPTIONS_SLUG,
				esc_html__( 'GrandPrix Options - GrandPrix Import', 'grandprix-core' ), // The value used to populate the browser's title bar when the menu page is active
				esc_html__( 'Import', 'grandprix-core' ),                     // The text of the menu in the administrator's sidebar
				'edit_theme_options',                                          // What roles are able to access the menu
                GRANDPRIX_MIKADO_OPTIONS_SLUG . $slug,                  // The ID used to bind submenu items to this menu
				array( $grandprix_mikado_global_Framework->getSkin(), 'renderImport' )
			);
			
			add_action( 'admin_print_scripts-' . $pagehook, 'grandprix_mikado_enqueue_admin_scripts' );
			add_action( 'admin_print_styles-' . $pagehook, 'grandprix_mikado_enqueue_admin_styles' );
		}
	}
	
	function mkdf_update_meta_fields_after_import( $folder ) {
		global $wpdb;
		
		$url       = esc_url( home_url( '/' ) );
		$demo_urls = $this->mkdf_import_get_demo_urls( $folder );
		
		foreach ( $demo_urls as $demo_url ) {
			$sql_query   = "SELECT meta_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key LIKE 'mkdf%' AND meta_value LIKE '" . esc_url( $demo_url ) . "%';";
			$meta_values = $wpdb->get_results( $sql_query );
			
			if ( ! empty( $meta_values ) ) {
				foreach ( $meta_values as $meta_value ) {
					$new_value = $this->mkdf_recalc_serialized_lengths( str_replace( $demo_url, $url, $meta_value->meta_value ) );
					
					$wpdb->update( $wpdb->postmeta,	array( 'meta_value' => $new_value ), array( 'meta_id' => $meta_value->meta_id )	);
				}
			}
		}
	}
	
	function mkdf_update_options_after_import( $folder ) {
		$url       = esc_url( home_url( '/' ) );
		$demo_urls = $this->mkdf_import_get_demo_urls( $folder );
		
		foreach ( $demo_urls as $demo_url ) {
			$global_options    = get_option( 'mkdf_options_grandprix' );
			$new_global_values = str_replace( $demo_url, $url, $global_options );
			
			update_option( 'mkdf_options_grandprix', $new_global_values );
		}
	}
	
	function mkdf_import_get_demo_urls( $folder ) {
		$demo_urls  = array();
		$domain_url = defined( 'GRANDPRIX_MIKADO_PROFILE_SLUG' ) ? str_replace( '/', '', $folder ) . '.' . GRANDPRIX_MIKADO_PROFILE_SLUG . '-themes.com/' : '';
		
		$demo_urls[] = ! empty( $domain_url ) ? 'http://' . $domain_url : '';
		$demo_urls[] = ! empty( $domain_url ) ? 'https://' . $domain_url : '';
		
		return $demo_urls;
	}
	
	function mkdf_recalc_serialized_lengths( $sObject ) {
        $ret = preg_replace_callback( '!s:(\d+):"(.*?)";!', array($this, 'mkdf_recalc_serialized_lengths_callback'), $sObject );
		
		return $ret;
	}
	
	function mkdf_recalc_serialized_lengths_callback( $matches ) {
		return "s:" . strlen( $matches[2] ) . ":\"$matches[2]\";";
	}
}