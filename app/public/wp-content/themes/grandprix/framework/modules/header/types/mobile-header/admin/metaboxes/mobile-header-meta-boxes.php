<?php

if ( ! function_exists( 'grandprix_mikado_mobile_menu_meta_box_map' ) ) {
	function grandprix_mikado_mobile_menu_meta_box_map($header_meta_box) {

		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $header_meta_box,
				'name'   => 'header_mobile',
				'title'  => esc_html__( 'Mobile Header in Grid', 'grandprix' )
			)
		);

		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_mobile_header_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Mobile Header in Grid', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will put mobile header in grid', 'grandprix' ),
				'parent'        => $header_meta_box,
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);

		$mobile_header_without_grid_container = grandprix_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'mobile_header_without_grid_container',
				'dependency' => array(
					'show' => array(
						'mkdf_mobile_header_in_grid_meta' => 'no'
					)
				)
			)
		);

		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_mobile_header_without_grid_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Header Padding', 'grandprix' ),
				'description' => esc_html__( 'Set padding for Mobile Header', 'grandprix' ),
				'parent'      => $mobile_header_without_grid_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);


	}
	
	add_action( 'grandprix_mikado_action_header_mobile_menu_meta_boxes_map', 'grandprix_mikado_mobile_menu_meta_box_map', 10 );
}