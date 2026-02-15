<?php

if ( ! function_exists( 'grandprix_mikado_map_post_video_meta' ) ) {
	function grandprix_mikado_map_post_video_meta() {
		$video_post_format_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'grandprix' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'grandprix' ),
				'description'   => esc_html__( 'Choose video type', 'grandprix' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'grandprix' ),
					'self'            => esc_html__( 'Self Hosted', 'grandprix' )
				)
			)
		);
		
		$mkdf_video_embedded_container = grandprix_mikado_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'mkdf_video_embedded_container'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'grandprix' ),
				'description' => esc_html__( 'Enter Video URL', 'grandprix' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'grandprix' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'grandprix' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'grandprix' ),
				'description' => esc_html__( 'Enter video image', 'grandprix' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_post_video_meta', 22 );
}