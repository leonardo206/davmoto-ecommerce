<?php
namespace GrandPrixCore\CPT\Shortcodes\DualImageCarousel;

use GrandPrixCore\Lib;

class DualImageCarousel implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_dual_image_carousel';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/*
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		if (function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__('Dual Image Carousel', 'grandprix-core'),
					'base'                      => $this->base,
					'category'                  => esc_html__('by GRANDPRIX', 'grandprix-core'),
					'icon'                      => 'icon-wpb-dual-image-carousel extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'foreground_slides_position',
						 	'heading'     => esc_html__('Foreground slides position', 'grandprix-core'),
						 	'description' => esc_html__( 'Default value is -25%', 'grandprix-core' ),
						),
						array(
							'type'       => 'param_group',
							'heading'    => esc_html__('Dual Image Carousel Slides', 'grandprix-core'),
							'param_name' => 'dual_image_carousel_slides',
							'value'      => '',
							'params'     => array(
								array(
									'type'        => 'attach_image',
									'param_name'  => 'background_image',
									'heading'     => esc_html__('Background Image', 'grandprix-core'),
									'description' => esc_html__('Select image from media library', 'grandprix-core')
								),
								array(
									'type'        => 'attach_image',
									'param_name'  => 'foreground_image',
									'heading'     => esc_html__('Foreground Image', 'grandprix-core'),
									'description' => esc_html__('Select image from media library', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'tagline',
									'heading'     => esc_html__('Tagline', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'title',
									'heading'     => esc_html__('Title', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'link',
									'heading'     => esc_html__('Link', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'link_text',
									'heading'     => esc_html__('Link Text', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'       => 'dropdown',
									'param_name' => 'target',
									'heading'    => esc_html__( 'Target', 'grandprix-core' ),
									'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
									'dependency' => array( 'element' => 'link', 'not_empty' => true ),
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'custom_mark',
									'heading'     => esc_html__('Custom Mark', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								)
							)
						)
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'link_text'                  => 'Read More',
			'foreground_slides_position' => '',
			'dual_image_carousel_slides' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['content'] = $content;

		$params['dual_image_carousel'] = vc_param_group_parse_atts($atts['dual_image_carousel_slides']);
		$params['data_params'] = $this->getDataParams($params);
		$params['dualImagesCarouselClasses'] = $this->getDualImagesCarouselClasses($params);

		//Get HTML from template
		return grandprix_core_get_shortcode_module_template_part( 'templates/dual-image-carousel', 'dual-image-carousel', '', $params );
	}

	/**
	 * Return Fullscreen Objects data params
	 *
	 * @param $params
	 * @return array
	 */
	private function getDataParams($params) {
		$data = array();
		
		$slider_data['data-enable-autoplay']        = 'no';

		if (!empty($params['foreground_slides_position'])) {	
			$data['data-foreground-slides-position'] = $params['foreground_slides_position'];
		}

		return $data;
	}

	private function getDualImagesCarouselClasses( $params ) {
		$dualImagesCarouselClasses = array(
			'mkdf-dual-image-carousel',
			'swiper-container', 
			'full-page'
		);
		
		return $dualImagesCarouselClasses;
	}
}