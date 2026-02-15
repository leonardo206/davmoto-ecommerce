<?php

if ( ! function_exists( 'grandprix_mikado_sidebar_options_map' ) ) {
	function grandprix_mikado_sidebar_options_map() {
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'grandprix' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'grandprix' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		grandprix_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'grandprix' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'grandprix' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => grandprix_mikado_get_custom_sidebars_options()
		) );
		
		$grandprix_custom_sidebars = grandprix_mikado_get_custom_sidebars();
		if ( is_array( $grandprix_custom_sidebars ) && count( $grandprix_custom_sidebars ) > 0 ) {
			grandprix_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'grandprix' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'grandprix' ),
				'parent'      => $sidebar_panel,
				'options'     => $grandprix_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_sidebar_options_map', grandprix_mikado_set_options_map_position( 'sidebar' ) );
}