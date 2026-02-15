<?php

if ( ! function_exists( 'grandprix_mikado_get_search_types_options' ) ) {
    function grandprix_mikado_get_search_types_options() {
        $search_type_options = apply_filters( 'grandprix_mikado_filter_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'grandprix_mikado_search_options_map' ) ) {
	function grandprix_mikado_search_options_map() {
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'grandprix' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'grandprix' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'search_page_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Layout', 'grandprix' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set layout. Default is in grid.', 'grandprix' ),
				'parent'        => $search_page_panel,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'grandprix' ),
					'full-width' => esc_html__( 'Full Width', 'grandprix' )
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'search_page_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'grandprix' ),
				'description'   => esc_html__( "Choose a sidebar layout for search page", 'grandprix' ),
				'default_value' => 'no-sidebar',
				'options'       => grandprix_mikado_get_custom_sidebars_options(),
				'parent'        => $search_page_panel
			)
		);
		
		$grandprix_custom_sidebars = grandprix_mikado_get_custom_sidebars();
		if ( is_array( $grandprix_custom_sidebars ) && count( $grandprix_custom_sidebars ) > 0 ) {
			grandprix_mikado_add_admin_field(
				array(
					'name'        => 'search_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'grandprix' ),
					'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'grandprix' ),
					'parent'      => $search_page_panel,
					'options'     => $grandprix_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_search_options_map', grandprix_mikado_set_options_map_position( 'search' ) );
}