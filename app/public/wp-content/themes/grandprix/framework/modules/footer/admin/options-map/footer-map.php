<?php

if ( ! function_exists( 'grandprix_mikado_footer_options_map' ) ) {
	function grandprix_mikado_footer_options_map() {

		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'grandprix' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'grandprix' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'grandprix' ),
				'parent'        => $footer_panel
			)
		);

        grandprix_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'grandprix' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'grandprix' ),
                'parent'        => $footer_panel
            )
        );

		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'grandprix' ),
				'parent'        => $footer_panel
			)
		);
		
		$show_footer_top_container = grandprix_mikado_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'grandprix' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'grandprix' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'grandprix' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'grandprix' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'grandprix' ),
					'left'   => esc_html__( 'Left', 'grandprix' ),
					'center' => esc_html__( 'Center', 'grandprix' ),
					'right'  => esc_html__( 'Right', 'grandprix' )
				),
				'parent'        => $show_footer_top_container
			)
		);
		
		$footer_top_styles_group = grandprix_mikado_add_admin_group(
			array(
				'name'        => 'footer_top_styles_group',
				'title'       => esc_html__( 'Footer Top Styles', 'grandprix' ),
				'description' => esc_html__( 'Define style for footer top area', 'grandprix' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		$footer_top_styles_row_1 = grandprix_mikado_add_admin_row(
			array(
				'name'   => 'footer_top_styles_row_1',
				'parent' => $footer_top_styles_group
			)
		);
		
			grandprix_mikado_add_admin_field(
				array(
					'name'   => 'footer_top_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'grandprix' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			grandprix_mikado_add_admin_field(
				array(
					'name'   => 'footer_top_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'grandprix' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			grandprix_mikado_add_admin_field(
				array(
					'name'   => 'footer_top_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'grandprix' ),
					'parent' => $footer_top_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);

		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'grandprix' ),
				'parent'        => $footer_panel
			)
		);

		$show_footer_bottom_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'grandprix' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'grandprix' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns_alignment',
				'default_value' => 'center',
				'label'         => esc_html__( 'Footer Bottom Columns Alignment', 'grandprix' ),
				'description'   => esc_html__( 'Text Alignment in Footer Bottom Columns', 'grandprix' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'grandprix' ),
					'left'   => esc_html__( 'Left', 'grandprix' ),
					'center' => esc_html__( 'Center', 'grandprix' ),
					'right'  => esc_html__( 'Right', 'grandprix' )
				),
				'parent'        => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_group = grandprix_mikado_add_admin_group(
			array(
				'name'        => 'footer_bottom_styles_group',
				'title'       => esc_html__( 'Footer Bottom Styles', 'grandprix' ),
				'description' => esc_html__( 'Define style for footer bottom area', 'grandprix' ),
				'parent'      => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_row_1 = grandprix_mikado_add_admin_row(
			array(
				'name'   => 'footer_bottom_styles_row_1',
				'parent' => $footer_bottom_styles_group
			)
		);
		
			grandprix_mikado_add_admin_field(
				array(
					'name'   => 'footer_bottom_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'grandprix' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			grandprix_mikado_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'grandprix' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			grandprix_mikado_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'grandprix' ),
					'parent' => $footer_bottom_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);
	}

	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_footer_options_map', grandprix_mikado_set_options_map_position( 'footer' ) );
}