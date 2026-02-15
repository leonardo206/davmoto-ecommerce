<?php

if ( ! function_exists( 'grandprix_core_include_reviews_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function grandprix_core_include_reviews_shortcodes_files() {
		foreach ( glob( GRANDPRIX_CORE_ABS_PATH . '/reviews/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	add_action( 'grandprix_core_action_include_shortcodes_file', 'grandprix_core_include_reviews_shortcodes_files' );
}