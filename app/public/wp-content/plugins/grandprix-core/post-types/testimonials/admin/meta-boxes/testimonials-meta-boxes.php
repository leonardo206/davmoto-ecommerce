<?php

if ( ! function_exists( 'grandprix_core_map_testimonials_meta' ) ) {
	function grandprix_core_map_testimonials_meta() {
		$testimonial_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'grandprix-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'grandprix-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'grandprix-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'grandprix-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'grandprix-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'grandprix-core' ),
				'description' => esc_html__( 'Enter author name', 'grandprix-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'grandprix-core' ),
				'description' => esc_html__( 'Enter author job position', 'grandprix-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_core_map_testimonials_meta', 95 );
}