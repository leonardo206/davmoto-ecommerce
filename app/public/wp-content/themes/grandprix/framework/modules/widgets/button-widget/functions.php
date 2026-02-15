<?php

if ( ! function_exists( 'grandprix_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function grandprix_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_button_widget' );
}