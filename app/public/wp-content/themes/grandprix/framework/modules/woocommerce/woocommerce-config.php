<?php

// Adds theme support for WooCommerce
add_theme_support( 'woocommerce' );

// Disable the default WooCommerce stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if ( ! function_exists( 'grandprix_mikado_disable_woocommerce_pretty_photo' ) ) {
	/**
	 * Function that disable WooCommerce pretty photo script and style
	 */
	function grandprix_mikado_disable_woocommerce_pretty_photo() {
		if ( grandprix_mikado_load_woo_assets() ) {
			
			wp_deregister_style( 'woocommerce_prettyPhoto_css' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'grandprix_mikado_disable_woocommerce_pretty_photo' );
}

if ( ! function_exists( 'grandprix_mikado_woocommerce_content' ) ) {
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function grandprix_mikado_woocommerce_content() {
		
		if ( is_singular( 'product' ) ) {
			
			while ( have_posts() ) : the_post();
				
				wc_get_template_part( 'content', 'single-product' );
			
			endwhile;
			
		} else {
			
			if ( have_posts() ) {
				
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				
				woocommerce_product_loop_start();
				
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						
						/**
						 * Hook: woocommerce_shop_loop.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
						
						wc_get_template_part( 'content', 'product' );
					}
				}
				
				woocommerce_product_loop_end();
				
				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
		}
	}
}

/*************** PRODUCT LISTS FILTERS - begin ***************/

	//Add additional html tags around product lists
	add_action( 'woocommerce_before_shop_loop', 'grandprix_mikado_pl_holder_additional_tag_before', 35 );
	add_action( 'woocommerce_after_shop_loop', 'grandprix_mikado_pl_holder_additional_tag_after', 5 );
	
	//Add additional html tag around product elements
	add_action( 'woocommerce_before_shop_loop_item', 'grandprix_mikado_pl_inner_additional_tag_before', 5 );
	
	//Remove open and close link position
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	
	//Add additional html tags around image and marks
	add_action( 'woocommerce_before_shop_loop_item_title', 'grandprix_mikado_pl_image_additional_tag_before', 5 );
	add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_image_additional_tag_after', 6 );
	add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_image_additional_tag_after', 1 );

	//Add category
	add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_category', 24 );
	add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_category', 7 );

	//Add open and close link position
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_open', 40 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 40 );

	//Change Add To Cart HTML
	add_filter( 'woocommerce_product_add_to_cart_text', 'grandprix_mikado_woocommerce_product_add_to_cart_text', 10, 2);
	add_filter( 'woocommerce_loop_add_to_cart_link', 'grandprix_mikado_woocommerce_loop_add_to_cart_link', 10, 3);

	// Change Pagination HTML
	add_filter( 'woocommerce_pagination_args', 'mkdf_woocommerce_pagination_args', 10, 1 );

	/*************** Product Info Position Is On Image Hover ***************/
	
		//Add additional html tag around product elements
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_inner_additional_tag_after', 22 );
		
		//Add additional html around product info elements
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_inner_text_additional_tag_before', 5 );
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_inner_text_additional_tag_after', 15 );

		//Add additional html around category and rating elements
        add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_before', 6 );
        add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_after', 11 );
		
		//Override product title with our own html
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_woocommerce_template_loop_product_title', 12 );
		
		//Add additional html tags around rating star element
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_rating_additional_tag_before', 9 );
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'grandprix_mikado_pl_rating_additional_tag_after', 11 );
		
		//Change rating star position
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_rating', 10 );
		
		//Change price position
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_price', 13 );
		
		//Change add to cart position
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'grandprix_mikado_action_woo_pl_info_on_image_hover', 'woocommerce_template_loop_add_to_cart', 13 );

/*************** Product Info Position Is Below Image ***************/

		//Add additional html tag around product elements
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_inner_additional_tag_after', 21 );
		
		//Add additional html at the end of product info elements
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_text_wrapper_additional_tag_before', 22 );
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_text_wrapper_additional_tag_after', 35 );
		
        //Add additional html around category and rating elements
        add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_before', 23 );
        add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_category_and_rating_wrapper_additional_tag_after', 28 );

        //Add additional html tags around rating star element
        add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_rating_additional_tag_before', 25 );
        add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_rating_additional_tag_after', 27 );

        //Change rating star position
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
        add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'woocommerce_template_loop_rating', 26 );
		
		//Override product title with our own html
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_woocommerce_template_loop_product_title', 29 );
		
		//Change price position
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'woocommerce_template_loop_price', 30 );

		//Add additional html around add to cart element
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_inner_text_additional_tag_before', 1 );
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'grandprix_mikado_pl_inner_text_additional_tag_after', 3 );

		//Change add to cart position
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'grandprix_mikado_action_woo_pl_info_below_image', 'woocommerce_template_loop_add_to_cart', 2 );

/*************** PRODUCT LISTS FILTERS - end ***************/

/*************** PRODUCT SINGLE FILTERS - begin ***************/

	//Add additional html around single product summary and images
	add_action( 'woocommerce_before_single_product_summary', 'grandprix_mikado_single_product_content_additional_tag_before', 5 );
	add_action( 'woocommerce_after_single_product_summary', 'grandprix_mikado_single_product_content_additional_tag_after', 1 );
	
	//Add additional html around single product summary
	add_action( 'woocommerce_before_single_product_summary', 'grandprix_mikado_single_product_summary_additional_tag_before', 30 );
	add_action( 'woocommerce_after_single_product_summary', 'grandprix_mikado_single_product_summary_additional_tag_after', 5 );

	//Change sale mark position
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 20 );
	
	//Change title position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'grandprix_mikado_woocommerce_template_single_title', 5 );
	
	//Change price position
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 8 );

	//Add social share (default woocommerce_share)
	add_action( 'woocommerce_product_meta_end', 'grandprix_mikado_woocommerce_share', 50 );

    //Add title for product meta
	add_action( 'woocommerce_product_meta_start', 'grandprix_mikado_product_meta_title', 0 );

	//Change product tabs position
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 50 );

	// Change Comment author image thumnail size
	remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
	add_action( 'woocommerce_review_before', 'grandprix_mikado_custom_woocommerce_review_display_gravatar_size', 10 );

/*************** PRODUCT SINGLE FILTERS - end ***************/
	remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
	add_action( 'woocommerce_proceed_to_checkout', 'grandprix_mikado_woocommerce_proced_to_checkout', 20 );
