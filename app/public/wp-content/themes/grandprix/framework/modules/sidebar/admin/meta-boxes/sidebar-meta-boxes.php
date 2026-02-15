<?php

if ( ! function_exists( 'grandprix_mikado_map_sidebar_meta' ) ) {
	function grandprix_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = grandprix_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'grandprix_mikado_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'grandprix' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		grandprix_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'grandprix' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'grandprix' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => grandprix_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = grandprix_mikado_get_custom_sidebars();
		if ( is_array( $mkdf_custom_sidebars ) && count( $mkdf_custom_sidebars ) > 0 ) {
			grandprix_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'grandprix' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'grandprix' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'grandprix_mikado_action_meta_boxes_map', 'grandprix_mikado_map_sidebar_meta', 31 );
}