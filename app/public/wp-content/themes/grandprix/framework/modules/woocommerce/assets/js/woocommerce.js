(function($) {
    'use strict';

    var woocommerce = {};
    mkdf.modules.woocommerce = woocommerce;
	
	woocommerce.mkdfOnWindowLoad = mkdfOnWindowLoad;
    woocommerce.mkdfOnDocumentReady = mkdfOnDocumentReady;
	
	$(window).on('load', mkdfOnWindowLoad);
    $(document).ready(mkdfOnDocumentReady);
    
    /* 
        All functions to be called on $(window).on('load', ) should be in this function
    */
    function mkdfOnWindowLoad() {
	    mkdfChangeFilterButton();
	    mkdfChangeSingleATCButton();
    }
    
    /*
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdfOnDocumentReady() {
        mkdfInitQuantityButtons();
        mkdfInitSelect2();
	    mkdfInitSingleProductLightbox();
	    mkdfChangeViewCart();
    }
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function mkdfInitQuantityButtons() {
		$(document).on('click', '.mkdf-quantity-minus, .mkdf-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.mkdf-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('mkdf-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if(newInputValue >= 10){
                    inputField.val(newInputValue);
				} else if (newInputValue >= 1) {
					inputField.val('0'+ newInputValue);
				} else {
					inputField.val('0'+ 0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						if (newInputValue >= 10){
							inputField.val(max);
						} else {
							inputField.val('0'+ max);
						}
					} else {
						if (newInputValue >= 10){
                            inputField.val(newInputValue);
						} else {
                            inputField.val('0'+ newInputValue);
						}
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function mkdfInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.mkdf-woocommerce-page .mkdf-content .variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
		
		var defaultMonsterWidgets = $('.widget.widget_archive select, .widget.widget_categories select, .widget.widget_text select');
		if (defaultMonsterWidgets.length && typeof defaultMonsterWidgets.select2 === 'function') {
			defaultMonsterWidgets.select2();
		}
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function mkdfInitSingleProductLightbox() {
		var item = $('.mkdf-woo-single-page.mkdf-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof mkdf.modules.common.mkdfPrettyPhoto === "function") {
				mkdf.modules.common.mkdfPrettyPhoto();
			}
		}
	}
	
	/**
	 * Initializes SVG icon instead of add to cart text
	 */
	function mkdfChangeViewCart() {
		
		var holder = $('.mkdf-pl-main-holder, .mkdf-pl-holder , .mkdf-plc-holder, .related ul.products');
		
		if (holder.length) {
			
			mkdf.body.on('added_to_cart', function (e, fragments, cart_hash, $button) {
				
				setTimeout(function () {
					if ($button.length) {
						var addedButton = $button.siblings('.added_to_cart');
						
						if (addedButton.length) {
							addedButton.empty().html('<span class="mkdf-btn-predefined-line-holder">' +
													'<span class="mkdf-btn-line-hidden"></span>' +
													'<span class="mkdf-btn-text">'+ wc_add_to_cart_params.i18n_view_cart +
													'</span><span class="mkdf-btn-line"></span><i class="mkdf-icon-ion-icon ion-ios-play "></i>' +
													'</span>');
						}
					}
				}, 10);
			});
		}
	}
	
	/**
	 * Additional HTML for price filter widget button
	 */
	function mkdfChangeFilterButton () {
		
		var holder = $('.widget.woocommerce.widget_price_filter .price_slider_amount .button');
		
		if (holder.length) {
			
			holder.html(
				'<span class="mkdf-btn-predefined-line-holder">' +
				'<span class="mkdf-btn-line-hidden"></span>' +
				'<span class="mkdf-btn-text">'+ 'filter' +
				'</span><span class="mkdf-btn-line"></span><i class="mkdf-icon-ion-icon ion-ios-play "></i>' +
				'</span>'
			);
			
			holder.addClass('mkdf-visible');
		}
	}
	
	/**
	 * Additional HTML for Single Add To Cart Button
	 */
	function mkdfChangeSingleATCButton () {
		
		var holder = $('.mkdf-single-product-summary .cart .single_add_to_cart_button');
		
		if (holder.length) {
			
			// holder.html(
			// 	'<span class="mkdf-btn-predefined-line-holder">' +
			// 	'<span class="mkdf-btn-line-hidden"></span>' +
			// 	'<span class="mkdf-btn-text">'+ 'add to cart' +
			// 	'</span><span class="mkdf-btn-line"></span><i class="mkdf-icon-ion-icon ion-ios-play "></i>' +
			// 	'</span>'
			// );
			
			holder.addClass('mkdf-visible');
		}
	}

})(jQuery);