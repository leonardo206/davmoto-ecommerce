<?php

namespace GrandPrixCore\CPT\Shortcodes\AnchorMenu;

use GrandPrixCore\Lib;

class AnchorMenu implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'grandprix_anchor_menu';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
				'name'     => esc_html__( 'Anchor Menu', 'grandprix-core' ),
				'base'     => $this->base,
				'category' => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
				'icon'     => 'icon-wpb-anchor-menu extended-custom-icon',
				'params'   => array(
					array(
						'type'       => 'param_group',
						'param_name' => 'menu_items',
						'heading'    => esc_html__( 'Menu Items', 'grandprix-core' ),
						'value'      => '',
						'params'     => array(
							array(
								'type'       => 'textfield',
								'param_name' => 'label',
								'heading'    => esc_html__( 'Label', 'grandprix-core' )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'anchor',
								'heading'     => esc_html__( 'Anchor Link', 'grandprix-core' ),
								'description' => esc_html__( 'For example #home. Same anchor link you need to set for Row shortcode -> Mikado Anchor ID field', 'grandprix-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'label_color',
								'heading'    => esc_html__( 'Label Color', 'grandprix-core' ),
								'dependency' => array( 'element' => 'label', 'not_empty' => true )
							)
						)
					)
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'menu_items' => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['menu_items'] = ! empty( $params['menu_items'] ) ? json_decode( urldecode( $params['menu_items'] ), true ) : array();
		
		$html = grandprix_core_get_shortcode_module_template_part( 'templates/anchor-menu', 'anchor-menu', '', $params );
		
		return $html;
	}
}