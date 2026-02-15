(function($) {
    'use strict';

    var interactiveLinkShowcase = {};
    mkdf.modules.interactiveLinkShowcase = interactiveLinkShowcase;

    interactiveLinkShowcase.mkdfInitInteractiveLinkShowcase = mkdfInitInteractiveLinkShowcase;
    interactiveLinkShowcase.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);


    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
        mkdfInitInteractiveLinkShowcase();
    }

    /**
     * Init item showcase shortcode
     */
    function mkdfInitInteractiveLinkShowcase() {
        var interactiveLinkShowcase = $('.mkdf-ils-holder');
	
	    if (interactiveLinkShowcase.length) {
		    interactiveLinkShowcase.each(function(){
			    var thisInteractiveLinkShowcase = $(this),
				    singleImage = thisInteractiveLinkShowcase.find('.mkdf-ils-item-image'),
				    singleLink  = thisInteractiveLinkShowcase.find('.mkdf-ils-item-link');
			    
			    singleImage.eq(0).addClass('mkdf-active');
			    thisInteractiveLinkShowcase.find('.mkdf-ils-item-link[data-index="0"]').addClass('mkdf-active');
			
			    singleLink.children().on('touchstart mouseenter', function() {
				    var thisLink = $(this).parent(),
					    index = parseInt( thisLink.data('index'), 10 );
				
				    singleImage.removeClass('mkdf-active').eq(index).addClass('mkdf-active');
				    singleLink.removeClass('mkdf-active');
				    thisInteractiveLinkShowcase.find('.mkdf-ils-item-link[data-index="'+index+'"]').addClass('mkdf-active');
			    });
		    });
	    }
    }

})(jQuery);