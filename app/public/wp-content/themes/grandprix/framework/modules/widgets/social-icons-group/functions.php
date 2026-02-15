<?php

if ( ! function_exists( 'grandprix_mikado_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function grandprix_mikado_register_social_icons_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_social_icons_widget' );
}