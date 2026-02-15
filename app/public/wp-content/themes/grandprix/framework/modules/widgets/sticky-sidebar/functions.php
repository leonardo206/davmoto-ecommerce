<?php

if ( ! function_exists( 'grandprix_mikado_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function grandprix_mikado_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_sticky_sidebar_widget' );
}