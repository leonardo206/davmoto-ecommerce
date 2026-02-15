<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = GRANDPRIX_MIKADO_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'grandprix_mikado_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function grandprix_mikado_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'grandprix_mikado_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'grandprix_mikado_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function grandprix_mikado_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Full Width', 'grandprix' ) => 'full-width',
					esc_html__( 'In Grid', 'grandprix' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Mikado Anchor ID', 'grandprix' ),
				'description' => esc_html__( 'For example "home"', 'grandprix' ),
				'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'grandprix' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'grandprix' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Mikado Background Position', 'grandprix' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'grandprix' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Elements', 'grandprix' ),
				'value'       => array(
					esc_html__( 'Never', 'grandprix' )        => '',
					esc_html__( 'Below 1280px', 'grandprix' ) => '1280',
					esc_html__( 'Below 1024px', 'grandprix' ) => '1024',
					esc_html__( 'Below 768px', 'grandprix' )  => '768',
					esc_html__( 'Below 680px', 'grandprix' )  => '680',
					esc_html__( 'Below 480px', 'grandprix' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image and other background elements if used', 'grandprix' ),
				'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Mikado Parallax Background Image', 'grandprix' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Mikado Parallax Speed', 'grandprix' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'grandprix' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Mikado Parallax Section Height (px)', 'grandprix' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param('vc_row',
			array(
				'type' => 'dropdown',
				'param_name' => 'enable_background_svg',
				'heading' => esc_html__('Enable Animated SVG Background Path', 'grandprix'),
				'value' => array_flip(grandprix_mikado_get_yes_no_select_array(false)),
				'group' => esc_html__('Mikado Settings', 'grandprix'),
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textarea_raw_html',
				'param_name'  => 'background_svg',
				'heading'     => esc_html__( 'Animated SVG Background Path Code', 'grandprix' ),
				'dependency' => array( 'element' => 'enable_background_svg', 'value' => 'yes' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Default', 'grandprix' ) => '',
					esc_html__( 'Left', 'grandprix' )    => 'left',
					esc_html__( 'Center', 'grandprix' )  => 'center',
					esc_html__( 'Right', 'grandprix' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param('vc_row',
			array(
				'type' => 'dropdown',
				'param_name' => 'vertical_lines',
				'heading' => esc_html__('Enable Vertical Lines', 'grandprix'),
				'value' => array_flip(grandprix_mikado_get_yes_no_select_array(false)),
				'group' => esc_html__('Mikado Settings', 'grandprix'),
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'animated_text',
				'heading'    => esc_html__( 'Mikado Animated Text', 'grandprix' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'animated_text_color',
				'heading'    => esc_html__( 'Mikado Animated Text Color', 'grandprix' ),
				'dependency' => array( 'element' => 'animated_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'animated_text_overlay_image',
				'heading'    => esc_html__( 'Mikado Animated Text Overlay Image', 'grandprix' ),
				'dependency' => array( 'element' => 'animated_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'animated_text_direction',
				'heading'    => esc_html__( 'Mikado Animated Text Direction', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Horizontal', 'grandprix' ) => 'horizontal',
					esc_html__( 'Vertical', 'grandprix' )    => 'vertical'
				),
				'dependency' => array( 'element' => 'animated_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'animated_text_position',
				'heading'    => esc_html__( 'Mikado Animated Text Position', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Left', 'grandprix' )         => 'left',
					esc_html__( 'Center', 'grandprix' )       => 'center',
					esc_html__( 'Right', 'grandprix' )        => 'right'
				),
				'dependency' => array( 'element' => 'animated_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'animated_text_vertical_position',
				'heading'    => esc_html__( 'Mikado Animated Text Vertical Position', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Default', 'grandprix' ) => '',
					esc_html__( 'Top', 'grandprix' )     => 'top',
					esc_html__( 'Center', 'grandprix' )  => 'middle',
					esc_html__( 'Bottom', 'grandprix' )  => 'bottom'
				),
				'dependency' => array( 'element' => 'animated_text_direction', 'value' => 'horizontal' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'animated_text_enable_animation',
				'heading'    => esc_html__( 'Enable Animated Text Appear Animation', 'grandprix' ),
				'value'      => array_flip( grandprix_mikado_get_yes_no_select_array( false, true ) ),
				'dependency' => array( 'element' => 'animated_text', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		do_action( 'grandprix_mikado_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Full Width', 'grandprix' ) => 'full-width',
					esc_html__( 'In Grid', 'grandprix' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'grandprix' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'grandprix' ),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Mikado Background Position', 'grandprix' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'grandprix' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'grandprix' ),
				'value'       => array(
					esc_html__( 'Never', 'grandprix' )        => '',
					esc_html__( 'Below 1280px', 'grandprix' ) => '1280',
					esc_html__( 'Below 1024px', 'grandprix' ) => '1024',
					esc_html__( 'Below 768px', 'grandprix' )  => '768',
					esc_html__( 'Below 680px', 'grandprix' )  => '680',
					esc_html__( 'Below 480px', 'grandprix' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'grandprix' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'grandprix' ),
				'value'      => array(
					esc_html__( 'Default', 'grandprix' ) => '',
					esc_html__( 'Left', 'grandprix' )    => 'left',
					esc_html__( 'Center', 'grandprix' )  => 'center',
					esc_html__( 'Right', 'grandprix' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'grandprix' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( grandprix_mikado_is_plugin_installed( 'revolution-slider' ) ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Mikado Enable Passepartout', 'grandprix' ),
					'value'       => array_flip( grandprix_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Mikado Passepartout Size', 'grandprix' ),
					'value'       => array(
						esc_html__( 'Tiny', 'grandprix' )   => 'tiny',
						esc_html__( 'Small', 'grandprix' )  => 'small',
						esc_html__( 'Normal', 'grandprix' ) => 'normal',
						esc_html__( 'Large', 'grandprix' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Side Passepartout', 'grandprix' ),
					'value'       => array_flip( grandprix_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Top Passepartout', 'grandprix' ),
					'value'       => array_flip( grandprix_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'grandprix' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'grandprix_mikado_vc_row_map' );
}