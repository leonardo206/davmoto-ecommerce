<?php
namespace GrandprixCore\CPT\Shortcodes\PreviewSlider;

use GrandprixCore\Lib;

class PreviewSlide implements Lib\ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'mkdf_preview_slide';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Preview Slide', 'grandprix-core'),
					'base' => $this->base,
					'as_child' => array('only' => 'mkdf_preview_slide'),
					'content_element' => true,
					'category' => esc_html__('by GRANDPRIX', 'grandprix-core'),
					'icon' => 'icon-wpb-preview-slide extended-custom-icon',
					'show_settings_on_create' => true,
					'params' => array(
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Laptop Image', 'grandprix-core'),
							'param_name' => 'ps_laptop_image'
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Tablet Image', 'grandprix-core'),
							'param_name' => 'ps_tablet_image'
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__('Phone Image', 'grandprix-core'),
							'param_name' => 'ps_mobile_image'
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Navigation Color', 'grandprix-core'),
							'param_name' => 'ps_color'
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'ps_laptop_image'	=> '',
			'ps_tablet_image'	=> '',
			'ps_mobile_image'	=> '',
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;

		$html = grandprix_core_get_shortcode_module_template_part('templates/preview-slide-template', 'preview-slider', '', $params);

		return $html;
	}




}
