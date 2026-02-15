<?php

if ( ! function_exists( 'grandprix_mikado_include_blog_shortcodes' ) ) {
	function grandprix_mikado_include_blog_shortcodes() {
		foreach ( glob( GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( grandprix_mikado_is_plugin_installed( 'core' ) ) {
		add_action( 'grandprix_core_action_include_shortcodes_file', 'grandprix_mikado_include_blog_shortcodes' );
	}
}
