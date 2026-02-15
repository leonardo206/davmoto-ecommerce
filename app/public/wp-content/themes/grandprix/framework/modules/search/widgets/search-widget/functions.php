<?php

if ( ! function_exists( 'grandprix_mikado_register_search_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function grandprix_mikado_register_search_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassSearchWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_search_widget' );
}