<?php

if ( ! function_exists( 'grandprix_core_map_portfolio_meta' ) ) {
	function grandprix_core_map_portfolio_meta() {
		global $grandprix_mikado_global_Framework;
		
		$grandprix_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$grandprix_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$grandprix_portfolio_images = new GrandPrixMikadoClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'grandprix-core' ), '', '', 'portfolio_images' );
		$grandprix_mikado_global_Framework->mkdMetaBoxes->addMetaBox( 'portfolio_images', $grandprix_portfolio_images );
		
		$grandprix_portfolio_image_gallery = new GrandPrixMikadoClassMultipleImages( 'mkdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'grandprix-core' ), esc_html__( 'Choose your portfolio images', 'grandprix-core' ) );
		$grandprix_portfolio_images->addChild( 'mkdf-portfolio-image-gallery', $grandprix_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$grandprix_portfolio_images_videos = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'grandprix-core' ),
				'name'  => 'mkdf_portfolio_images_videos'
			)
		);
		grandprix_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_single_upload',
				'parent'      => $grandprix_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'grandprix-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'grandprix-core' ),
						'options' => array(
							'image' => esc_html__('Image','grandprix-core'),
							'video' => esc_html__('Video','grandprix-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'grandprix-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'grandprix-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'grandprix-core'),
							'vimeo' => esc_html__('Vimeo', 'grandprix-core'),
							'self' => esc_html__('Self Hosted', 'grandprix-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'grandprix-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'grandprix-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'grandprix-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$grandprix_additional_sidebar_items = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'grandprix-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		grandprix_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_properties',
				'parent'      => $grandprix_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'grandprix-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'grandprix-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'grandprix-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'grandprix-core' )
					)
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_core_map_portfolio_meta', 40 );
}