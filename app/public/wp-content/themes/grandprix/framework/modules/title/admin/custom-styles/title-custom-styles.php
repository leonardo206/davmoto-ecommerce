<?php

foreach ( glob( GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'grandprix_mikado_title_area_typography_style' ) ) {
	function grandprix_mikado_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = grandprix_mikado_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-page-title'
		);
		
		echo grandprix_mikado_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = grandprix_mikado_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-page-subtitle'
		);
		
		echo grandprix_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'grandprix_mikado_action_style_dynamic', 'grandprix_mikado_title_area_typography_style' );
}


if ( ! function_exists( 'grandprix_mikado_page_title_area_mobile_style' ) ) {
	function grandprix_mikado_page_title_area_mobile_style($style) {

		$current_style = '';
		$page_id       = grandprix_mikado_get_page_id();
		$class_prefix  = grandprix_mikado_get_unique_page_class( $page_id, true );

		$res_start = '@media only screen and (max-width: 1024px) {';
		$res_end   = '}';
		$item_styles   = array();
		
		$title_responsive_width = grandprix_mikado_get_meta_field_intersect( 'title_area_height_mobile', $page_id );
		$title_hide_bg_image    = grandprix_mikado_get_meta_field_intersect( 'title_area_background_image_hide_on_mobile', $page_id );
		
		$item_selector = array(
			$class_prefix . ' .mkdf-title-holder',
			$class_prefix . ' .mkdf-title-holder .mkdf-title-wrapper'
		);
		
		$image_holder_selector = array(
			$class_prefix . ' .mkdf-title-holder .mkdf-title-image',
		);
		
		$image_selector = array(
			$class_prefix . ' .mkdf-title-holder .mkdf-title-image img',
		);

		if ( $title_responsive_width !== '' ) {
			$item_styles['height'] = grandprix_mikado_filter_suffix( $title_responsive_width, 'px') . 'px !important' ;
		}

		if ( $title_hide_bg_image === 'yes' ) {
			$image_holder_styles['height'] = grandprix_mikado_filter_suffix( $title_responsive_width, 'px') . 'px !important' ;
			$image_styles['display'] = 'none !important' ;
		}

		if(!empty($item_styles)) {
			$current_style .= $res_start . grandprix_mikado_dynamic_css( $item_selector, $item_styles ) . $res_end;
            $image_holder_styles = isset($image_holder_styles) ? $image_holder_styles : ' ';
			$current_style .= $res_start . grandprix_mikado_dynamic_css( $image_holder_selector, $image_holder_styles ) . $res_end;
            $image_styles = isset($image_styles) ? $image_styles : ' ';
			$current_style .= $res_start . grandprix_mikado_dynamic_css( $image_selector, $image_styles ) . $res_end;
		}

		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter( 'grandprix_mikado_filter_add_page_custom_style', 'grandprix_mikado_page_title_area_mobile_style' );
}