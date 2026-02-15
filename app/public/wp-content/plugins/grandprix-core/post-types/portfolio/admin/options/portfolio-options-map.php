<?php

if ( ! function_exists( 'grandprix_mikado_portfolio_options_map' ) ) {
	function grandprix_mikado_portfolio_options_map() {
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'grandprix-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'grandprix-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'grandprix-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'grandprix-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'grandprix-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'grandprix-core' ),
				'parent'        => $panel_archive,
				'options'       => grandprix_mikado_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'grandprix-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'grandprix-core' ),
				'default_value' => 'normal',
				'options'       => grandprix_mikado_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'grandprix-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'grandprix-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'grandprix-core' ),
					'landscape' => esc_html__( 'Landscape', 'grandprix-core' ),
					'portrait'  => esc_html__( 'Portrait', 'grandprix-core' ),
					'square'    => esc_html__( 'Square', 'grandprix-core' )
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'grandprix-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Move', 'grandprix-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-move'   => esc_html__( 'Standard - Move', 'grandprix-core' ),
					'standard-shader' => esc_html__( 'Standard - Shader', 'grandprix-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'grandprix-core' )
				)
			)
		);
		
		$panel = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'grandprix-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'grandprix-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'grandprix-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = grandprix_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'grandprix-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'grandprix-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => grandprix_mikado_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'grandprix-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'grandprix-core' ),
				'default_value' => 'normal',
				'options'       => grandprix_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = grandprix_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'grandprix-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'grandprix-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => grandprix_mikado_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'grandprix-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'grandprix-core' ),
				'default_value' => 'normal',
				'options'       => grandprix_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'grandprix-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'grandprix-core' ),
					'yes' => esc_html__( 'Yes', 'grandprix-core' ),
					'no'  => esc_html__( 'No', 'grandprix-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'grandprix-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'grandprix-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'grandprix-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'grandprix-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'grandprix-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_portfolio_options_map', grandprix_mikado_set_options_map_position( 'portfolio' ) );
}