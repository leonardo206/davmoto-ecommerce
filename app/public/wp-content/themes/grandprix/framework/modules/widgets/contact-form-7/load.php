<?php

if ( grandprix_mikado_is_plugin_installed( 'contact-form-7' ) ) {
	include_once GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_cf7_widget' );
}

if ( ! function_exists( 'grandprix_mikado_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function grandprix_mikado_register_cf7_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassContactForm7Widget';
		
		return $widgets;
	}
}