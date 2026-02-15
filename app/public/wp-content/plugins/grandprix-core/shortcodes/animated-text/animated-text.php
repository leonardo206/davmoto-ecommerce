<?php

namespace GrandPrixCore\CPT\Shortcodes\AnimatedText;

use GrandPrixCore\Lib;

class AnimatedText implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_animated_text';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Animated Text', 'grandprix-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
					'icon'                      => 'icon-wpb-animated-text extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'grandprix-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'grandprix-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'text_overlay_image',
							'heading'    => esc_html__( 'Text Overlay Image', 'grandprix-core' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'text_direction',
							'heading'    => esc_html__( 'Text Direction', 'grandprix-core' ),
							'value'       => array(
								esc_html__( 'Horizontal', 'grandprix-core' ) => 'horizontal',
								esc_html__( 'Vertical', 'grandprix-core' )   => 'vertical'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'text_position',
							'heading'    => esc_html__( 'Text Position', 'grandprix-core' ),
							'value'      => array(
								esc_html__( 'Left', 'grandprix-core' )   => 'left',
								esc_html__( 'Center', 'grandprix-core' ) => 'center',
								esc_html__( 'Right', 'grandprix-core' )  => 'right'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_animation',
							'heading'    => esc_html__( 'Enable Appear Animation', 'grandprix-core' ),
							'value'      => array_flip( grandprix_mikado_get_yes_no_select_array( false, true ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_tag',
							'heading'     => esc_html__( 'Text Tag', 'grandprix-core' ),
							'value'       => array_flip( grandprix_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_family',
							'heading'    => esc_html__( 'Font Family', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_size',
							'heading'    => esc_html__( 'Font Size (px or em)', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_height',
							'heading'    => esc_html__( 'Line Height (px or em)', 'grandprix-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'font_weight',
							'heading'     => esc_html__( 'Font Weight', 'grandprix-core' ),
							'value'       => array_flip( grandprix_mikado_get_font_weight_array( true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'font_style',
							'heading'     => esc_html__( 'Font Style', 'grandprix-core' ),
							'value'       => array_flip( grandprix_mikado_get_font_style_array( true ) ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'letter_spacing',
							'heading'    => esc_html__( 'Letter Spacing (px or em)', 'grandprix-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color',
							'heading'    => esc_html__( 'Animated Text Color', 'grandprix-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'margin',
							'heading'     => esc_html__( 'Margin (px or %)', 'grandprix-core' ),
							'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'grandprix-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_animated_text',
							'heading'     => esc_html__( 'Disable Animated Text', 'grandprix-core' ),
							'description' => esc_html__( 'Choose on which stage you will hide shortcode', 'grandprix-core' ),
							'value'       => array(
								esc_html__( 'Never', 'grandprix-core' )        => '',
								esc_html__( 'Below 1440px', 'grandprix-core' ) => '1440',
								esc_html__( 'Below 1366px', 'grandprix-core' ) => '1366',
								esc_html__( 'Below 1280px', 'grandprix-core' ) => '1280',
								esc_html__( 'Below 1024px', 'grandprix-core' ) => '1024',
								esc_html__( 'Below 768px', 'grandprix-core' )  => '768',
								esc_html__( 'Below 680px', 'grandprix-core' )  => '680',
								esc_html__( 'Below 480px', 'grandprix-core' )  => '480'
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_size_1366',
							'heading'    => esc_html__( 'Font Size (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Laptops', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_height_1366',
							'heading'    => esc_html__( 'Line Height (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Laptops', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_size_1024',
							'heading'    => esc_html__( 'Font Size (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Tablets Landscape', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_height_1024',
							'heading'    => esc_html__( 'Line Height (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Tablets Landscape', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_size_768',
							'heading'    => esc_html__( 'Font Size (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Tablets Portrait', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_height_768',
							'heading'    => esc_html__( 'Line Height (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Tablets Portrait', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_size_680',
							'heading'    => esc_html__( 'Font Size (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Mobiles', 'grandprix-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_height_680',
							'heading'    => esc_html__( 'Line Height (px or em)', 'grandprix-core' ),
							'group'      => esc_html__( 'Mobiles', 'grandprix-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'          => '',
			'text'                  => '',
			'text_overlay_image'    => '',
			'text_direction'        => 'horizontal',
			'text_position'         => 'left',
			'enable_animation'      => 'yes',
			'text_tag'              => 'div',
			'font_family'           => '',
			'font_size'             => '',
			'line_height'           => '',
			'font_weight'           => '',
			'font_style'            => '',
			'letter_spacing'        => '',
			'color'                 => '',
			'margin'                => '',
			'disable_animated_text' => '',
			'font_size_1366'        => '',
			'line_height_1366'      => '',
			'font_size_1024'        => '',
			'line_height_1024'      => '',
			'font_size_768'         => '',
			'line_height_768'       => '',
			'font_size_680'         => '',
			'line_height_680'       => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_rand_class'] = 'mkdf-animated-text-' . mt_rand( 1000, 10000 );
		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['text_styles']       = $this->getTextStyles( $params );
		$params['image_styles']      = $this->getImageStyles( $params );
		$params['text_data']         = $this->getTextData( $params );
		
		$params['text']     = $params['enable_animation'] === 'yes' ? grandprix_mikado_get_split_text( $params['text'] ) : $params['text'];
		$params['text_overlay_image'] = ! empty( $params['text_overlay_image'] ) ? $params['text_overlay_image'] : '';
		$params['text_tag'] = ! empty( $params['text_tag'] ) ? $params['text_tag'] : $args['text_tag'];
		$params['disable_animated_text'] = ! empty( $params['disable_animated_text'] ) ? $params['disable_animated_text'] : '1024';
		
		$html = grandprix_core_get_shortcode_module_template_part( 'templates/animated-text', 'animated-text', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['holder_rand_class'] ) ? esc_attr( $params['holder_rand_class'] ) : '';
		$holderClasses[] = ! empty( $params['text_direction'] ) ? 'mkdf-animated-text-' . esc_attr( $params['text_direction'] ) : '';
		$holderClasses[] = ! empty( $params['text_direction'] ) ? 'mkdf-animated-text-position-' . esc_attr( $params['text_position'] ) : '';
		$holderClasses[] = $params['enable_animation'] === 'yes' ? 'mkdf-has-animation' : '';
		$holderClasses[] = ! empty( $params['disable_animated_text'] ) ? 'mkdf-hide-on-' . esc_attr( $params['disable_animated_text'] ) : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( $params['font_family'] !== '' ) {
			$styles[] = 'font-family: ' . $params['font_family'];
		}
		
		if ( ! empty( $params['font_size'] ) ) {
			if ( grandprix_mikado_string_ends_with( $params['font_size'], 'px' ) || grandprix_mikado_string_ends_with( $params['font_size'], 'em' ) ) {
				$styles[] = 'font-size: ' . $params['font_size'];
			} else {
				$styles[] = 'font-size: ' . $params['font_size'] . 'px';
			}
		}
		
		if ( ! empty( $params['line_height'] ) ) {
			if ( grandprix_mikado_string_ends_with( $params['line_height'], 'px' ) || grandprix_mikado_string_ends_with( $params['line_height'], 'em' ) ) {
				$styles[] = 'line-height: ' . $params['line_height'];
			} else {
				$styles[] = 'line-height: ' . $params['line_height'] . 'px';
			}
		}
		
		if ( ! empty( $params['font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}
		
		if ( ! empty( $params['font_style'] ) ) {
			$styles[] = 'font-style: ' . $params['font_style'];
		}
		
		if ( ! empty( $params['letter_spacing'] ) ) {
			if ( grandprix_mikado_string_ends_with( $params['letter_spacing'], 'px' ) || grandprix_mikado_string_ends_with( $params['letter_spacing'], 'em' ) ) {
				$styles[] = 'letter-spacing: ' . $params['letter_spacing'];
			} else {
				$styles[] = 'letter-spacing: ' . $params['letter_spacing'] . 'px';
			}
		}
		
		if ( ! empty( $params['color'] ) ) {
			$styles[] = 'color: ' . $params['color'];
		}
		
		if ( $params['margin'] !== '' ) {
			$styles[] = 'margin: ' . $params['margin'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getImageStyles( $params ) {
		$styles = array();
		$image_src = wp_get_attachment_image_src( $params['text_overlay_image'], 'full' );
		
		if ( $image_src !== '' ) {
			$styles[] = 'background-image: url(' . esc_url( isset($image_src[0]) ? $image_src[0] : '' ) . ')';
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextData( $params ) {
		$data = array();
		$data['data-item-class'] = $params['holder_rand_class'];
		
		if ( $params['font_size_1366'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['font_size_1366'], 'px' ) || grandprix_mikado_string_ends_with( $params['font_size_1366'], 'em' ) ) {
				$data['data-font-size-1366'] = $params['font_size_1366'];
			} else {
				$data['data-font-size-1366'] = $params['font_size_1366'] . 'px';
			}
		}
		
		if ( $params['font_size_1024'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['font_size_1024'], 'px' ) || grandprix_mikado_string_ends_with( $params['font_size_1024'], 'em' ) ) {
				$data['data-font-size-1024'] = $params['font_size_1024'];
			} else {
				$data['data-font-size-1024'] = $params['font_size_1024'] . 'px';
			}
		}
		
		if ( $params['font_size_768'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['font_size_768'], 'px' ) || grandprix_mikado_string_ends_with( $params['font_size_768'], 'em' ) ) {
				$data['data-font-size-768'] = $params['font_size_768'];
			} else {
				$data['data-font-size-768'] = $params['font_size_768'] . 'px';
			}
		}
		
		if ( $params['font_size_680'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['font_size_680'], 'px' ) || grandprix_mikado_string_ends_with( $params['font_size_680'], 'em' ) ) {
				$data['data-font-size-680'] = $params['font_size_680'];
			} else {
				$data['data-font-size-680'] = $params['font_size_680'] . 'px';
			}
		}
		
		if ( $params['line_height_1366'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['line_height_1366'], 'px' ) || grandprix_mikado_string_ends_with( $params['line_height_1366'], 'em' ) ) {
				$data['data-line-height-1366'] = $params['line_height_1366'];
			} else {
				$data['data-line-height-1366'] = $params['line_height_1366'] . 'px';
			}
		}
		
		if ( $params['line_height_1024'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['line_height_1024'], 'px' ) || grandprix_mikado_string_ends_with( $params['line_height_1024'], 'em' ) ) {
				$data['data-line-height-1024'] = $params['line_height_1024'];
			} else {
				$data['data-line-height-1024'] = $params['line_height_1024'] . 'px';
			}
		}
		
		if ( $params['line_height_768'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['line_height_768'], 'px' ) || grandprix_mikado_string_ends_with( $params['line_height_768'], 'em' ) ) {
				$data['data-line-height-768'] = $params['line_height_768'];
			} else {
				$data['data-line-height-768'] = $params['line_height_768'] . 'px';
			}
		}
		
		if ( $params['line_height_680'] !== '' ) {
			if ( grandprix_mikado_string_ends_with( $params['line_height_680'], 'px' ) || grandprix_mikado_string_ends_with( $params['line_height_680'], 'em' ) ) {
				$data['data-line-height-680'] = $params['line_height_680'];
			} else {
				$data['data-line-height-680'] = $params['line_height_680'] . 'px';
			}
		}
		
		return $data;
	}
}