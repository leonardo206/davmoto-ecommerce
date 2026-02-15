<?php

if ( ! function_exists( 'grandprix_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function grandprix_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_image_gallery_widget' );
}