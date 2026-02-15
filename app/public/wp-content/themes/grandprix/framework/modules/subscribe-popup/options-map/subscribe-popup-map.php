<?php

if ( ! function_exists( 'grandprix_mikado_subscribe_popup_options_map' ) ) {
	function grandprix_mikado_subscribe_popup_options_map() {
		$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		
		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->ID ] = $cform->post_title;
			}
		} else {
			$contact_forms[0] = esc_html__( 'No contact forms found', 'grandprix' );
		}
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_subscribe_popup_page',
				'icon'  => 'fa fa-pencil-square-o',
				'title' => esc_html__( 'Subscribe Pop-up', 'grandprix' )
			)
		);
		
		$subscribe_popup_panel = grandprix_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Subscribe Pop-up', 'grandprix' ),
				'name'  => 'subscribe_popup',
				'page'  => '_subscribe_popup_page'
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'        => $subscribe_popup_panel,
				'type'          => 'yesno',
				'name'          => 'enable_subscribe_popup',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Subscribe Pop-up', 'grandprix' )
			)
		);
		
		$enable_subscribe_popup_container = grandprix_mikado_add_admin_container(
			array(
				'parent'     => $subscribe_popup_panel,
				'name'       => 'enable_subscribe_popup_container',
				'dependency' => array(
					'hide' => array(
						'enable_subscribe_popup' => array( 'no', '' )
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $enable_subscribe_popup_container,
				'type'        => 'text',
				'name'        => 'subscribe_popup_title',
				'label'       => esc_html__( 'Title', 'grandprix' ),
				'description' => esc_html__( 'Enter title subscribe pop-up window', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent'      => $enable_subscribe_popup_container,
				'type'        => 'text',
				'name'        => 'subscribe_popup_subtitle',
				'label'       => esc_html__( 'Subtitle', 'grandprix' ),
				'description' => esc_html__( 'Enter subtitle subscribe pop-up window', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'parent' => $enable_subscribe_popup_container,
				'type'   => 'image',
				'name'   => 'subscribe_popup_background_image',
				'label'  => esc_html__( 'Background Image', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'subscribe_popup_contact_form',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Select Contact Form', 'grandprix' ),
				'description'   => esc_html__( 'Choose contact form to display in subscribe popup window', 'grandprix' ),
				'parent'        => $enable_subscribe_popup_container,
				'options'       => $contact_forms
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'subscribe_popup_contact_form_style',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Contact Form Style', 'grandprix' ),
				'description'   => esc_html__( 'Choose style defined in Contact Form 7 option tab', 'grandprix' ),
				'parent'        => $enable_subscribe_popup_container,
				'options'       => array(
					''                   => esc_html__( 'Default', 'grandprix' ),
					'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'grandprix' ),
					'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'grandprix' ),
					'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'grandprix' )
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_subscribe_popup_prevent',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Subscribe Pop-up Prevent', 'grandprix' ),
				'parent'        => $enable_subscribe_popup_container
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'name'          => 'subscribe_popup_prevent_behavior',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Subscribe Pop-up Prevent Behavior', 'grandprix' ),
				'options'       => array(
					'session' => esc_html__( 'Manage Pop-up Prevent by Current Session', 'grandprix' ),
					'cookies' => esc_html__( 'Manage Pop-up Prevent by Browser Cookies', 'grandprix' )
				),
				'dependency'    => array(
					'show' => array(
						'enable_subscribe_popup_prevent' => array( 'yes' )
					)
				),
				'parent'        => $enable_subscribe_popup_container
			)
		);
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_subscribe_popup_options_map', grandprix_mikado_set_options_map_position( 'subscribe-popup' ) );
}