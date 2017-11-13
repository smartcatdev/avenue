/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function ($) {
    //--Match CTA Boxes height
    matchColHeights('.site-cta');
    matchColHeights('#top-banner #sc_avenue_recent_posts .col-sm-3');

    //--CTA boxes
    $('.site-cta').hover(function () {
        $(this).addClass('sc-primary-border');
        $('.col-md-10', this).stop(true, false).animate({'bottom': '20px'}, 300);
        $('.btn', this).stop(true, false).fadeIn(300);
        $('h3', this).addClass('sc-primary-color');

        $('.fa', this).css({
            'width': '85px',
            'height': '85px',
            'top': '-50px',
            'left': '-57px',
            'line-height': '85px',
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
            'line-height': '50px',
            fontSize: '28px'
        }).removeClass('sc-primary-color sc-primary-border');
    });

    //------------------- Match Height Function
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

    function resize_slider() {
        var w = $('#main-slider').width();
        $('#slider_container,#slider_container > div').width(w);
    }

    $('.scroll-top').click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    $('.menu-toggle').html('<i class="fa fa-bars fa-lg"></i>');

    var wow = new WOW(
            {
                boxClass: 'avenue-animate',
                animateClass: 'animated',
                offset: 150,
                mobile: true,
                live: true,
                callback: function (box) {

                }
            }
    );
    wow.init();
    
    $('.site-branding').sticky({
        topSpacing  : '0'
    });
    $('.site-branding').on('sticky-start', function() { 
        $(this).addClass('animated fadeInDown');
    });
    $('.site-branding').on('sticky-end', function() { 
        $(this).removeClass('animated fadeInDown');
    });
});