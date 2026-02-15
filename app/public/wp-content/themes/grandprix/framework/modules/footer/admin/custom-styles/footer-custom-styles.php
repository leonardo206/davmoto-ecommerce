<?php

if ( ! function_exists( 'grandprix_mikado_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function grandprix_mikado_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = grandprix_mikado_options()->getOptionValue( 'footer_top_background_color' );
		$border_color     = grandprix_mikado_options()->getOptionValue( 'footer_top_border_color' );
		$border_width     = grandprix_mikado_options()->getOptionValue( 'footer_top_border_width' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $border_color ) ) {
			$item_styles['border-color'] = $border_color;
			
			if ( $border_width === '' ) {
				$item_styles['border-width'] = '1px';
			}
		}
		
		if ( $border_width !== '' ) {
			$item_styles['border-width'] = grandprix_mikado_filter_px( $border_width ) . 'px';
		}
		
		echo grandprix_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-top-holder', $item_styles );
	}
	
	add_action( 'grandprix_mikado_action_style_dynamic', 'grandprix_mikado_footer_top_general_styles' );
}

if ( ! function_exists( 'grandprix_mikado_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function grandprix_mikado_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = grandprix_mikado_options()->getOptionValue( 'footer_bottom_background_color' );
		$border_color     = grandprix_mikado_options()->getOptionValue( 'footer_bottom_border_color' );
		$border_width     = grandprix_mikado_options()->getOptionValue( 'footer_bottom_border_width' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $border_color ) ) {
			$item_styles['border-color'] = $border_color;
			
			if ( $border_width === '' ) {
				$item_styles['border-width'] = '1px';
			}
		}
		
		if ( $border_width !== '' ) {
			$item_styles['border-width'] = grandprix_mikado_filter_px( $border_width ) . 'px';
		}
		
		echo grandprix_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'grandprix_mikado_action_style_dynamic', 'grandprix_mikado_footer_bottom_general_styles' );
}