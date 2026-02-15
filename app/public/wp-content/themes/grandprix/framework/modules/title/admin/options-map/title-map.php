<?php

if ( ! function_exists( 'grandprix_mikado_get_title_types_options' ) ) {
	function grandprix_mikado_get_title_types_options() {
		$title_type_options = apply_filters( 'grandprix_mikado_filter_title_type_global_option', $title_type_options = array() );
		
		return $title_type_options;
	}
}

if ( ! function_exists( 'grandprix_mikado_get_title_type_default_options' ) ) {
	function grandprix_mikado_get_title_type_default_options() {
		$title_type_option = apply_filters( 'grandprix_mikado_filter_default_title_type_global_option', $title_type_option = '' );
		
		return $title_type_option;
	}
}

foreach ( glob( GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/options-map/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists('grandprix_mikado_title_options_map') ) {
	function grandprix_mikado_title_options_map() {
		$title_type_options        = grandprix_mikado_get_title_types_options();
		$title_type_default_option = grandprix_mikado_get_title_type_default_options();

		grandprix_mikado_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'grandprix'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = grandprix_mikado_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'grandprix')
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'show_title_area',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Title Area', 'grandprix' ),
				'description'   => esc_html__( 'This option will enable/disable Title Area', 'grandprix' ),
				'parent'        => $panel_title
			)
		);
		
			$show_title_area_container = grandprix_mikado_add_admin_container(
				array(
					'parent'          => $panel_title,
					'name'            => 'show_title_area_container',
					'dependency' => array(
						'show' => array(
							'show_title_area' => 'yes'
						)
					)
				)
			);
		
				grandprix_mikado_add_admin_field(
					array(
						'name'          => 'title_area_type',
						'type'          => 'select',
						'default_value' => $title_type_default_option,
						'label'         => esc_html__( 'Title Area Type', 'grandprix' ),
						'description'   => esc_html__( 'Choose title type', 'grandprix' ),
						'parent'        => $show_title_area_container,
						'options'       => $title_type_options
					)
				);
		
					grandprix_mikado_add_admin_field(
						array(
							'name'          => 'title_area_in_grid',
							'type'          => 'yesno',
							'default_value' => 'yes',
							'label'         => esc_html__( 'Title Area In Grid', 'grandprix' ),
							'description'   => esc_html__( 'Set title area content to be in grid', 'grandprix' ),
							'parent'        => $show_title_area_container
						)
					);
		
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_height',
							'type'        => 'text',
							'label'       => esc_html__( 'Height', 'grandprix' ),
							'description' => esc_html__( 'Set a height for Title Area', 'grandprix' ),
							'parent'      => $show_title_area_container,
							'args'        => array(
								'col_width' => 2,
								'suffix'    => 'px'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_height_mobile',
							'type'        => 'text',
							'label'       => esc_html__( 'Height on Mobile', 'grandprix' ),
							'description' => esc_html__( 'Set a height for Title Area on Mobile', 'grandprix' ),
							'parent'      => $show_title_area_container,
							'args'        => array(
								'col_width' => 2,
								'suffix'    => 'px'
							)
						)
					);
		
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_width',
							'type'        => 'text',
							'label'       => esc_html__( 'Title Width', 'grandprix' ),
							'description' => esc_html__( 'Set a width for Title Area', 'grandprix' ),
							'parent'      => $show_title_area_container,
							'args'        => array(
								'col_width' => 2,
								'suffix'    => '%'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_border_width',
							'type'        => 'text',
							'label'       => esc_html__( 'Border', 'grandprix' ),
							'description' => esc_html__( 'Set border width for Title Area', 'grandprix' ),
							'parent'      => $show_title_area_container,
							'args'        => array(
								'col_width' => 2,
								'suffix'    => 'px'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_border_color',
							'type'        => 'color',
							'label'       => esc_html__( 'Border Color', 'grandprix' ),
							'description' => esc_html__( 'Choose a border color for Title Area', 'grandprix' ),
							'parent'      => $show_title_area_container
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_background_color',
							'type'        => 'color',
							'label'       => esc_html__( 'Background Color', 'grandprix' ),
							'description' => esc_html__( 'Choose a background color for Title Area', 'grandprix' ),
							'parent'      => $show_title_area_container
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'        => 'title_area_background_image',
							'type'        => 'image',
							'label'       => esc_html__( 'Background Image', 'grandprix' ),
							'description' => esc_html__( 'Choose an Image for Title Area', 'grandprix' ),
							'parent'      => $show_title_area_container
						)
					);
		
					grandprix_mikado_add_admin_field(
						array(
							'name'          => 'title_area_background_image_hide_on_mobile',
							'type'          => 'yesno',
							'default_value' => 'yes',
							'label'         => esc_html__( 'Hide Background Image On Mobile', 'grandprix' ),
							'description'   => esc_html__( 'Hide background image for Title Area on mobile', 'grandprix' ),
							'parent'        => $show_title_area_container
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'          => 'title_area_background_image_behavior',
							'type'          => 'select',
							'default_value' => '',
							'label'         => esc_html__( 'Background Image Behavior', 'grandprix' ),
							'description'   => esc_html__( 'Choose title area background image behavior', 'grandprix' ),
							'parent'        => $show_title_area_container,
							'options'       => array(
								''                  => esc_html__( 'Default', 'grandprix' ),
								'responsive'        => esc_html__( 'Enable Responsive Image', 'grandprix' ),
								'parallax'          => esc_html__( 'Enable Parallax Image', 'grandprix' ),
								'parallax-zoom-out' => esc_html__( 'Enable Parallax With Zoom Out Image', 'grandprix' )
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'name'          => 'title_area_vertical_alignment',
							'type'          => 'select',
							'default_value' => 'header-bottom',
							'label'         => esc_html__( 'Vertical Alignment', 'grandprix' ),
							'description'   => esc_html__( 'Specify title vertical alignment', 'grandprix' ),
							'parent'        => $show_title_area_container,
							'options'       => array(
								'header-bottom' => esc_html__( 'From Bottom of Header', 'grandprix' ),
								'window-top'    => esc_html__( 'From Window Top', 'grandprix' )
							)
						)
					);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'grandprix_mikado_action_additional_title_area_options_map', $show_title_area_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
		
		$panel_typography = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '_title_page',
				'name'  => 'panel_title_typography',
				'title' => esc_html__( 'Typography', 'grandprix' )
			)
		);
		
			grandprix_mikado_add_admin_section_title(
				array(
					'name'   => 'type_section_title',
					'title'  => esc_html__( 'Title', 'grandprix' ),
					'parent' => $panel_typography
				)
			);
		
			$group_page_title_styles = grandprix_mikado_add_admin_group(
				array(
					'name'        => 'group_page_title_styles',
					'title'       => esc_html__( 'Title', 'grandprix' ),
					'description' => esc_html__( 'Define styles for page title', 'grandprix' ),
					'parent'      => $panel_typography
				)
			);
		
				$row_page_title_styles_1 = grandprix_mikado_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_1',
						'parent' => $group_page_title_styles
					)
				);
		
					grandprix_mikado_add_admin_field(
						array(
							'name'          => 'title_area_title_tag',
							'type'          => 'selectsimple',
							'default_value' => 'h1',
							'label'         => esc_html__( 'Title Tag', 'grandprix' ),
							'options'       => grandprix_mikado_get_title_tag(),
							'parent'        => $row_page_title_styles_1
						)
					);
		
				$row_page_title_styles_2 = grandprix_mikado_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_2',
						'parent' => $group_page_title_styles
					)
				);
		
					grandprix_mikado_add_admin_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'page_title_color',
							'label'  => esc_html__( 'Text Color', 'grandprix' ),
							'parent' => $row_page_title_styles_2
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_font_size',
							'default_value' => '',
							'label'         => esc_html__( 'Font Size', 'grandprix' ),
							'parent'        => $row_page_title_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_line_height',
							'default_value' => '',
							'label'         => esc_html__( 'Line Height', 'grandprix' ),
							'parent'        => $row_page_title_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_text_transform',
							'default_value' => '',
							'label'         => esc_html__( 'Text Transform', 'grandprix' ),
							'options'       => grandprix_mikado_get_text_transform_array(),
							'parent'        => $row_page_title_styles_2
						)
					);
		
				$row_page_title_styles_3 = grandprix_mikado_add_admin_row(
					array(
						'name'   => 'row_page_title_styles_3',
						'parent' => $group_page_title_styles,
						'next'   => true
					)
				);
		
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'fontsimple',
							'name'          => 'page_title_google_fonts',
							'default_value' => '-1',
							'label'         => esc_html__( 'Font Family', 'grandprix' ),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_font_style',
							'default_value' => '',
							'label'         => esc_html__( 'Font Style', 'grandprix' ),
							'options'       => grandprix_mikado_get_font_style_array(),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_title_font_weight',
							'default_value' => '',
							'label'         => esc_html__( 'Font Weight', 'grandprix' ),
							'options'       => grandprix_mikado_get_font_weight_array(),
							'parent'        => $row_page_title_styles_3
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_title_letter_spacing',
							'default_value' => '',
							'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
							'parent'        => $row_page_title_styles_3,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
		
			grandprix_mikado_add_admin_section_title(
				array(
					'name'   => 'type_section_subtitle',
					'title'  => esc_html__( 'Subtitle', 'grandprix' ),
					'parent' => $panel_typography
				)
			);
		
			$group_page_subtitle_styles = grandprix_mikado_add_admin_group(
				array(
					'name'        => 'group_page_subtitle_styles',
					'title'       => esc_html__( 'Subtitle', 'grandprix' ),
					'description' => esc_html__( 'Define styles for page subtitle', 'grandprix' ),
					'parent'      => $panel_typography
				)
			);
		
				$row_page_subtitle_styles_1 = grandprix_mikado_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_1',
						'parent' => $group_page_subtitle_styles
					)
				);
				
					grandprix_mikado_add_admin_field(
						array(
							'name' => 'title_area_subtitle_tag',
							'type' => 'selectsimple',
							'default_value' => 'h6',
							'label' => esc_html__('Subtitle Tag', 'grandprix'),
							'options' => grandprix_mikado_get_title_tag(),
							'parent' => $row_page_subtitle_styles_1
						)
					);
		
				$row_page_subtitle_styles_2 = grandprix_mikado_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_2',
						'parent' => $group_page_subtitle_styles
					)
				);
		
					grandprix_mikado_add_admin_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'page_subtitle_color',
							'label'  => esc_html__( 'Text Color', 'grandprix' ),
							'parent' => $row_page_subtitle_styles_2
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_font_size',
							'default_value' => '',
							'label'         => esc_html__( 'Font Size', 'grandprix' ),
							'parent'        => $row_page_subtitle_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_line_height',
							'default_value' => '',
							'label'         => esc_html__( 'Line Height', 'grandprix' ),
							'parent'        => $row_page_subtitle_styles_2,
							'args'          => array(
								'suffix' => 'px'
							)
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_text_transform',
							'default_value' => '',
							'label'         => esc_html__( 'Text Transform', 'grandprix' ),
							'options'       => grandprix_mikado_get_text_transform_array(),
							'parent'        => $row_page_subtitle_styles_2
						)
					);
		
				$row_page_subtitle_styles_3 = grandprix_mikado_add_admin_row(
					array(
						'name'   => 'row_page_subtitle_styles_3',
						'parent' => $group_page_subtitle_styles,
						'next'   => true
					)
				);
		
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'fontsimple',
							'name'          => 'page_subtitle_google_fonts',
							'default_value' => '-1',
							'label'         => esc_html__( 'Font Family', 'grandprix' ),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_font_style',
							'default_value' => '',
							'label'         => esc_html__( 'Font Style', 'grandprix' ),
							'options'       => grandprix_mikado_get_font_style_array(),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'selectblanksimple',
							'name'          => 'page_subtitle_font_weight',
							'default_value' => '',
							'label'         => esc_html__( 'Font Weight', 'grandprix' ),
							'options'       => grandprix_mikado_get_font_weight_array(),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
					
					grandprix_mikado_add_admin_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'page_subtitle_letter_spacing',
							'default_value' => '',
							'label'         => esc_html__( 'Letter Spacing', 'grandprix' ),
							'args'          => array(
								'suffix' => 'px'
							),
							'parent'        => $row_page_subtitle_styles_3
						)
					);
		
		/***************** Additional Title Typography Layout - start *****************/
		
		do_action( 'grandprix_mikado_action_additional_title_typography_options_map', $panel_typography );
		
		/***************** Additional Title Typography Layout - end *****************/
    }

	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_title_options_map', grandprix_mikado_set_options_map_position( 'title' ) );
}