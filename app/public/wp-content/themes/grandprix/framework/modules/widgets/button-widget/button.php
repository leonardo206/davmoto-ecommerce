<?php

if ( class_exists( 'GrandPrixCoreClassWidget' ) ) {
	class GrandPrixMikadoClassButtonWidget extends GrandPrixCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_button_widget',
				esc_html__( 'GrandPrix Button Widget', 'grandprix' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'grandprix' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'grandprix' ),
					'options' => array(
						'solid'   => esc_html__( 'Solid', 'grandprix' ),
						'outline' => esc_html__( 'Outline', 'grandprix' ),
						'simple'  => esc_html__( 'Simple', 'grandprix' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'grandprix' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'grandprix' ),
						'medium' => esc_html__( 'Medium', 'grandprix' ),
						'large'  => esc_html__( 'Large', 'grandprix' ),
						'huge'   => esc_html__( 'Huge', 'grandprix' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'grandprix' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'grandprix' ),
					'default' => esc_html__( 'Button Text', 'grandprix' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'grandprix' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'grandprix' ),
					'options' => grandprix_mikado_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'grandprix' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'grandprix' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'grandprix' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'grandprix' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'grandprix' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'grandprix' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'grandprix' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'grandprix' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'grandprix' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'grandprix' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'grandprix' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'grandprix' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$params = '';
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}