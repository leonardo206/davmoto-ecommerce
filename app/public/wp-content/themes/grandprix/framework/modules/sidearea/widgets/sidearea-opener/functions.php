<?php

if ( ! function_exists( 'grandprix_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function grandprix_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_sidearea_opener_widget' );
}