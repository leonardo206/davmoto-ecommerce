<?php

if ( ! function_exists( 'grandprix_mikado_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function grandprix_mikado_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'GrandPrixMikadoNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'grandprix_mikado_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function grandprix_mikado_init_register_header_standard_type() {
		add_filter( 'grandprix_mikado_filter_register_header_type_class', 'grandprix_mikado_register_header_standard_type' );
	}
	
	add_action( 'grandprix_mikado_action_before_header_function_init', 'grandprix_mikado_init_register_header_standard_type' );
}