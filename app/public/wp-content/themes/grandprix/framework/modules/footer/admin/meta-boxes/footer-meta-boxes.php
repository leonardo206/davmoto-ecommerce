<?php

if ( ! function_exists( 'grandprix_mikado_map_footer_meta' ) ) {
	function grandprix_mikado_map_footer_meta() {
		
		$footer_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'grandprix_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'grandprix' ),
				'name'  => 'footer_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer For This Page', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'grandprix' ),
				'options'       => grandprix_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = grandprix_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			grandprix_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'grandprix' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'grandprix' ),
					'options'       => grandprix_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			grandprix_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'grandprix' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'grandprix' ),
					'options'       => grandprix_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			grandprix_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'grandprix' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'grandprix' ),
					'options'       => grandprix_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_top_styles_group = grandprix_mikado_add_admin_group(
				array(
					'name'        => 'footer_top_styles_group',
					'title'       => esc_html__( 'Footer Top Styles', 'grandprix' ),
					'description' => esc_html__( 'Define style for footer top area', 'grandprix' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'hide' => array(
							'mkdf_show_footer_top_meta' => 'no'
						)
					)
				)
			);
			
			$footer_top_styles_row_1 = grandprix_mikado_add_admin_row(
				array(
					'name'   => 'footer_top_styles_row_1',
					'parent' => $footer_top_styles_group
				)
			);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_top_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'grandprix' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_top_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'grandprix' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				grandprix_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_top_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'grandprix' ),
						'parent' => $footer_top_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
			
			grandprix_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'grandprix' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'grandprix' ),
					'options'       => grandprix_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_bottom_styles_group = grandprix_mikado_add_admin_group(
				array(
					'name'        => 'footer_bottom_styles_group',
					'title'       => esc_html__( 'Footer Bottom Styles', 'grandprix' ),
					'description' => esc_html__( 'Define style for footer bottom area', 'grandprix' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'hide' => array(
							'mkdf_show_footer_bottom_meta' => 'no'
						)
					)
				)
			);
			
			$footer_bottom_styles_row_1 = grandprix_mikado_add_admin_row(
				array(
					'name'   => 'footer_bottom_styles_row_1',
					'parent' => $footer_bottom_styles_group
				)
			);
			
				grandprix_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_bottom_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'grandprix' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_bottom_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'grandprix' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				grandprix_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_bottom_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'grandprix' ),
						'parent' => $footer_bottom_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_footer_meta', 70 );
}