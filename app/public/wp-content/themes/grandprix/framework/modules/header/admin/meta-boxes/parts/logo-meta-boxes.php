<?php

if ( ! function_exists( 'grandprix_mikado_logo_meta_box_map' ) ) {
	function grandprix_mikado_logo_meta_box_map() {
		
		$logo_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'grandprix_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'grandprix' ),
				'name'  => 'logo_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'grandprix' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'grandprix' ),
				'parent'      => $logo_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'grandprix' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'grandprix' ),
				'parent'      => $logo_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'grandprix' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'grandprix' ),
				'parent'      => $logo_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'grandprix' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'grandprix' ),
				'parent'      => $logo_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'grandprix' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'grandprix' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_logo_meta_box_map', 47 );
}