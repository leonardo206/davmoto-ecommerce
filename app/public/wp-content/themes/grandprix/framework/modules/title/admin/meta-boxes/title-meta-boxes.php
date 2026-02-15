<?php

if ( ! function_exists( 'grandprix_mikado_get_title_types_meta_boxes' ) ) {
	function grandprix_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'grandprix_mikado_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'grandprix' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'grandprix_mikado_map_title_meta' ) ) {
	function grandprix_mikado_map_title_meta() {
		$title_type_meta_boxes = grandprix_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'grandprix_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post', 'product' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'grandprix' ),
				'name'  => 'title_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'grandprix' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'grandprix' ),
				'parent'        => $title_meta_box,
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = grandprix_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'grandprix' ),
						'description'   => esc_html__( 'Choose title type', 'grandprix' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'grandprix' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'grandprix' ),
						'options'       => grandprix_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'grandprix' ),
						'description' => esc_html__( 'Set a height for Title Area', 'grandprix' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);

				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_mobile_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height on Mobile', 'grandprix' ),
						'description' => esc_html__( 'Set a height for Title Area on Mobile', 'grandprix' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);

				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Title Width', 'grandprix' ),
						'description' => esc_html__( 'Set a width for Title Area', 'grandprix' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => '%'
						)
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_border_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Border', 'grandprix' ),
						'description' => esc_html__( 'Set border width for Title Area', 'grandprix' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_border_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Border Color', 'grandprix' ),
						'description' => esc_html__( 'Choose a border color for Title Area', 'grandprix' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'grandprix' ),
						'description' => esc_html__( 'Choose a background color for title area', 'grandprix' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'grandprix' ),
						'description' => esc_html__( 'Choose an Image for title area', 'grandprix' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_hide_on_mobile_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Hide Background Image On Mobile', 'grandprix' ),
						'description'   => esc_html__( 'Hide background image for Title Area on mobile', 'grandprix' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => grandprix_mikado_get_yes_no_select_array()
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'grandprix' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'grandprix' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'grandprix' ),
							'hide'                => esc_html__( 'Hide Image', 'grandprix' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'grandprix' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'grandprix' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'grandprix' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'grandprix' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'grandprix' )
						)
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'grandprix' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'grandprix' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'grandprix' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'grandprix' ),
							'window-top'    => esc_html__( 'From Window Top', 'grandprix' )
						)
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'grandprix' ),
						'options'       => grandprix_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'grandprix' ),
						'description' => esc_html__( 'Choose a color for title text', 'grandprix' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'grandprix' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'grandprix' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'grandprix' ),
						'options'       => grandprix_mikado_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'grandprix' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'grandprix' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'grandprix_mikado_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_title_meta', 60 );
}