<?php

if ( ! function_exists( 'grandprix_mikado_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function grandprix_mikado_register_social_icon_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_social_icon_widget' );
}