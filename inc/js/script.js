/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {
    //--slider
//    resize_slider();

    var currentSlide = 1;
    var maxNum = 3;
    var minNum = 1;
    
    window.setInterval(function(){
        slideUp();
        init();
    }, 4000);    
    
    init();
    
    $(".fa-chevron-right").click(function() {
        slideUp();
        init();
    });
    $(".fa-chevron-left").click(function() {
        if (currentSlide > minNum) {
            currentSlide--;
        }else if(currentSlide === minNum){
            currentSlide = maxNum;
        }
        init();
    });


    //show + hide chevrons when hover
    $(".slider-slide").hover(function() {
        $(".the-slider .navigation .fa-chevron-right,.the-slider .navigation .fa-chevron-left").fadeIn(300);
    }, function() {
        $(".the-slider .navigation .fa-chevron-right,.the-slider .navigation .fa-chevron-left").fadeOut(300);
    });
    
    // don't run event when hover over the chevron
//    $(".fa-chevron-right,.fa-chevron-left").hover(function(event) {
//        event.stopPropagation();
//    });

    function init(){
        hideSlides();
        showSlide();
    }
    function slideUp(){
         if (currentSlide < maxNum) {
            currentSlide ++;
        }else if(currentSlide === maxNum){
            currentSlide = minNum;
        }
    }
    

    function hideSlides() {
        $(".the-slider").children(".slider-slide").hide();
    }
    function showSlide() {
        $(".the-slider #slide" + currentSlide).fadeIn(600);
    }

    //--Match CTA Boxes height
    matchColHeights('.site-cta');

    //--CTA boxes
    $('.site-cta').hover(function() {
        $(this).css({
            'borderColor': '#ff6600'
        });
        $('.col-md-10', this).stop(true, false).animate({'bottom': '20px'}, 300);
        $('.btn', this).stop(true,false).fadeIn(300);
        $('h3', this).css({'color': '#ff6600'});

        $('.fa', this).css({
            'width': '85px',
            'height': '85px',
            'top': '-50px',
            'left': '-57px',
            'line-height': '85px',
            'color': '#ff6600',
            'borderColor': '#ff6600'
        });
    }, function() {
        $(this).css({
            'borderColor': '#444'
        });
        $('.col-md-10', this).stop(true, false).animate({'bottom': '0'}, 300);
        $('h3', this).css({'color': '#444'});
        $('.btn', this).stop(true,false).fadeOut(300);
        $('.fa', this).css({
            'width': '50px',
            'height': '50px',
            'top': '0',
            'left': '-40px',
            'line-height': '50px',
            'color': '#444',
            'borderColor': '#444'
        });
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