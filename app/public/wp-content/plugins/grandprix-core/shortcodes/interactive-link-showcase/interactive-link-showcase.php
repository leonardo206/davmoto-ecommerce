<?php
namespace GrandPrixCore\CPT\Shortcodes\InteractiveLinkShowcase;

use GrandPrixCore\Lib;

class InteractiveLinkShowcase implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_interactive_link_showcase';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Interactive Link Showcase', 'grandprix-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
					'icon'     => 'icon-wpb-interactive-link-showcase extended-custom-icon',
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'skin',
							'heading'     => esc_html__( 'Link Skin', 'grandprix-core' ),
							'value'       => array(
								esc_html__( 'Default', 'grandprix-core' ) => '',
								esc_html__( 'Light', 'grandprix-core' )   => 'light'
							),
							'save_always' => true
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'grandprix-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'link_target',
							'heading'     => esc_html__( 'Link Target', 'grandprix-core' ),
							'value'       => array_flip( grandprix_mikado_get_link_target_array() ),
							'save_always' => true
						),
						array(
							'type'       => 'param_group',
							'param_name' => 'link_items',
							'heading'    => esc_html__( 'Link Items', 'grandprix-core' ),
							'params'     => array(
								array(
									'type'       => 'textfield',
									'param_name' => 'title',
									'heading'    => esc_html__( 'Title', 'grandprix-core' ),
								),
								array(
									'type'       => 'textfield',
									'param_name' => 'link',
									'heading'    => esc_html__( 'Link', 'grandprix-core' )
								),
								array(
									'type'        => 'attach_image',
									'param_name'  => 'image',
									'heading'     => esc_html__( 'Image', 'grandprix-core' ),
									'description' => esc_html__( 'Select image from media library', 'grandprix-core' )
								)
							)
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'skin'             => '',
			'background_color' => '',
			'link_target'      => '_self',
			'link_items'       => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']      = $this->getHolderClasses( $params, $args );
		$params['image_holder_styles'] = $this->getImageHolderStyles( $params );
		$params['link_items']          = json_decode( urldecode( $params['link_items'] ), true );
		$params['link_target']         = ! empty( $params['link_target'] ) ? $params['link_target'] : $args['link_target'];
		
		$html = grandprix_core_get_shortcode_module_template_part( 'templates/interactive-link-showcase', 'interactive-link-showcase', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['skin'] ) ? 'mkdf-ils-skin-' . $params['skin'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getImageHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		return implode( ';', $styles );
	}
}