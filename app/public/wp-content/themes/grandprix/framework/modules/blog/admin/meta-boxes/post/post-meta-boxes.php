<?php

/*** Post Settings ***/

if ( ! function_exists( 'grandprix_mikado_map_post_meta' ) ) {
	function grandprix_mikado_map_post_meta() {
		
		$post_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'grandprix' ),
				'name'  => 'post-meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'grandprix' ),
				'parent'        => $post_meta_box,
				'options'       => grandprix_mikado_get_yes_no_select_array()
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'grandprix' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'grandprix' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => grandprix_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$grandprix_custom_sidebars = grandprix_mikado_get_custom_sidebars();
		if ( is_array( $grandprix_custom_sidebars ) && count( $grandprix_custom_sidebars ) > 0 ) {
			grandprix_mikado_create_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'grandprix' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'grandprix' ),
				'parent'      => $post_meta_box,
				'options'     => grandprix_mikado_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'grandprix' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'grandprix' ),
				'parent'      => $post_meta_box
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_custom_mark_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Post Custom Mark', 'grandprix' ),
				'description' => esc_html__( 'Enter custom mark', 'grandprix' ),
				'parent'      => $post_meta_box
			)
		);

		do_action('grandprix_mikado_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_post_meta', 20 );
}
