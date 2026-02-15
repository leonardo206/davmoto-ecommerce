<?php

if ( ! function_exists( 'grandprix_mikado_error_404_options_map' ) ) {
	function grandprix_mikado_error_404_options_map() {
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'grandprix' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'grandprix' ),
				'description' => esc_html__( 'Choose a background color for header area', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'grandprix' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'grandprix' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_border_color_header',
				'label'       => esc_html__( 'Border Color', 'grandprix' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'grandprix' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'grandprix' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'grandprix' ),
					'light-header' => esc_html__( 'Light', 'grandprix' ),
					'dark-header'  => esc_html__( 'Dark', 'grandprix' )
				)
			)
		);
		
		$panel_404_options = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'grandprix' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'grandprix' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'grandprix' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'grandprix' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "PAGE NOT FOUND".', 'grandprix' )
			)
		);
		
		$first_level_group = grandprix_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'grandprix' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'grandprix' )
			)
		);
		
		$first_level_row1 = grandprix_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_title_color',
				'label'  => esc_html__( 'Text Color', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = grandprix_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'grandprix' ),
				'options'       => grandprix_mikado_get_font_style_array()
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'grandprix' ),
				'options'       => grandprix_mikado_get_font_weight_array()
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'grandprix' ),
				'options'       => grandprix_mikado_get_text_transform_array()
			)
		);

        $first_level_group_responsive = grandprix_mikado_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'first_level_group_responsive',
                'title'       => esc_html__( 'Title Style Responsive', 'grandprix' ),
                'description' => esc_html__( 'Define responsive styles for 404 page title (under 680px)', 'grandprix' )
            )
        );

        $first_level_row3 = grandprix_mikado_add_admin_row(
            array(
                'parent' => $first_level_group_responsive,
                'name'   => 'first_level_row3'
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_tagline',
				'default_value' => '',
				'label'         => esc_html__( 'Tagline', 'grandprix' ),
				'description'   => esc_html__( 'Enter tagline for 404 page. Default label is "error page".', 'grandprix' )
			)
		);
		
		$second_level_group = grandprix_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Tagline Style', 'grandprix' ),
				'description' => esc_html__( 'Define styles for 404 page tagline', 'grandprix' )
			)
		);
		
		$second_level_row1 = grandprix_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_tagline_color',
				'label'  => esc_html__( 'Text Color', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_tagline_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_tagline_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_tagline_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_row2 = grandprix_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_tagline_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'grandprix' ),
				'options'       => grandprix_mikado_get_font_style_array()
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_tagline_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'grandprix' ),
				'options'       => grandprix_mikado_get_font_weight_array()
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_tagline_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_tagline_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'grandprix' ),
				'options'       => grandprix_mikado_get_text_transform_array()
			)
		);

        $second_level_group_responsive = grandprix_mikado_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'second_level_group_responsive',
                'title'       => esc_html__( 'Tagline Style Responsive', 'grandprix' ),
                'description' => esc_html__( 'Define responsive styles for 404 page tagline (under 680px)', 'grandprix' )
            )
        );

        $second_level_row3 = grandprix_mikado_add_admin_row(
            array(
                'parent' => $second_level_group_responsive,
                'name'   => 'second_level_row3'
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_tagline_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_tagline_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_tagline_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'grandprix' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'grandprix' )
			)
		);
		
		$third_level_group = grandprix_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'grandprix' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'grandprix' )
			)
		);
		
		$third_level_row1 = grandprix_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_text_color',
				'label'  => esc_html__( 'Text Color', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row2 = grandprix_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'grandprix' ),
				'options'       => grandprix_mikado_get_font_style_array()
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'grandprix' ),
				'options'       => grandprix_mikado_get_font_weight_array()
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'grandprix' ),
				'options'       => grandprix_mikado_get_text_transform_array()
			)
		);

        $third_level_group_responsive = grandprix_mikado_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'third_level_group_responsive',
                'title'       => esc_html__( 'Text Style Responsive', 'grandprix' ),
                'description' => esc_html__( 'Define responsive styles for 404 page text (under 680px)', 'grandprix' )
            )
        );

        $third_level_row3 = grandprix_mikado_add_admin_row(
            array(
                'parent' => $third_level_group_responsive,
                'name'   => 'third_level_row3'
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'text',
				'name'        => '404_back_to_home',
				'label'       => esc_html__( 'Back to Home Button Label', 'grandprix' ),
				'description' => esc_html__( 'Enter label for "Back to home" button', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_button_style',
				'default_value' => '',
				'label'         => esc_html__( 'Button Skin', 'grandprix' ),
				'description'   => esc_html__( 'Choose a style to make Back to Home button in that predefined style', 'grandprix' ),
				'options'       => array(
					''            => esc_html__( 'Default', 'grandprix' ),
					'light-style' => esc_html__( 'Light', 'grandprix' )
				)
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_error_404_options_map', grandprix_mikado_set_options_map_position( '404' ) );
}