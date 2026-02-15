<?php

if ( ! function_exists( 'grandprix_mikado_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function grandprix_mikado_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_recent_posts_widget' );
}