<?php

if ( ! function_exists( 'grandprix_core_map_portfolio_settings_meta' ) ) {
	function grandprix_core_map_portfolio_settings_meta() {
		$meta_box = grandprix_mikado_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'grandprix-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		grandprix_mikado_create_meta_box_field( array(
			'name'        => 'mkdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'grandprix-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'grandprix-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'grandprix-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'grandprix-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'grandprix-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'grandprix-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'grandprix-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'grandprix-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'grandprix-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'grandprix-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'grandprix-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'grandprix-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'grandprix-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'grandprix-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = grandprix_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'grandprix-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'grandprix-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => grandprix_mikado_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'grandprix-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'grandprix-core' ),
				'default_value' => '',
				'options'       => grandprix_mikado_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = grandprix_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'grandprix-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'grandprix-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => grandprix_mikado_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'grandprix-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'grandprix-core' ),
				'default_value' => '',
				'options'       => grandprix_mikado_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'grandprix-core' ),
				'parent'        => $meta_box,
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'grandprix-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'grandprix-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'grandprix-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'grandprix-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'grandprix-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'grandprix-core' ),
				'parent'      => $meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'grandprix-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'grandprix-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'grandprix-core' ),
					'small'              => esc_html__( 'Small', 'grandprix-core' ),
					'large-width'        => esc_html__( 'Large Width', 'grandprix-core' ),
					'large-height'       => esc_html__( 'Large Height', 'grandprix-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'grandprix-core' )
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'grandprix-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'grandprix-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'grandprix-core' ),
					'large-width' => esc_html__( 'Large Width', 'grandprix-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'grandprix-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'grandprix-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_core_map_portfolio_settings_meta', 41 );
}