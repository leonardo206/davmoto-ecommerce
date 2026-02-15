(function ($) {
	'use strict';
	
	var dualImageCarousel = {};
	mkdf.modules.dualImageCarousel = dualImageCarousel;
	
	dualImageCarousel.mkdfDualImageCarousel = mkdfDualImageCarousel;
	
	dualImageCarousel.mkdfOnDocumentReady = mkdfOnDocumentReady;
	
	$(document).ready(mkdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdfOnDocumentReady() {
		mkdfDualImageCarousel();
	}

	/*
	 ** Dual Image Carousel
	*/
    function mkdfDualImageCarousel() {
        var swipers = $('.swiper-container.mkdf-dual-image-carousel');

        if (swipers.length) {
            swipers.each(function () {
                var swiper = $(this),
                    activeSlide = swiper.find('.mkdf-swiper-active-slide'),
                    allSlides = swiper.find('.mkdf-swiper-all-slides'),
                    swiperSlidesTitles = new Array(),
                    swiperSlide = swiper.find('.swiper-slide'),
                    foregroundSlidePosition = swiper.data('foreground-slides-position');

                swiperSlide.each(function () {
                    swiperSlidesTitles.push($(this).data('swiper-title'));
                    if (foregroundSlidePosition !== '') {
                        $(this).find('.mkdf-slide-foreground-image-holder').css('margin-top', foregroundSlidePosition);
                    }
                });

                var swiperSlider = new Swiper(swiper, {
                    loop: true,
                    parallax: true,
                    speed: 1000,
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 45,
                    navigation: {
                        nextEl: '.mkdf-swiper-button-next',
                        prevEl: '.mkdf-swiper-button-prev',
                    },
	                pagination: {
		                el: '.swiper-pagination',
		                type: 'bullets',
		                clickable: true
	                },
                });

                $(this).waitForImages(function() {
                    var navPrev = $(this).find('.mkdf-swiper-button-prev'),
                        navNext = $(this).find('.mkdf-swiper-button-next'),
                        activeImageHeight = $(this).find('.mkdf-slide-background-image').height();

                    navPrev.css('top', activeImageHeight/2 + 'px');
                    navNext.css('top', activeImageHeight/2 + 'px');
                });
	
	            var bullet = $( '.swiper-pagination-bullet' ),
		            bulletWidth = bullet.width(),
		            leftOffset = 0,
		            pagLine = swiper.find('.mkdf-pagination-line');
	
	            var setPagLine = function(leftOffset) {
		            pagLine.css({
			            'left': parseInt(leftOffset)
		            });
	            };
	            
	            pagLine.width(bulletWidth);//sets width of a bullet to a pagination line
	            
	            swiperSlider.on('slideChange', function () {
		            bullet.each(function () {
			            if ($(this).hasClass( 'swiper-pagination-bullet-active' )) {
				            leftOffset = $(this).position().left;
			            }
		            });
		            setPagLine(leftOffset);
	            });
	            
	            bullet.mouseenter(function() {
		            leftOffset = $(this).position().left;
		            setTimeout(function(){
			            setPagLine(leftOffset);
		            }, 100);
	            });
	            
	            bullet.mouseleave(function() {
		            bullet.each(function () {
			            if ($(this).hasClass( 'swiper-pagination-bullet-active' )) {
				            leftOffset = $(this).position().left;
			            }
		            });
		            setTimeout(function(){
			            setPagLine(leftOffset);
		            }, 100);
	            });
            });
        }
    }
    
})(jQuery);