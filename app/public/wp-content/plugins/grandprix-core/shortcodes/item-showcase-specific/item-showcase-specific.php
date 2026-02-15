<?php
namespace GrandPrixCore\CPT\Shortcodes\ItemShowcaseSpecific;

use GrandPrixCore\Lib;

class ItemShowcaseSpecific implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_item_showcase_specific';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Item Showcase Specific', 'grandprix-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-item-showcase-specific extended-custom-icon',
					'category'                  => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'grandprix-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'grandprix-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Info Position', 'grandprix-core' ),
							'value'       => array(
								esc_html__( 'Left', 'grandprix-core' )  => 'text-left',
								esc_html__( 'Right', 'grandprix-core' ) => 'text-right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'main_image',
							'heading'    => esc_html__( 'Main Image', 'grandprix-core' ),
							'group'      => esc_html__( 'Images Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'main_image_zoom',
							'heading'    => esc_html__( 'Zoom Main Image', 'grandprix-core' ),
							'description' => esc_html__( 'Set zoom value for main image (For example "1.2")', 'grandprix-core' ),
							'dependency'  => array( 'element' => 'main_image', 'not_empty' => true ),
							'group'      => esc_html__( 'Images Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'second_image',
							'heading'    => esc_html__( 'Second Image', 'grandprix-core' ),
							'group'      => esc_html__( 'Images Settings', 'grandprix-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'second_image_offset',
							'heading'     => esc_html__( 'Second Image Top Offset', 'grandprix-core' ),
							'description' => esc_html__( 'Set value for second image offset in "px" (For example "10px")', 'grandprix-core' ),
							'dependency'  => array( 'element' => 'main_image', 'not_empty' => true ),
							'group'       => esc_html__( 'Images Settings', 'grandprix-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'additional_link',
							'heading'     => esc_html__( 'Additional Link', 'grandprix-core' ),
							'group'       => esc_html__( 'Images Settings', 'grandprix-core' ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'add_link_text',
							'heading'     => esc_html__( 'Additional Link Text', 'grandprix-core' ),
							'dependency'  => array( 'element' => 'additional_link', 'not_empty' => true ),
							'group'       => esc_html__( 'Images Settings', 'grandprix-core' ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'add_link_target',
							'heading'     => esc_html__( 'Additional Link Target', 'grandprix-core' ),
							'value'       => array_flip( grandprix_mikado_get_link_target_array() ),
							'dependency'  => array( 'element' => 'add_link_text', 'not_empty' => true ),
							'group'       => esc_html__( 'Images Settings', 'grandprix-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'custom_icon',
							'heading'    => esc_html__( 'Custom Icon', 'grandprix-core' ),
							'group'      => esc_html__( 'Images Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'tagline',
							'heading'    => esc_html__( 'Tagline', 'grandprix-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'tagline_color',
							'heading'    => esc_html__( 'Tagline Color', 'grandprix-core' ),
							'dependency' => array( 'element' => 'tagline', 'not_empty' => true ),
							'group'      => esc_html__( 'Info Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'grandprix-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'grandprix-core' ),
							'value'       => array_flip( grandprix_mikado_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Info Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'grandprix-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Info Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'grandprix-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Info Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'grandprix-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'grandprix-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Info Settings', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'grandprix-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Info Settings', 'grandprix-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_link',
							'heading'     => esc_html__( 'Button Link', 'grandprix-core' ),
							'description' => esc_html__( 'Set link for button below text', 'grandprix-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_text',
							'heading'    => esc_html__( 'Button Text', 'grandprix-core' ),
							'dependency' => array( 'element' => 'button_link', 'not_empty' => true ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_target',
							'heading'    => esc_html__( 'Target', 'grandprix-core' ),
							'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
							'dependency' => array( 'element' => 'button_link', 'not_empty' => true ),
							'save_always' => true
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'author_image',
							'heading'    => esc_html__( 'Author Image', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'author_tagline',
							'heading'    => esc_html__( 'Author Tagline', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'author_name',
							'heading'    => esc_html__( 'Author Name', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'author_link',
							'heading'    => esc_html__( 'Author Link', 'grandprix-core' ),
							'dependency' => array( 'element' => 'author_name', 'not_empty' => true ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'appear_animation',
							'dependency' => array( 'element' => 'type', 'value' => array( 'icon-top' ) ),
							'heading'    => esc_html__( 'Enable Appear Animation', 'grandprix-core' ),
							'value'      => array_flip( grandprix_mikado_get_yes_no_select_array( false, true) ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'skin',
							'heading'    => esc_html__( 'Skin', 'grandprix-core' ),
							'value'      => array(
								esc_html__( 'Default', 'grandprix-core' ) => '',
								esc_html__( 'Light', 'grandprix-core' )   => 'mkdf-light-skin',
							),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'          => '',
			'type'                  => 'text-left',
			'main_image'            => '',
			'main_image_zoom'       => '',
			'second_image'          => '',
			'second_image_offset'   => '',
			'additional_link'       => '',
			'add_link_text'         => '',
			'add_link_target'       => '',
			'custom_icon'           => '',
			'tagline'               => '',
			'tagline_color'         => '',
			'title'                 => '',
			'title_tag'             => 'h2',
			'title_color'           => '',
			'title_top_margin'      => '',
			'text'                  => '',
			'text_color'            => '',
			'text_top_margin'       => '',
			'button_link'           => '',
			'button_text'           => '',
			'button_target'         => '_self',
			'author_image'          => '',
			'author_tagline'        => '',
			'author_name'           => '',
			'author_link'           => '',
			'skin'                  => '',
			'appear_animation' => 'yes',
		);
		
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		
		$params['holder_classes']      = $this->getHolderClasses( $params );
		$params['tagline_styles']      = $this->getTaglineStyles( $params );
		$params['title_styles']        = $this->getTitleStyles( $params );
		$params['title_tag']           = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['text_styles']         = $this->getTextStyles( $params );
		$params['main_image']          = $this->getMainImage( $params );
		$params['second_image']        = $this->getSecondImage( $params );
		$params['second_image_styles'] = $this->getSecondImageStyles( $params );
		$params['author_image']        = $this->getAuthorImage( $params );
		$params['custom_icon']         = $this->getCustomIcon( $params );
		
		return grandprix_core_get_shortcode_module_template_part( 'templates/item-showcase-specific-item', 'item-showcase-specific', '', $params );
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-iss-' . $params['type'] : '';
		$holderClasses[] = ! empty( $params['skin'] ) ? $params['skin'] : '';
		$holderClasses[] = isset($params['appear_animation']) && ( $params['appear_animation'] == 'yes') ? 'mkdf-has-appear-animation' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getTaglineStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['tagline_color'] ) ) {
			$styles[] = 'color: ' . $params['tagline_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . grandprix_mikado_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . grandprix_mikado_filter_px( $params['text_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getMainImageStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['main_image_zoom'] ) ) {
			$styles[] = 'transform: scale(' . $params['main_image_zoom'] . ')';
		}
		
		return implode( ';', $styles );
	}
	
	private function getMainImage( $params ) {
		$main_image = array();
		
		if ( ! empty( $params['main_image'] ) ) {
			$id = $params['main_image'];
			$main_image_styles = $this->getMainImageStyles( $params );
			
			$main_image['image_id'] = $id;
			$main_image_original    = wp_get_attachment_image_src( $id, 'full' );
			$main_image['url']      = $main_image_original[0];
			$main_image['style']    = $main_image_styles;
			$main_image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $main_image;
	}
	
	private function getSecondImage( $params ) {
		$second_image = array();
		
		if ( ! empty( $params['second_image'] ) ) {
			$id = $params['second_image'];
			
			$second_image['image_id'] = $id;
			$second_image_original    = wp_get_attachment_image_src( $id, 'full' );
			$second_image['url']      = $second_image_original[0];
			$second_image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $second_image;
	}
	
	private function getSecondImageStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['second_image_offset'] ) ) {
			$styles[] = 'top: ' . $params['second_image_offset'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getAuthorImage( $params ) {
		$author_image = array();
		
		if ( ! empty( $params['author_image'] ) ) {
			$id = $params['author_image'];
			
			$author_image['image_id'] = $id;
			$author_image_original    = wp_get_attachment_image_src( $id, 'full' );
			$author_image['url']      = $author_image_original[0];
			$author_image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $author_image;
	}
	
	private function getCustomIcon( $params ) {
		$custom_icon = array();
		
		if ( ! empty( $params['custom_icon'] ) ) {
			$id = $params['custom_icon'];
			
			$custom_icon['image_id'] = $id;
			$custom_icon_original    = wp_get_attachment_image_src( $id, 'full' );
			$custom_icon['url']      = $custom_icon_original[0];
			$custom_icon['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $custom_icon;
	}
}