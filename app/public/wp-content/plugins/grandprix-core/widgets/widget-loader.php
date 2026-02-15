<?php

if ( ! function_exists( 'grandprix_core_register_widgets' ) ) {
	function grandprix_core_register_widgets() {
		$widgets = apply_filters( 'grandprix_core_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'grandprix_core_register_widgets' );
}