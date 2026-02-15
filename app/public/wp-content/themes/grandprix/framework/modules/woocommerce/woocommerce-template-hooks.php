<?php

if ( ! function_exists( 'grandprix_mikado_woocommerce_body_class' ) ) {
	function grandprix_mikado_woocommerce_body_class( $classes ) {
		if ( grandprix_mikado_is_woocommerce_page() ) {
			$classes[] = 'mkdf-woocommerce-page';
			
			if ( function_exists( 'is_shop' ) && is_shop() ) {
				$classes[] = 'mkdf-woo-main-page';
			}
			
			if ( is_singular( 'product' ) ) {
				$classes[] = 'mkdf-woo-single-page';
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woocommerce_body_class' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_columns_class' ) ) {
	function grandprix_mikado_woocommerce_columns_class( $classes ) {
		
		if ( is_singular( 'product' ) ) {
			$classes[] = grandprix_mikado_options()->getOptionValue( 'mkdf_woo_related_products_columns' );
		} else {
			$classes[] = grandprix_mikado_options()->getOptionValue( 'mkdf_woo_product_list_columns' );
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woocommerce_columns_class' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_columns_space_class' ) ) {
	function grandprix_mikado_woocommerce_columns_space_class( $classes ) {
		$woo_space_between_items = grandprix_mikado_options()->getOptionValue( 'mkdf_woo_product_list_columns_space' );
		
		if ( ! empty( $woo_space_between_items ) ) {
			$classes[] = 'mkdf-woo-' . $woo_space_between_items . '-space';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woocommerce_columns_space_class' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_pl_info_position_class' ) ) {
	function grandprix_mikado_woocommerce_pl_info_position_class( $classes ) {
		$info_position       = grandprix_mikado_options()->getOptionValue( 'mkdf_woo_product_list_info_position' );
		$info_position_class = '';
		
		if ( $info_position === 'info_below_image' ) {
			$info_position_class = 'mkdf-woo-pl-info-below-image';
		} else if ( $info_position === 'info_on_image_hover' ) {
			$info_position_class = 'mkdf-woo-pl-info-on-image-hover';
		}
		
		$classes[] = $info_position_class;
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woocommerce_pl_info_position_class' );
}

if ( ! function_exists( 'grandprix_mikado_add_woocommerce_shortcode_class' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return string
	 */
	function grandprix_mikado_add_woocommerce_shortcode_class( $classes ) {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking'
		);
		
		foreach ( $woocommerce_shortcodes as $woocommerce_shortcode ) {
			$has_shortcode = grandprix_mikado_has_shortcode( $woocommerce_shortcode );
			
			if ( $has_shortcode ) {
				$classes[] = 'mkdf-woocommerce-page woocommerce-account mkdf-' . str_replace( '_', '-', $woocommerce_shortcode );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_add_woocommerce_shortcode_class' );
}

if ( ! function_exists( 'grandprix_mikado_woo_single_product_thumb_position_class' ) ) {
	function grandprix_mikado_woo_single_product_thumb_position_class( $classes ) {
		$product_thumbnail_position = grandprix_mikado_get_meta_field_intersect( 'woo_set_thumb_images_position' );
		
		if ( ! empty( $product_thumbnail_position ) ) {
			$classes[] = 'mkdf-woo-single-thumb-' . $product_thumbnail_position;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woo_single_product_thumb_position_class' );
}

if ( ! function_exists( 'grandprix_mikado_woo_single_product_has_zoom_class' ) ) {
	function grandprix_mikado_woo_single_product_has_zoom_class( $classes ) {
		$zoom_maginifier = grandprix_mikado_get_meta_field_intersect( 'woo_enable_single_product_zoom_image' );
		
		if ( $zoom_maginifier === 'yes' ) {
			$classes[] = 'mkdf-woo-single-has-zoom';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woo_single_product_has_zoom_class' );
}

if ( ! function_exists( 'grandprix_mikado_woo_single_product_has_zoom_support' ) ) {
	function grandprix_mikado_woo_single_product_has_zoom_support() {
		$zoom_maginifier = grandprix_mikado_get_meta_field_intersect( 'woo_enable_single_product_zoom_image' );
		
		if ( $zoom_maginifier === 'yes' ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
	}
	
	add_action( 'init', 'grandprix_mikado_woo_single_product_has_zoom_support' );
}

if ( ! function_exists( 'grandprix_mikado_woo_single_product_image_behavior_class' ) ) {
	function grandprix_mikado_woo_single_product_image_behavior_class( $classes ) {
		$image_behavior = grandprix_mikado_get_meta_field_intersect( 'woo_set_single_images_behavior' );
		
		if ( ! empty( $image_behavior ) ) {
			$classes[] = 'mkdf-woo-single-has-' . $image_behavior;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'grandprix_mikado_woo_single_product_image_behavior_class' );
}

if ( ! function_exists( 'grandprix_mikado_woo_single_product_photo_swipe_support' ) ) {
	function grandprix_mikado_woo_single_product_photo_swipe_support() {
		$image_behavior = grandprix_mikado_get_meta_field_intersect( 'woo_set_single_images_behavior' );
		
		if ( $image_behavior === 'photo-swipe' ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
	}
	
	add_action( 'init', 'grandprix_mikado_woo_single_product_photo_swipe_support' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_products_per_page' ) ) {
	/**
	 * Function that sets number of products per page. Default is 9
	 * @return int number of products to be shown per page
	 */
	function grandprix_mikado_woocommerce_products_per_page() {
		$products_per_page_meta = grandprix_mikado_options()->getOptionValue( 'mkdf_woo_products_per_page' );
		$products_per_page      = ! empty( $products_per_page_meta ) ? intval( $products_per_page_meta ) : 12;
		
		return $products_per_page;
	}
	
	add_filter('loop_shop_per_page', 'grandprix_mikado_woocommerce_products_per_page', 20);
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_related_products_args' ) ) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 *
	 * @param $args array array of args for the query
	 *
	 * @return mixed array of changed args
	 */
	function grandprix_mikado_woocommerce_related_products_args( $args ) {
		$related = grandprix_mikado_options()->getOptionValue( 'mkdf_woo_related_products_columns' );
		
		if ( ! empty( $related ) ) {
			switch ( $related ) {
				case 'mkdf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'mkdf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 4;
			}
		} else {
			$args['posts_per_page'] = 4;
		}
		
		return $args;
	}
	
	add_filter('woocommerce_output_related_products_args', 'grandprix_mikado_woocommerce_related_products_args');
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_product_thumbnail_column_size' ) ) {
	/**
	 * Function that sets number of thumbnails on single product page per row. Default is 4
	 * @return int number of thumbnails to be shown on single product page per row
	 */
	function grandprix_mikado_woocommerce_product_thumbnail_column_size() {
		$thumbs_number_meta = grandprix_mikado_options()->getOptionValue( 'woo_number_of_thumb_images' );
		$thumbs_number      = ! empty ( $thumbs_number_meta ) ? intval( $thumbs_number_meta ) : 3;
		
		return apply_filters( 'grandprix_mikado_filter_number_of_thumbnails_per_row_single_product', $thumbs_number );
	}
	
	add_filter( 'woocommerce_product_thumbnails_columns', 'grandprix_mikado_woocommerce_product_thumbnail_column_size', 10 );
}

if ( ! function_exists( 'grandprix_mikado_set_single_product_thumbnails_size' ) ) {
	function grandprix_mikado_set_single_product_thumbnails_size( $size ) {
		return apply_filters( 'grandprix_mikado_filter_woocommerce_gallery_thumbnail_size', 'woocommerce_thumbnail' );
	}
	
	add_filter( 'woocommerce_gallery_thumbnail_size', 'grandprix_mikado_set_single_product_thumbnails_size' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function grandprix_mikado_woocommerce_template_loop_product_title() {
		$tag = grandprix_mikado_options()->getOptionValue( 'mkdf_products_list_title_tag' );
		if ( $tag === '' ) {
			$tag = 'h5';
		}
		
		the_title( '<' . $tag . ' class="mkdf-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>' );
	}
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function grandprix_mikado_woocommerce_template_single_title() {
		$tag = grandprix_mikado_options()->getOptionValue( 'mkdf_single_product_title_tag' );
		if ( $tag === '' ) {
			$tag = 'h1';
		}
		
		the_title( '<' . $tag . '  itemprop="name" class="mkdf-single-product-title">', '</' . $tag . '>' );
	}
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_sale_flash' ) ) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function grandprix_mikado_woocommerce_sale_flash() {
		global $product;
		
		if ( ! empty( $product ) ) {
			return '<span class="mkdf-onsale">' . grandprix_mikado_get_woocommerce_sale( $product ) . '</span>';
		}
	}
	
	add_filter( 'woocommerce_sale_flash', 'grandprix_mikado_woocommerce_sale_flash' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_product_out_of_stock' ) ) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function grandprix_mikado_woocommerce_product_out_of_stock() {
		global $product;
		
		if ( ! $product->is_in_stock() ) {
			print '<span class="mkdf-sold">' . esc_html__( 'Sold', 'grandprix' ) . '</span>';
		}
	}
	
	add_filter( 'woocommerce_product_thumbnails', 'grandprix_mikado_woocommerce_product_out_of_stock', 20 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'grandprix_mikado_woocommerce_product_out_of_stock', 10 );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_new_flash' ) ) {
	/**
	 * Function for adding new flash template
	 *
	 * @return string
	 */
	function grandprix_mikado_woocommerce_new_flash() {
		$new = get_post_meta( get_the_ID(), 'mkdf_show_new_sign_woo_meta', true );
		
		if ( $new === 'yes' ) {
			print '<span class="mkdf-new-product">' . esc_html__( 'New', 'grandprix' ) . '</span>';
		}
	}
	
	add_filter( 'woocommerce_product_thumbnails', 'grandprix_mikado_woocommerce_new_flash', 21 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'grandprix_mikado_woocommerce_new_flash', 11 );
}

function grandprix_mikado_woocommerce_product_add_to_cart_text( $text, $product ) {
	/**
	 * Function for wrapping html around Add to Cart Text
	 */
	$button_html = '<span class="mkdf-btn-predefined-line-holder">
			                        <span class="mkdf-btn-line-hidden"></span>
			                        <span class="mkdf-btn-text">' . $text . '</span>
			                        <span class="mkdf-btn-line"></span>
			                        <i class="mkdf-icon-ion-icon ion-ios-play "></i>
			                        </span>';
	
	return $button_html;
}

function grandprix_mikado_woocommerce_loop_add_to_cart_link( $button_html, $product, $args ) {
	/**
	 * wp_kses_post() instead of esc() because of the additional html around Add to Cart Text
	 */
	return sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		wp_kses_post( $product->add_to_cart_text() )
	);
}

function grandprix_mikado_woocommerce_proced_to_checkout() {
	/**
	 * Proced to checkout button modified
	 */
	$button_html = '';
	$button_html .= '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="checkout-button button alt wc-forward">';
	$button_html .= '<span class="mkdf-btn-predefined-line-holder">';
	$button_html .= '<span class="mkdf-btn-line-hidden"></span>';
	$button_html .= '<span class="mkdf-btn-text">' . esc_html__( 'Proceed to checkout', 'grandprix' ) . '</span>';
	$button_html .= '<span class="mkdf-btn-line"></span>';
	$button_html .= '<i class="mkdf-icon-ion-icon ion-ios-play "></i>';
	$button_html .= '</span></a>';
	
	echo grandprix_mikado_get_module_part($button_html);
	
}

function mkdf_woocommerce_pagination_args( $array ) {
	/**
	 * adds html to prev and next pagination
	 */
	$array['next_text'] = '<span class="mkdf-woo-nav-label">'.esc_attr__( 'Next' , 'grandprix').'</span>
						   <span class="mkdf-woo-nav-mark ion-ios-play"></span>';
	
	$array['prev_text'] = '<span class="mkdf-woo-nav-mark ion-ios-play"></span>
						   <span class="mkdf-woo-nav-label">'.esc_attr__( 'Prev' , 'grandprix').'</span>';
	return $array;
};

if ( ! function_exists( 'grandprix_mikado_single_product_content_additional_tag_before' ) ) {
	function grandprix_mikado_single_product_content_additional_tag_before() {
		
		print '<div class="mkdf-single-product-content">';
	}
}

if ( ! function_exists( 'grandprix_mikado_single_product_content_additional_tag_after' ) ) {
	function grandprix_mikado_single_product_content_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_single_product_summary_additional_tag_before' ) ) {
	function grandprix_mikado_single_product_summary_additional_tag_before() {
		
		print '<div class="mkdf-single-product-summary">';
	}
}

if ( ! function_exists( 'grandprix_mikado_single_product_summary_additional_tag_after' ) ) {
	function grandprix_mikado_single_product_summary_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_holder_additional_tag_before' ) ) {
	function grandprix_mikado_pl_holder_additional_tag_before() {
		
		print '<div class="mkdf-pl-main-holder">';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_holder_additional_tag_after' ) ) {
	function grandprix_mikado_pl_holder_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_inner_additional_tag_before' ) ) {
	function grandprix_mikado_pl_inner_additional_tag_before() {
		
		print '<div class="mkdf-pl-inner">';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_inner_additional_tag_after' ) ) {
	function grandprix_mikado_pl_inner_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_image_additional_tag_before' ) ) {
	function grandprix_mikado_pl_image_additional_tag_before() {
		
		print '<div class="mkdf-pl-image">';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_image_additional_tag_after' ) ) {
	function grandprix_mikado_pl_image_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_inner_text_additional_tag_before' ) ) {
	function grandprix_mikado_pl_inner_text_additional_tag_before() {
		
		print '<div class="mkdf-pl-text"><div class="mkdf-pl-text-outer"><div class="mkdf-pl-text-inner">';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_inner_text_additional_tag_after' ) ) {
	function grandprix_mikado_pl_inner_text_additional_tag_after() {
		
		print '</div></div></div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_text_wrapper_additional_tag_before' ) ) {
	function grandprix_mikado_pl_text_wrapper_additional_tag_before() {
		
		print '<div class="mkdf-pl-text-wrapper">';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_text_wrapper_additional_tag_after' ) ) {
	function grandprix_mikado_pl_text_wrapper_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_before' ) ) {
    function grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_before() {

        print '<div class="mkdf-pl-text-wrapper-inner">';
    }
}

if ( ! function_exists( 'grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_after' ) ) {
    function grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_after() {

        print '</div>';
    }
}

if ( ! function_exists( 'grandprix_mikado_custom_woocommerce_review_display_gravatar_size' ) ) {
	
	function grandprix_mikado_custom_woocommerce_review_display_gravatar_size( $comment ) {
		echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '118' ), '' );
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_rating_additional_tag_before' ) ) {
	function grandprix_mikado_pl_rating_additional_tag_before() {
		global $product;
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$rating_html = wc_get_rating_html( $product->get_average_rating() );
			
			if ( $rating_html !== '' ) {
				print '<div class="mkdf-pl-rating-holder">';
			}
		}
	}
}

if ( ! function_exists( 'grandprix_mikado_pl_rating_additional_tag_after' ) ) {
	function grandprix_mikado_pl_rating_additional_tag_after() {
		global $product;
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$rating_html = wc_get_rating_html( $product->get_average_rating() );
			
			if ( $rating_html !== '' ) {
				print '</div>';
			}
		}
	}
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_share' ) ) {
	/**
	 * Function that social share for product page
	 *
	 * @see grandprix_mikado_get_social_share_html - available params type, icon_type and title
	 *
	 * Return social share html
	 */
	function grandprix_mikado_woocommerce_share() {
		if ( grandprix_mikado_is_plugin_installed( 'core' ) && grandprix_mikado_options()->getOptionValue( 'enable_social_share' ) == 'yes' && grandprix_mikado_options()->getOptionValue( 'enable_social_share_on_product' ) == 'yes' ) :
			echo '<div class="mkdf-woo-social-share-holder">';
			echo grandprix_mikado_get_social_share_html( array( 'type' => 'list', 'title' => esc_attr__('Share:', 'grandprix') ) );
			echo '</div>';
		endif;
	}
}

if ( ! function_exists( 'grandprix_mikado_product_meta_title' ) ) {
    /**
     * Function that adds title in product meta section
     */
    function grandprix_mikado_product_meta_title() {
        echo '<span class="mkdf-product-meta-title">'.esc_attr__('Quick Info', 'grandprix').'</span>';
    }
}


if( ! function_exists('grandprix_mikado_pl_category')){
    function grandprix_mikado_pl_category() {
        global $product;

        print '<div class="mkdf-pl-category">' . wc_get_product_category_list($product->get_id(), '') . '</div>';
    }
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_single_product_title' ) ) {
	/**
	 * Function that checks option for single product title and overrides it with filter
	 */
	function grandprix_mikado_woocommerce_single_product_title( $show_title_area ) {
		if ( is_singular( 'product' ) ) {
			$woo_title_meta = get_post_meta( get_the_ID(), 'mkdf_show_title_area_woo_meta', true );
			
			if ( empty( $woo_title_meta ) ) {
				$woo_title_main = grandprix_mikado_options()->getOptionValue( 'show_title_area_woo' );
				
				if ( ! empty( $woo_title_main ) ) {
					$show_title_area = $woo_title_main == 'yes';
				}
			} else {
				$show_title_area = $woo_title_meta == 'yes';
			}
		}
		
		return $show_title_area;
	}
	
	add_filter( 'grandprix_mikado_filter_show_title_area', 'grandprix_mikado_woocommerce_single_product_title' );
}

if ( ! function_exists( 'grandprix_mikado_set_title_text_output_for_woocommerce' ) ) {
	function grandprix_mikado_set_title_text_output_for_woocommerce( $title ) {
		
		if ( grandprix_mikado_is_woo_archive_page() ) {
			global $wp_query;
			
			$tax            = $wp_query->get_queried_object();
			$category_title = $tax->name;
			$title          = $category_title;
		} elseif ( grandprix_mikado_is_woocommerce_shop() ) {
			$shop_id = grandprix_mikado_get_woo_shop_page_id();
			$title   = $shop_id !== -1 ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'grandprix' );
		}
		
		return $title;
	}
	
	add_filter( 'grandprix_mikado_filter_title_text', 'grandprix_mikado_set_title_text_output_for_woocommerce' );
}

if ( ! function_exists( 'grandprix_mikado_set_breadcrumbs_output_for_woocommerce' ) ) {
	function grandprix_mikado_set_breadcrumbs_output_for_woocommerce( $childContent, $delimiter, $before, $after ) {
		$shop_id = grandprix_mikado_get_woo_shop_page_id();
		
		if ( grandprix_mikado_is_woo_archive_page() ) {
			$childContent = '';
			
			if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
				$childContent .= '<a itemprop="url" href="' . get_permalink( $shop_id ) . '">' . get_the_title( $shop_id ) . '</a>' . $delimiter;
			}
			
			$mkdf_taxonomy_id        = get_queried_object_id();
			$mkdf_taxonomy_type      = is_tax( 'product_tag' ) ? 'product_tag' : 'product_cat';
			$mkdf_taxonomy           = ! empty( $mkdf_taxonomy_id ) ? get_term_by( 'id', $mkdf_taxonomy_id, $mkdf_taxonomy_type ) : '';
			$mkdf_taxonomy_parent_id = isset( $mkdf_taxonomy->parent ) && $mkdf_taxonomy->parent !== 0 ? $mkdf_taxonomy->parent : '';
			$mkdf_taxonomy_parent    = $mkdf_taxonomy_parent_id !== '' ? get_term_by( 'id', $mkdf_taxonomy_parent_id, $mkdf_taxonomy_type ) : '';
			
			if ( ! empty( $mkdf_taxonomy_parent ) ) {
				$childContent .= '<a itemprop="url" href="' . get_term_link( $mkdf_taxonomy_parent->term_id ) . '">' . $mkdf_taxonomy_parent->name . '</a>' . $delimiter;
			}
			
			if ( ! empty( $mkdf_taxonomy ) ) {
				$childContent .= $before . esc_attr( $mkdf_taxonomy->name ) . $after;
			}
			
		} elseif ( is_singular( 'product' ) ) {
			$childContent = '';
			$product      = wc_get_product( get_the_ID() );
			$categories   = ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), ', ' ) : '';
			
			if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
				$childContent .= '<a itemprop="url" href="' . get_permalink( $shop_id ) . '">' . get_the_title( $shop_id ) . '</a>' . $delimiter;
			}
			
			if ( ! empty( $categories ) ) {
				$childContent .= $categories . $delimiter;
			}
			
			$childContent .= $before . get_the_title() . $after;
			
		} elseif ( grandprix_mikado_is_woocommerce_shop() ) {
			$childContent = $before . get_the_title( $shop_id ) . $after;
		}
		
		return $childContent;
	}
	
	add_filter( 'grandprix_mikado_filter_breadcrumbs_title_child_output', 'grandprix_mikado_set_breadcrumbs_output_for_woocommerce', 10, 4 );
}

if ( ! function_exists( 'grandprix_mikado_set_sidebar_layout_for_woocommerce' ) ) {
	function grandprix_mikado_set_sidebar_layout_for_woocommerce( $sidebar_layout ) {
		
		if ( is_archive() && ( is_product_category() || is_product_tag() ) ) {
			$sidebar_layout = grandprix_mikado_get_meta_field_intersect( 'sidebar_layout', grandprix_mikado_get_woo_shop_page_id() );
		}
		
		return $sidebar_layout;
	}
	
	add_filter( 'grandprix_mikado_filter_sidebar_layout', 'grandprix_mikado_set_sidebar_layout_for_woocommerce' );
}

if ( ! function_exists( 'grandprix_mikado_set_sidebar_name_for_woocommerce' ) ) {
	function grandprix_mikado_set_sidebar_name_for_woocommerce( $sidebar_name ) {
		
		if ( is_archive() && ( is_product_category() || is_product_tag() ) ) {
			$sidebar_name = grandprix_mikado_get_meta_field_intersect( 'custom_sidebar_area', grandprix_mikado_get_woo_shop_page_id() );
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'grandprix_mikado_filter_sidebar_name', 'grandprix_mikado_set_sidebar_name_for_woocommerce' );
}

function grandprix_mikado_get_add_to_cart_text() {
	global $product;

	$text = $product->is_purchasable() && $product->is_in_stock() ? esc_html__('Add To Cart', 'grandprix') : esc_html__('Read More', 'grandprix');

	return $text;
}