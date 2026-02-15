<?php

if ( ! function_exists( 'grandprix_mikado_map_woocommerce_meta' ) ) {
	function grandprix_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'grandprix' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'grandprix' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'grandprix' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'grandprix' ),
					'small'              => esc_html__( 'Small', 'grandprix' ),
					'large-width'        => esc_html__( 'Large Width', 'grandprix' ),
					'large-height'       => esc_html__( 'Large Height', 'grandprix' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'grandprix' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'grandprix' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'grandprix' ),
				'options'       => grandprix_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'grandprix' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_woocommerce_meta', 99 );
}