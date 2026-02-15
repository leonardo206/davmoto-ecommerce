<?php

if ( ! function_exists( 'grandprix_mikado_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function grandprix_mikado_woocommerce_options_map() {
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'grandprix' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'        => 'woo_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'grandprix' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for main shop page', 'grandprix' ),
				'options'     => grandprix_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_product_list
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'grandprix' ),
				'default_value' => 'mkdf-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'grandprix' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'grandprix' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'grandprix' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'grandprix' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'grandprix' ),
				'default_value' => 'normal',
				'options'       => grandprix_mikado_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'grandprix' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'grandprix' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'grandprix' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'grandprix' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'grandprix' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'grandprix' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'grandprix' ),
				'default_value' => 'h5',
				'options'       => grandprix_mikado_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'woo_enable_percent_sign_value',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Percent Sign', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'grandprix' ),
				'parent'        => $panel_product_list
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'grandprix' ),
				'parent'        => $panel_single_product,
				'options'       => grandprix_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'grandprix' ),
				'options'       => grandprix_mikado_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '3',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'grandprix' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'grandprix' ),
					'3' => esc_html__( 'Three', 'grandprix' ),
					'2' => esc_html__( 'Two', 'grandprix' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'grandprix' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'grandprix' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'grandprix' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'grandprix' ),
				'parent'        => $panel_single_product,
				'options'       => grandprix_mikado_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'grandprix' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'grandprix' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'grandprix' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'grandprix' ),
				'default_value' => 'mkdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'grandprix' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'grandprix' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'grandprix' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('grandprix_mikado_woocommerce_additional_options_map');
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_woocommerce_options_map', grandprix_mikado_set_options_map_position( 'woocommerce' ) );
}