<?php

if ( ! function_exists( 'grandprix_core_load_widget_class' ) ) {
	/**
	 * Loades widget class file.
	 */
	function grandprix_core_load_widget_class() {
		include_once 'widget-class.php';
	}
	
	add_action( 'grandprix_mikado_action_before_options_map', 'grandprix_core_load_widget_class' );
}

if ( ! function_exists( 'grandprix_core_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to grandprix_mikado_action_after_options_map action
	 */
	function grandprix_core_load_widgets() {
		
		if ( grandprix_core_theme_installed() ) {
			foreach ( glob( GRANDPRIX_MIKADO_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
				include_once $widget_load;
			}
		}
		
		include_once 'widget-loader.php';
	}
	
	add_action( 'grandprix_mikado_action_before_options_map', 'grandprix_core_load_widgets' );
}