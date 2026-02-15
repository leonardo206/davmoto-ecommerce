<?php

if ( ! function_exists( 'grandprix_core_reviews_map' ) ) {
	function grandprix_core_reviews_map() {
		
		$reviews_panel = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'grandprix-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'grandprix-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'grandprix-core' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'grandprix-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'grandprix-core' ),
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_additional_page_options_map', 'grandprix_core_reviews_map', 75 ); //one after elements
}