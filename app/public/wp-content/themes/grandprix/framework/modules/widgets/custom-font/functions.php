<?php

if ( ! function_exists( 'grandprix_mikado_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function grandprix_mikado_register_custom_font_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_custom_font_widget' );
}