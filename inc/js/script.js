/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {

    $('.sc-slider').unslider({
        speed: 500, //  The speed to animate each slide (in milliseconds)
        delay: 4000, //  The delay between slide animations (in milliseconds)
        complete: function() {
        }, //  A function that gets called after every slide animation
        keys: true, //  Enable keyboard (left, right) arrow shortcuts
        dots: true, //  Display dot navigation
        fluid: true,              //  Support responsive design. May break non-responsive designs
    });    

    //--Match CTA Boxes height
    matchColHeights('.site-cta');

    //--CTA boxes
    $('.site-cta').hover(function() {
        $(this).addClass('sc-primary-border');
        $('.col-md-10', this).stop(true, false).animate({'bottom': '20px'}, 300);
        $('.btn', this).stop(true, false).fadeIn(300);
        $('h3', this).addClass('sc-primary-color');

        $('.fa', this).css({
            'width': '85px',
            'height': '85px',
            'top': '-50px',
            'left': '-57px',
            'line-height': '85px'
        }).addClass('sc-primary-color sc-primary-border');
    }, function() {
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
        }).removeClass('sc-primary-color sc-primary-border');
    });



    //------------------- Match Height Function
    function matchColHeights(selector) {
        var maxHeight = 0;
        $(selector).each(function() {
            var height = $(this).height();
            if (height > maxHeight) {
                maxHeight = height;
            }
        });
        $(selector).height(maxHeight);
    }
    ;

    function resize_slider() {
        var w = $('#main-slider').width();
        $('#slider_container,#slider_container > div').width(w);
    }

    $('.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });

    $('.menu-toggle').html('<i class="fa fa-bars fa-lg"></i>');


});