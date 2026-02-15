<?php

if ( ! function_exists( 'grandprix_mikado_sticky_header_meta_boxes_options_map' ) ) {
	function grandprix_mikado_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = grandprix_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);

		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_sticky_header_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Sticky Header in Grid', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will put sticky header in grid', 'grandprix' ),
				'parent'        => $header_meta_box,
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'grandprix' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'grandprix' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$grandprix_custom_sidebars = grandprix_mikado_get_custom_sidebars();
		if ( is_array( $grandprix_custom_sidebars ) && count( $grandprix_custom_sidebars ) > 0 ) {
			grandprix_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'grandprix' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area', 'grandprix' ),
					'parent'      => $header_meta_box,
					'options'     => $grandprix_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'mkdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'grandprix_mikado_action_additional_header_area_meta_boxes_map', 'grandprix_mikado_sticky_header_meta_boxes_options_map', 8 );
}