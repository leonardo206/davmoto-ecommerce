<?php

if ( ! function_exists( 'grandprix_mikado_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function grandprix_mikado_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'grandprix' );
		
		return $type;
	}
	
	add_filter( 'grandprix_mikado_filter_title_type_global_option', 'grandprix_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'grandprix_mikado_filter_title_type_meta_boxes', 'grandprix_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
}