<?php

if ( ! function_exists( 'grandprix_mikado_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function grandprix_mikado_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'grandprix_mikado_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function grandprix_mikado_get_dropdown_cart_icon_class() {
		$classes = array(
			'mkdf-header-cart'
		);
		
		$classes[] = grandprix_mikado_get_icon_sources_class( 'dropdown_cart', 'mkdf-header-cart' );
		
		return implode( ' ', $classes );
	}
}