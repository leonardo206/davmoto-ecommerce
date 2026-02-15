(function($) {
	'use strict';

	var itemsShowcaseCustom = {};
	mkdf.modules.itemsShowcaseCustom = itemsShowcaseCustom;
	
	itemsShowcaseCustom.mkdfInitItemsShowcaseCustom = mkdfInitItemsShowcaseCustom;
	itemsShowcaseCustom.mkdfOnDocumentReady = mkdfOnDocumentReady;

	$(document).ready(mkdfOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
		mkdfInitItemsShowcaseCustom();
	}

	/**
	 * Init items showcase custom shortcode
	 */
	
	function mkdfInitItemsShowcaseCustom() {
		var itemsShowcaseCustom = $('.mkdf-items-showcase-custom-holder');
		
		if (itemsShowcaseCustom.length) {
			itemsShowcaseCustom.each(function () {
				var itemsShowcaseCustomHolder = $(this),
					mediaSection = $(this).find('.mkdf-issc-media-section'),
					infoSection = $(this).find('.mkdf-issc-main-image-holder'),
					mediaItem = mediaSection.find('.mkdf-issc-media-image');
				
				
				if (!itemsShowcaseCustomHolder.hasClass('mkdf-has-appear-animation')) {
					mediaSection.find('.mkdf-issc-media-image:first-child').addClass('mkdf-active');
				} else {
					itemsShowcaseCustomHolder.appear(function () {
						setTimeout(function(){
							mediaSection.find('.mkdf-issc-media-image:first-child').addClass('mkdf-active');
						}, 500);
					}, {
						accX: 0,
						accY: 50
					});
				}
				
				itemsShowcaseCustomHolder.find('.mkdf-issc-main-image-holder:first-child').addClass('mkdf-active');
				
				mediaItem.on('click', function (e) {
					var currentIndex = $(this).data('index');
					mediaItem.removeClass('mkdf-active');
					$(this).addClass('mkdf-active');
					infoSection.removeClass('mkdf-active');
					itemsShowcaseCustomHolder.find('.mkdf-issc-main-image-holder').eq(currentIndex).addClass('mkdf-active');
				});
			});
		}
	}
})(jQuery);