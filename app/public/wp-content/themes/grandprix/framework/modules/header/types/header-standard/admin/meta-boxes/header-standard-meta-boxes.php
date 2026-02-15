<?php

if ( ! function_exists( 'grandprix_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function grandprix_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'grandprix_mikado_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'grandprix_mikado_header_standard_meta_map' ) ) {
	function grandprix_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = grandprix_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		grandprix_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'grandprix' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'grandprix' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'grandprix' ),
					'left'   => esc_html__( 'Left', 'grandprix' ),
					'right'  => esc_html__( 'Right', 'grandprix' ),
					'center' => esc_html__( 'Center', 'grandprix' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_additional_header_area_meta_boxes_map', 'grandprix_mikado_header_standard_meta_map' );
}