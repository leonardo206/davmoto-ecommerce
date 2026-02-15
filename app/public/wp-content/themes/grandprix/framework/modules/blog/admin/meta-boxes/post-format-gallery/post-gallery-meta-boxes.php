<?php

if ( ! function_exists( 'grandprix_mikado_map_post_gallery_meta' ) ) {
	
	function grandprix_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'grandprix' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		grandprix_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'grandprix' ),
				'description' => esc_html__( 'Choose your gallery images', 'grandprix' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_post_gallery_meta', 21 );
}
