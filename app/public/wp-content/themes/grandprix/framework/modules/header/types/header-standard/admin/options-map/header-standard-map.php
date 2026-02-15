<?php

if ( ! function_exists( 'grandprix_mikado_get_hide_dep_for_header_standard_options' ) ) {
	function grandprix_mikado_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'grandprix_mikado_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'grandprix_mikado_header_standard_map' ) ) {
	function grandprix_mikado_header_standard_map( $parent ) {
		$hide_dep_options = grandprix_mikado_get_hide_dep_for_header_standard_options();
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'grandprix' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'grandprix' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'grandprix' ),
					'left'   => esc_html__( 'Left', 'grandprix' ),
					'center' => esc_html__( 'Center', 'grandprix' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_additional_header_menu_area_options_map', 'grandprix_mikado_header_standard_map' );
}