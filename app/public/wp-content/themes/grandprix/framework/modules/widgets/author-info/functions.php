<?php

if ( ! function_exists( 'grandprix_mikado_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function grandprix_mikado_register_author_info_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_author_info_widget' );
}