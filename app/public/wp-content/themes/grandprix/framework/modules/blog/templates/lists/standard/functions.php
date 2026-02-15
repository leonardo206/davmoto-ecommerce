<?php

if ( ! function_exists( 'grandprix_mikado_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function grandprix_mikado_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'grandprix' );
		
		return $templates;
	}
	
	add_filter( 'grandprix_mikado_filter_register_blog_templates', 'grandprix_mikado_register_blog_standard_template_file' );
}

if ( ! function_exists( 'grandprix_mikado_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function grandprix_mikado_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'grandprix' );
		
		return $options;
	}
	
	add_filter( 'grandprix_mikado_filter_blog_list_type_global_option', 'grandprix_mikado_set_blog_standard_type_global_option' );
}