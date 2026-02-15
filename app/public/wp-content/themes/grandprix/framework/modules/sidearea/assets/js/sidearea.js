(function($) {
    "use strict";

    var sidearea = {};
    mkdf.modules.sidearea = sidearea;

    sidearea.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdfOnDocumentReady() {
	    mkdfSideArea();
    }
	
	/**
	 * Show/hide side area
	 */
    function mkdfSideArea() {
		var wrapper = $('.mkdf-wrapper'),
			sideMenu = $('.mkdf-side-menu'),
			sideMenuButtonOpen = $('a.mkdf-side-menu-button-opener'),
			cssClass,
			//Flags
			slideFromRight = false,
			slideWithContent = false,
			slideUncovered = false;
		
		if (mkdf.body.hasClass('mkdf-side-menu-slide-from-opener')) {
			$('.mkdf-cover').remove();
			cssClass = 'mkdf-right-side-menu-opened';
			wrapper.prepend('<div class="mkdf-cover"/>');
			slideFromRight = true;
		}
		
		$('a.mkdf-side-menu-button-opener, a.mkdf-close-side-menu').on('click', function (e) {
			e.preventDefault();
			var thisItem = $(this);
			
			if (thisItem.hasClass('mkdf-side-menu-opener-trigger') && thisItem.parents('.mkdf-page-header').length) {
				var openerPosition = thisItem.offset().top;
				var openerHeight = thisItem.outerHeight();
	
				sideMenu.css({
					'top': openerPosition + openerHeight - mkdf.scroll + 'px',
					'height': 'calc(100vh - ' + (openerPosition + openerHeight - mkdf.scroll + parseInt(sideMenu.css('right'), 10)) + 'px)'
				});
			}
			
	        if (!sideMenuButtonOpen.hasClass('opened')) {
		        sideMenuButtonOpen.addClass('opened');
		        mkdf.body.addClass(cssClass);
		        mkdf.modules.common.mkdfDisableScroll();
		
		        if (slideFromRight) {
			        $('.mkdf-wrapper .mkdf-cover').on('click', function () {
				        mkdf.body.removeClass('mkdf-right-side-menu-opened');
				        sideMenuButtonOpen.removeClass('opened');
				        mkdf.modules.common.mkdfEnableScroll();
			        });
		        }
		
		        if (slideUncovered) {
			        sideMenu.css({
				        'visibility': 'visible'
			        });
		        }
		
		        var currentScroll = $(window).scrollTop();
		        $(window).scroll(function () {
			        if (Math.abs(mkdf.scroll - currentScroll) > 400) {
				        mkdf.body.removeClass(cssClass);
				        sideMenuButtonOpen.removeClass('opened');
				        if (slideUncovered) {
					        var hideSideMenu = setTimeout(function () {
						        sideMenu.css({'visibility': 'hidden'});
						        clearTimeout(hideSideMenu);
					        }, 400);
				        }
			        }
		        });
            } else {
	            sideMenuButtonOpen.removeClass('opened');
	            mkdf.body.removeClass(cssClass);
		        mkdf.modules.common.mkdfEnableScroll();
	
	            if (slideUncovered) {
		            var hideSideMenu = setTimeout(function () {
			            sideMenu.css({'visibility': 'hidden'});
			            clearTimeout(hideSideMenu);
		            }, 400);
	            }
            }
	
	        if (slideWithContent) {
		        e.stopPropagation();
		
		        wrapper.on('click', function () {
			        e.preventDefault();
			        sideMenuButtonOpen.removeClass('opened');
			        mkdf.body.removeClass('mkdf-side-menu-open');
		        });
	        }
        });

        if(sideMenu.length){
            mkdf.modules.common.mkdfInitPerfectScrollbar().init(sideMenu);
        }
    }

})(jQuery);
