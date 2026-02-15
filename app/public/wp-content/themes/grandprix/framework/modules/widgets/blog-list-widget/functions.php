<?php

if ( ! function_exists( 'grandprix_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function grandprix_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_blog_list_widget' );
}