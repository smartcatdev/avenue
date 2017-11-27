jQuery(document).ready(function ($) {
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Camera Slider
    //__________________________________________________________________________

    if ( $('#avenue_slider_wrap').length > 0 ) {

        var overlayer_active = false,
            height_adjustment = false;

        $('#avenue_slider_wrap').camera({
            height: avenueSlider.desktop_height + '%',
            pagination: ( avenueSlider.pagination == 'on' ) ? true : false,
            navigation: ( avenueSlider.navigation == 'on' ) ? true : false,
            fx: avenueSlider.animation.toString(),
            time: parseInt(avenueSlider.slide_timer),
            transPeriod: parseInt(avenueSlider.animation_speed),
            hover: ( avenueSlider.hover == 'on' ) ? true : false,
            thumbnails: false,
            overlayer: true,
            playPause : false,
            loader: 'pie',
            onLoaded: function() {
                if ( ! overlayer_active ) {
                    $('.camera_overlayer').animate({
                        opacity: 1,
                    }, 1000 );
                    overlayer_active = true;
                }
                if ( ! height_adjustment ) {
                    $('#parent-slider-wrap').css( 'height', 'auto' );    
                    height_adjustment = true;
                }
            }
        });

    }
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Match CTA Heights
    //__________________________________________________________________________
    
    // Match CTA Boxes height
    matchColHeights('.site-cta');
    matchColHeights('#homepage-area-a #sc_avenue_recent_posts .col-sm-3');

    // CTA boxes
    $('.site-cta').hover(function () {
        
        $(this).addClass('sc-primary-border');
        $('.col-md-10', this).stop(true, false).animate({'bottom': '20px'}, 300);
        $('.btn', this).stop(true, false).fadeIn(300);
        $('h3', this).addClass('sc-primary-color');

        $('.fa', this).css({
            'width': '85px',
            'height': '85px',
            'top': '-40px',
            'left': '-57px',
            'line-height': '84px',
            fontSize: '40px'
        }).addClass('sc-primary-color sc-primary-border');
    }, function () {
        $(this).removeClass('sc-primary-border');
        $('.col-md-10', this).stop(true, false).animate({'bottom': '0'}, 300);
        $('h3', this).removeClass('sc-primary-color');
        $('.btn', this).stop(true, false).fadeOut(300);
        $('.fa', this).css({
            'width': '50px',
            'height': '50px',
            'top': '0',
            'left': '-40px',
            'line-height': '48px',
            fontSize: '28px'
        }).removeClass('sc-primary-color sc-primary-border');
    });

    // Match Height Function
    function matchColHeights(selector) {
        var maxHeight = 0;
        $(selector).each(function () {
            var height = $(this).height();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });
        $(selector).height(maxHeight);
    }
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Mobile Menu - bigSlide.js
    //__________________________________________________________________________

    function delayedSlide() {
        slideTimeoutID = window.setTimeout( initBigSlide, 200);
    }

    function initBigSlide() {
        $( 'div#mobile-menu-wrap nav#menu' ).fadeIn();
        clearBigSlideTimeout();
    }

    function clearBigSlideTimeout() {
        window.clearTimeout( slideTimeoutID );
    }
    
    delayedSlide();

    $( '#mobile-menu-trigger, #mobile-menu-close, #mobile-overlay' ).bigSlide({
        menu: ( '#mobile-menu-wrap' ),
        side: 'left',
        afterOpen: function() {
            $('#mobile-overlay').stop().fadeIn();
            $('#mobile-menu-close').stop().fadeIn();
        },
        beforeClose: function() {
            $('#mobile-menu-close').stop().fadeOut();
            $('#mobile-overlay').stop().fadeOut();
        }
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Mobile Menu Collapse/Expand
    //__________________________________________________________________________

    $( 'div#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children' ).prepend( '<div class="submenu-button-wrap"><span class="fa fa-plus"></span></div>' );

    $( 'div#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children span' ).on( 'click', function() {
        $(this).parent().stop().toggleClass('submenu-rotated').find('span').toggleClass('fa-plus fa-minus');
        $(this).parent().parent().find( '> ul.sub-menu' ).stop().slideToggle( 400 );
    });
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Scroll to Top
    //__________________________________________________________________________
    
    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Resize Slider
    //__________________________________________________________________________
    
    //    function resize_slider() {
    //        var w = $('#main-slider').width();
    //        $('#slider_container,#slider_container > div').width(w);
    //    }

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Inject Hamburger Menu
    //__________________________________________________________________________

    $('.menu-toggle').html('<i class="fa fa-bars fa-lg"></i>');

    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Initialize Wow.js
    //__________________________________________________________________________

    var wow = new WOW(
        {
            offset: 150,
            mobile: true,
            live: true,
            callback: function (box) {

            }
        }
    );
    wow.init();
    
    //¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯
    //  Sticky.js
    //__________________________________________________________________________
    
    $('#site-branding-sticky-wrap').sticky({
         topSpacing : ( $('body').hasClass('admin-bar') ? $('#wpadminbar').height() : '0' ),
    });
    
    $('#site-branding-sticky-wrap').on('sticky-start', function() { 
        $(this).addClass('animated fadeInDown');
    });
    
    $('#site-branding-sticky-wrap').on('sticky-end', function() { 
        $(this).removeClass('animated fadeInDown');
    });
    
});