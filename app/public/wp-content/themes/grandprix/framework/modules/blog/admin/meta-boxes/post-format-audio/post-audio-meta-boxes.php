<?php

if ( ! function_exists( 'grandprix_mikado_map_post_audio_meta' ) ) {
	function grandprix_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'grandprix' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'grandprix' ),
				'description'   => esc_html__( 'Choose audio type', 'grandprix' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'grandprix' ),
					'self'            => esc_html__( 'Self Hosted', 'grandprix' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = grandprix_mikado_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'grandprix' ),
				'description' => esc_html__( 'Enter audio URL', 'grandprix' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'grandprix' ),
				'description' => esc_html__( 'Enter audio link', 'grandprix' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_post_audio_meta', 23 );
}