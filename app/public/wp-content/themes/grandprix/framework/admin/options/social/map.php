<?php

if ( ! function_exists( 'grandprix_mikado_social_options_map' ) ) {
	function grandprix_mikado_social_options_map() {

	    $page = '_social_page';
		
		grandprix_mikado_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'grandprix' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'grandprix' ),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = grandprix_mikado_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'grandprix' ),
				'dependency' => array(
					'show' => array(
						'enable_social_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'grandprix' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'grandprix' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'grandprix' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'grandprix' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('grandprix_mikado_action_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = grandprix_mikado_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'grandprix' ),
				'dependency' => array(
					'hide' => array(
						'enable_social_share'  => 'no'
					)
				)
			)
		);
		
		/**
		 * Facebook
		 */
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'grandprix' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_facebook_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_facebook_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'grandprix' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'grandprix' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_twitter_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_twitter_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'grandprix' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'grandprix' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * Linked In
		 */
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'grandprix' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_linkedin_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_linkedin_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'grandprix' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'grandprix' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_tumblr_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_tumblr_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'grandprix' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'grandprix' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_pinterest_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_pinterest_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'grandprix' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		grandprix_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'grandprix' )
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'grandprix' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_vk_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_vk_share'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'grandprix' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'GRANDPRIX_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = grandprix_mikado_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'grandprix' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			grandprix_mikado_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'GRANDPRIX_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = grandprix_mikado_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'grandprix' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			grandprix_mikado_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = grandprix_mikado_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'grandprix' ),
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'grandprix' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'grandprix' ),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = grandprix_mikado_add_admin_container(
			array(
				'name'            => 'enable_open_graph_container',
				'parent'          => $panel_open_graph,
				'dependency' => array(
					'show' => array(
						'enable_open_graph'  => 'yes'
					)
				)
			)
		);
		
		grandprix_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => GRANDPRIX_MIKADO_ASSETS_ROOT . '/img/open_graph.jpg',
				'label'         => esc_html__( 'Default Share Image', 'grandprix' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'grandprix' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('grandprix_mikado_action_social_options', $page);
	}
	
	add_action( 'grandprix_mikado_action_options_map', 'grandprix_mikado_social_options_map', grandprix_mikado_set_options_map_position( 'social' ) );
}