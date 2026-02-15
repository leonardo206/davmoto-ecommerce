<?php

if ( ! function_exists( 'grandprix_core_add_items_showcase_custom_shortcodes' ) ) {
	function grandprix_core_add_items_showcase_custom_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'GrandPrixCore\CPT\Shortcodes\ItemsShowcaseCustom\ItemsShowcaseCustom',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcode', 'grandprix_core_add_items_showcase_custom_shortcodes' );
}

if ( ! function_exists( 'grandprix_core_set_items_showcase_custom_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for item showcase shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function grandprix_core_set_items_showcase_custom_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-item-showcase-specific';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'grandprix_core_filter_add_vc_shortcodes_custom_icon_class', 'grandprix_core_set_items_showcase_custom_icon_class_name_for_vc_shortcodes' );
}