<?php

if ( ! function_exists( 'grandprix_core_enqueue_scripts_for_preview_slider_shortcodes' ) ) {
	/**
	 * Function that includes all necessary 3rd party scripts for this shortcode
	 */
	function grandprix_core_enqueue_scripts_for_preview_slider_shortcodes() {
		wp_enqueue_script( 'slick', GRANDPRIX_CORE_SHORTCODES_URL_PATH . '/preview-slider/assets/js/plugins/slick.min.js', array( 'jquery' ), false, true );
	}

	add_action( 'grandprix_mikado_action_enqueue_third_party_scripts', 'grandprix_core_enqueue_scripts_for_preview_slider_shortcodes' );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_mkdf_Preview_Slider extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'grandprix_core_add_preview_slider_shortcodes' ) ) {
	function grandprix_core_add_preview_slider_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'GrandprixCore\CPT\Shortcodes\PreviewSlider\PreviewSlider',
			'GrandprixCore\CPT\Shortcodes\PreviewSlider\PreviewSlide'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcode', 'grandprix_core_add_preview_slider_shortcodes' );
}

if ( ! function_exists( 'grandprix_core_set_preview_slider_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for preview slider shortcode
	 */
	function grandprix_core_set_preview_slider_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.wpb_content_element.wpb_mkdf_preview_slide > .wpb_element_wrapper {
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcodes_custom_style', 'grandprix_core_set_preview_slider_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'grandprix_core_set_preview_slider_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for preview slider shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function grandprix_core_set_preview_slider_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-preview-slider';
		$shortcodes_icon_class_array[] = '.icon-wpb-preview-slide';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcodes_custom_icon_class', 'grandprix_core_set_preview_slider_icon_class_name_for_vc_shortcodes' );
}