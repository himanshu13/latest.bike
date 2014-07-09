
jQuery(document).ready(function ($) {

    //////////////////////////////////////////////////////////////////////////	
    // News ticker
    //////////////////////////////////////////////////////////////////////////

	if (jQuery().simplyScroll) {
    $("#scroller").simplyScroll({
        autoMode: 'loop',
        speed: 1,
        frameRate: 30
    });
	}

    //////////////////////////////////////////////////////////////////////////	
    // Fixed Main Menu
    //////////////////////////////////////////////////////////////////////////
	if (jQuery().sticky) {
	$("#main-menu").sticky({ 
 	topSpacing: 0 
	});
	}
    //////////////////////////////////////////////////////////////////////////	
    // Menu
    //////////////////////////////////////////////////////////////////////////
    var mainmenu = $('#menu-top, #mainmenu').superfish({
        delay: 500,
        animation: {
            opacity: 'show',
            height: 'show'
        },
        speed: 'fast',
        autoArrows: false,
        dropShadows: false,
        disableHI: true
        //add options here if required
    });



    //////////////////////////////////////////////////////////////////////////	
    // Hovers images
    //////////////////////////////////////////////////////////////////////////

    $('.triple img, .review-post img, .widget.rec img, .themeloy-popularpost-widget img, .bi_recent_entries img, .carousel img, .post-tab-home img, .cat_recent_entries img, .flickr_badge_image img, .post-news img, .post a img, .relativepost img, .moreincategories img, .page-full a img, .page-sidebar a img').hover(function () {
        $(this).stop().animate({
            opacity: 0.7
        }, {
            queue: false,
            duration: 200
        });
    }, function () {
        $(this).stop().animate({
            opacity: 1
        }, {
            queue: false,
            duration: 200
        });
    });

    //////////////////////////////////////////////////////////////////////////	
    // Search and Share
    //////////////////////////////////////////////////////////////////////////

    var $ticker = $("#tickersearchform");
    var $social = $(".socialdrop");
    $ticker.data('bSearch', false);
    $social.data('cSocial', false);

    var closeSearch = function () {

        $ticker.data('bSearch', false);
        $ticker.slideUp(400, 'easeInOutQuart');

    };

    var openSearch = function () {

        $ticker.data('bSearch', true);
        $ticker.slideDown(400, 'easeInOutQuart');
      
    };

    var $body = $("body");
    $("#tickersearch").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
       var $isSearch = $ticker.data('bSearch');
        if ($isSearch === true) {
            closeSearch();
        } else {
            openSearch();
            closeSocial();
            $ticker.on("click", function (e) {
                e.stopPropagation();
            });
            $body.one("click", function (e) {
                closeSearch();
            });
        }
    });

    var closeSocial = function () {

        $social.data('cSocial', false);
        $social.slideUp(400, 'easeInOutQuart');
    };

    var openSocial = function () {

        $social.data('cSocial', true);
        $social.slideDown(400, 'easeInOutQuart');
    };

    $("#tickersocial").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $cSocial = $social.data('cSocial');

        if ($cSocial === true) {
            closeSocial();
        } else {
            openSocial();
            closeSearch();
            $social.on("click", function (e) {
                e.stopPropagation();
            });
            $body.one("click", function (e) {
                closeSocial();
            });
        }
    });


    //////////////////////////////////////////////////////////////////////////	
    // Flex Slider
    //////////////////////////////////////////////////////////////////////////	 

    if (jQuery().flexslider) {
        $('.flexslider').flexslider({
            animation: "fade",
            slideshow: true,
            animationLoop: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    }
	
	//////////////////////////////////////////////////////////////////////////
	//				Audio / Video
	//////////////////////////////////////////////////////////////////////////
	$('audio').mediaelementplayer({
			audioWidth: '100%'
		});
	

    //////////////////////////////////////////////////////////////////////////	
    // Select menu
    //////////////////////////////////////////////////////////////////////////

    selectnav('mainmenu', {
        label: 'Navigation Menu',
        nested: true,
        indent: '-'
    });
    selectnav('menu-top', {
        label: 'Navigation Menu',
        nested: true,
        indent: '-'
    });

    //////////////////////////////////////////////////////////////////////////	
    // Carousel
    //////////////////////////////////////////////////////////////////////////

    var $itemcarousel = $('.jcarousel');
    if ($itemcarousel.length) {
        var caroWidth = 220;
        $itemcarousel.jcarousel({
            wrap: 'both',
            //auto: 2, 
            animation: 1000,
            easing: 'easeInOutExpo', //easeInBack, easeOutQuart
            setupCallback: function (carousel) {
                carousel.reload();
            },
            reloadCallback: function (carousel) {
                var num = Math.round(carousel.clipping() / caroWidth);
                carousel.options.scroll = num;
                carousel.options.visible = num;
            }
        });

    }


    //////////////////////////////////////////////////////////////////////////	
    // To top
    //////////////////////////////////////////////////////////////////////////

    $().UItoTop({
        scrollSpeed: 800,
        easingType: 'easeInOutExpo'
    });


    //////////////////////////////////////////////////////////////////////////	
    // Tab
    //////////////////////////////////////////////////////////////////////////		
    var $tabsNav = $('.tabs-nav'),
        $tabsNavLis = $tabsNav.children('li');
    $tabsNav.each(function () {
        var $this = $(this);
        $this.next().children('.tab-content').stop(true, true).hide()
            .first().show();
       $this.children('li').first().addClass('active').stop(true, true).show();
    });
    $tabsNavLis.on('click', function (e) {
        var $this = $(this);
        $this.siblings().removeClass('active').end()
            .addClass('active');
        $this.parent().next().children('.tab-content').stop(true, true).hide()
            .siblings($this.find('a').attr('href')).fadeIn();
        e.preventDefault();
    });

    //////////////////////////////////////////////////////////////////////////	
    // Alert
    //////////////////////////////////////////////////////////////////////////

    $(".close").live("click", function () {
        $(this).parent().fadeOut('slow');
    });
	




$(window).load(function () { autoHeight (); });




$(window).resize( function(e) { $(".sidebar_center, .sidebar_content, .sidebar_last").removeAttr("style"); 
	autoHeight (); });

	function autoHeight () {	
	
	var maxHeight;	
	var lastSidebar;
	maxHeight = Math.max($(".sidebar_center").height(), $(".sidebar_content").height(), $(".sidebar_last").height());
	
	var	$widthWidth  = $(window).width();
	
	if($widthWidth >= 960) { 
		$(".sidebar_center, .sidebar_content, .sidebar_last").height(maxHeight);
		
	}else if((	$widthWidth > 745) && (	$widthWidth < 959) ){
	
		$(".sidebar_center, .sidebar_content").removeAttr("style");
		
		
		maxHeight = $(".sidebar_center").height() + $(".sidebar_last").height();
		
		if( maxHeight > $(".sidebar_content").height()) 
		{
			$(".sidebar_content").height(maxHeight);
				
			} else {			
				
			lastSidebar =  $(".sidebar_content").height() - ($(".sidebar_center").height());
			$(".sidebar_last").height(lastSidebar);
		}
		
		/* Two columns height */
		maxCols = Math.max($(".sidebar_center").height(), $(".sidebar_content").height());
		$(".two-columns-layout .sidebar_center").height(maxCols); 
		$(".two-columns-layout .sidebar_content").height(maxCols);
		
		
		
	} else { $(".sidebar_center, .sidebar_content, .sidebar_last").removeAttr("style");}
	
	}
	



    //////////////////////////////////////////////////////////////////////////	
    // END SCRIPT
    //////////////////////////////////////////////////////////////////////////
});


 
