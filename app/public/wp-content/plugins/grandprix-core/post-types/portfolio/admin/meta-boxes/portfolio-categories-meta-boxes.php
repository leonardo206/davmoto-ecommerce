<?php

if ( ! function_exists( 'grandprix_mikado_portfolio_category_additional_fields' ) ) {
	function grandprix_mikado_portfolio_category_additional_fields() {
		
		$fields = grandprix_mikado_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		grandprix_mikado_add_taxonomy_field(
			array(
				'name'   => 'mkdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'grandprix-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_custom_taxonomy_fields', 'grandprix_mikado_portfolio_category_additional_fields' );
}