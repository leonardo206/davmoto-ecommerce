(function($) {
    'use strict';
    
    var scrollingImage = {};
    mkdf.modules.scrollingImage = scrollingImage;

    scrollingImage.mkdfScrollingImage = mkdfScrollingImage;

    scrollingImage.mkdfOnDocumentReady = mkdfOnDocumentReady;
    
    $(document).ready(mkdfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfScrollingImage();
    }
    
    /**
     * Init Scrolling Image effect
     */
    function mkdfScrollingImage() {
        var scrollingImageShortcodes = $('.mkdf-image-with-text-holder.mkdf-image-behavior-scrolling-image');

        if (scrollingImageShortcodes.length) {
            scrollingImageShortcodes.each(function(){
                var scrollingImageShortcode = $(this),
                    scrollingImageContentHolder = scrollingImageShortcode.find('.mkdf-iwt-image'),
                    scrollingFrame = scrollingImageShortcode.find('.mkdf-iwt-frame'),
                    scrollingFrameHeight,
                    scrollingImage = scrollingImageShortcode.find('.main-image'),
                    scrollingImageHeight,
                    delta,
                    timing,
                    scrollable = false;

                var sizing = function() {
                    scrollingFrameHeight = scrollingFrame.height();
                    scrollingImageHeight = scrollingImage.height();
                    delta = Math.round(scrollingImageHeight - scrollingFrameHeight);
                    timing = Math.round(scrollingImageHeight/scrollingFrameHeight)*1.4;
                 
                   
                    if (scrollingImageHeight > scrollingFrameHeight) {
                        scrollable = true;
                    }
                    
                }

                var scrollAnimation = function() {
                    //scroll animation on hover
                    scrollingImageContentHolder.mouseenter(function(){
                        scrollingImage.css('transition-duration',timing+'s'); //transition duration set in relation to image height
                        scrollingImage.css('transform', 'translate3d(0px, -'+delta+'px, 0px)');
                    });

                    //scroll animation reset
                    scrollingImageContentHolder.mouseleave(function(){
                        if (scrollable) {
                            scrollingImage.css('transition-duration', Math.min(timing/2, 3) +'s');
                            scrollingImage.css('transform', 'translate3d(0px, 0px, 0px)');
                        }
                    });
                };

                //init
                scrollingImageShortcode.waitForImages(function(){
                    scrollingImageShortcode.css('visibility', 'visible');
                    sizing();
                    scrollAnimation();
                });

                $(window).resize(function(){
                    sizing();
                });
            });
        }
    }
})(jQuery);