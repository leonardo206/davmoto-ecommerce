<?php

if ( ! function_exists( 'grandprix_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function grandprix_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_separator_widget' );
}