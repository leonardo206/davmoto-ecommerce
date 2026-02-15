<?php

if ( ! function_exists( 'grandprix_mikado_map_post_link_meta' ) ) {
	function grandprix_mikado_map_post_link_meta() {
		$link_post_format_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'grandprix' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'grandprix' ),
				'description' => esc_html__( 'Enter link', 'grandprix' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_post_link_meta', 24 );
}