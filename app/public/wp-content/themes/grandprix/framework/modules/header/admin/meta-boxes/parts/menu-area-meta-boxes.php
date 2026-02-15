<?php

if ( ! function_exists( 'grandprix_mikado_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function grandprix_mikado_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'grandprix_mikado_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'grandprix_mikado_header_menu_area_meta_options_map' ) ) {
	function grandprix_mikado_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = grandprix_mikado_get_hide_dep_for_header_menu_area_meta_boxes();
		
		$menu_area_container = grandprix_mikado_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'grandprix' )
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'grandprix' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'grandprix' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = grandprix_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'grandprix' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'grandprix' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'grandprix' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'grandprix' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'grandprix' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'grandprix' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'grandprix' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'grandprix' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = grandprix_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'grandprix' ),
				'description' => esc_html__( 'Set border color for grid area', 'grandprix' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'grandprix' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'grandprix' ),
				'parent'      => $menu_area_container
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'grandprix' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'grandprix' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'grandprix' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'grandprix' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'grandprix' ),
				'description'   => esc_html__( 'Set border on menu area', 'grandprix' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = grandprix_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'grandprix' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'grandprix' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);

		grandprix_mikado_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'mkdf_menu_area_height_meta',
				'label'       => esc_html__( 'Height', 'grandprix' ),
				'description' => esc_html__( 'Enter header height', 'grandprix' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px', 'grandprix' )
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'mkdf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Padding', 'grandprix' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area padding', 'grandprix' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'grandprix' )
				)
			)
		);
		
		do_action( 'grandprix_mikado_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'grandprix_mikado_action_header_menu_area_meta_boxes_map', 'grandprix_mikado_header_menu_area_meta_options_map', 10, 1 );
}