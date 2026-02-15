<?php

if ( ! function_exists( 'grandprix_mikado_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function grandprix_mikado_register_icon_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_icon_widget' );
}