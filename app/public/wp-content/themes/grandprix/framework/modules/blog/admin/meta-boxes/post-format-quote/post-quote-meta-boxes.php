<?php

if ( ! function_exists( 'grandprix_mikado_map_post_quote_meta' ) ) {
	function grandprix_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'grandprix' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'grandprix' ),
				'description' => esc_html__( 'Enter Quote text', 'grandprix' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'grandprix' ),
				'description' => esc_html__( 'Enter Quote author', 'grandprix' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_post_quote_meta', 25 );
}