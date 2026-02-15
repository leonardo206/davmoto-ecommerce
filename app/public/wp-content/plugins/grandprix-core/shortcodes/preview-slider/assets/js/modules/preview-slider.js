(function($) {
	'use strict';
	
	var previewSlider = {};
	mkdf.modules.previewSlider = previewSlider;
	
	previewSlider.mkdfInitPreviewSlider = mkdfInitPreviewSlider;
	
	
	previewSlider.mkdfOnDocumentReady = mkdfOnDocumentReady;
	
	$(document).ready(mkdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
        mkdfInitPreviewSlider();
		mkdfSetColorPreviewSlider();
	}

    /*
     **	Init Preview Slider - Start
     */

    function mkdfInitPreviewSlider() {

        var sliders = $('.mkdf-preview-slider');
        sliders.each(function() {

            var slider = $(this);

            var autoplay = false,
                autoPlaySpeed = 1800;

            if(typeof slider.data('autoplay') !== 'undefined' && slider.data('autoplay') == 'yes'){
                autoplay = true;
            }

            if(typeof slider.data('autoplay-speed') !== 'undefined' && slider.data('autoplay-speed') !== false){
                autoPlaySpeed = slider.data('autoplay-speed');
            }

            var slickImages = {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: autoPlaySpeed,
	            asNavFor:'.mkdf-ps-dots-holder-inner',
	            arrows: false,
	            vertical: true,
	            easing: 'easeInOutCubic',
	            draggable: false,
	            infinite: true,
	            pauseOnHover: false
            };
	
	        var slickPagination = {
		        slidesToShow: 5,
		        slidesToScroll: 1,
		        autoplay: true,
		        autoplaySpeed: autoPlaySpeed,
		        asNavFor: '.mkdf-ps-mobile-images,.mkdf-ps-laptop-images,.mkdf-ps-tablet-images',
		        focusOnSelect: true,
		        variableWidth: true,
		        draggable: false,
		        infinite: true,
		        pauseOnHover: false
	        };

            var tabletSlider = slider.find('.mkdf-ps-tablet-images').slick(slickImages);
	        var laptopSlider = slider.find('.mkdf-ps-laptop-images').slick(slickImages);
	        var mobileSlider = slider.find('.mkdf-ps-mobile-images').slick(slickImages);
	        var dotsSlider = slider.find('.mkdf-ps-dots-holder-inner').slick(slickPagination);
	        
            slider.addClass('mkdf-preview-slider-loaded');

        });
    }
	
	function mkdfSetColorPreviewSlider(){
    	function setColor(color) {
		    $('.mkdf-ps-tagline').css({
			    "color": color
		    });
		
		    $('.mkdf-background-holder').css({
			    "background-color": color
		    });
	    }
	    
		$('.mkdf-preview-slider').find('.mkdf-ps-dots-holder-inner').on('beforeChange', function(event, slick, currentSlide){
			var color = '';
			var dots = $('.mkdf-ps-dot');
			
			setTimeout(function () {
				var activeCurrent = $('.mkdf-ps-dots-holder-inner').find('.slick-current');
				color = activeCurrent.css( "background-color" );
				setColor(color);
			}, 100);
		});
	}
})(jQuery);