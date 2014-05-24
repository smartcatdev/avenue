/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {
    //--slider
//    resize_slider();

    var currentSlide = 1;
    var progress = 0;
    var maxNum = 6;
    var minNum = 1;

    $(".multi-options").hide();
    hideSlides();
    showSlide();

    $("#begin-survey").click(function() {
        currentSlide++;
        hideSlides();
        showSlide();
    });

    $(".progress li a").click(function() {
        currentSlide = $(this).html();
        hideSlides();
        showSlide();
    });

    //multi-option slide
//    $(".q3").click(function() {
//        if ($(".q3:checked").val() == "Crowdfunding alternative approaches") {
//            $(".multi-options").show();
//        } else {
//            $(".multi-options").hide();
//        }
//    });
    $(".fa-chevron-right").click(function() {

        // progress bar
        if ($(":radio:checked", "#slide" + currentSlide).val() !== undefined && $(".progress-bar").width() < 200) {
            $(".progress-bar").animate({"width": "+=50"});
        }


        if (currentSlide < maxNum) {
            if (5 == currentSlide) {
//                if ($(":radio:checked", "#slide2").val() !== undefined && $(":radio:checked", "#slide3").val() !== undefined && $(":radio:checked", "#slide4").val() !== undefined && $(":radio:checked", "#slide5").val() !== undefined) {
//                    currentSlide++;
//                } else {
//                    $(".err-message").html("You haven't answered all the questions. Please go back to fix this");
//                    a
//                }

            } else {
                currentSlide++;

            }
        }
        hideSlides();
        showSlide();
    });
    $(".fa-chevron-left").click(function() {
        $(".err-message").html("");
        if (currentSlide > minNum) {
            currentSlide--;
        }
        hideSlides();
        showSlide();
    });


    //show + hide chevrons when hover
    $(".survey-slide").hover(function() {
        $(".the-survey .navigation .fa-chevron-right,.the-survey .navigation .fa-chevron-left").fadeIn(300);
    }, function() {
        $(".the-survey .navigation .fa-chevron-right,.the-survey .navigation .fa-chevron-left").fadeOut(300);
    });
    
    // don't run event when hover over the chevron
    $(".fa-chevron-right,.fa-chevron-left").hover(function(event) {
        event.stopPropagation();
    });


    function hideSlides() {
        $(".the-survey").children(".survey-slide").hide();
    }
    function showSlide() {
        $(".the-survey #slide" + currentSlide).fadeIn(750);
    }

    //--Match CTA Boxes height
    matchColHeights('.site-cta');

    //--CTA boxes
    $('.site-cta').hover(function() {
        $(this).css({
            'borderColor': '#ff6600'
        });
        $('.col-md-10', this).stop(true, false).animate({'bottom': '20px'}, 300);
        $('.btn', this).fadeIn(300);
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
        $('.btn', this).fadeOut(300);
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


//        $('.fa',this).addClass('scale125').delay(300).addClass('transition').addClass('scale11');
//        $(this).css({
//           'borderColor':'#ff6600' 
//        });
//        $('.fa',this).css({
//            'color':'#ff6600',
//            'borderColor':'#ff6600'
//            }).stop(true,false).animate({
//                'width':'85px',
//                'height':'85px',
//                'top':'-20px',
//                'left':'-57px',
//                'line-height': '85px',
//            },75,'linear',function(){
//                $(this).stop(true,false).animate({
//                    'width':'50px',
//                    'height':'50px',
//                    'line-height':'50px',
//                    'top':'-35px',
//                    'left':'-40px'
//                },200,'linear',function(){
//
//                });
//            });
//    },function(){
//        $(this).css({
//           'borderColor':'#444' 
//        });
//        $('.fa',this).css({
//            'color':'#444',
//            'borderColor':'#444'
//        });
//        $('.fa',this).stop(true,false).animate({
//            'top':'0'
//        },200,'linear');
//    });

    //crowdfunding survey


    var currentSlide = 1;
    var progress = 0;
    var maxNum = 6;
    var minNum = 1;

    $(".multi-options").hide();
    hideSlides();
    showSlide();

    $("#begin-survey").click(function() {
        currentSlide++;
        hideSlides();
        showSlide();
    });

    $(".progress li a").click(function() {
        currentSlide = $(this).html();
        hideSlides();
        showSlide();
    });

    //----------chevron funcionality
    $(".fa-chevron-right").click(function() {
        
        if (currentSlide < maxNum) {
            if (5 == currentSlide) {
            } else {
                currentSlide++;
            }
        }
        hideSlides();
        showSlide();
    });
    $(".fa-chevron-left").click(function() {

        if (currentSlide > minNum) {
            currentSlide--;
        }
        hideSlides();
        showSlide();
    });

    //show + hide chevrons when hover
//    $(".survey-slide").hover(function() {
//        var selector = '.the-survey .navigation .fa-chevron-right,.the-survey .navigation .fa-chevron-left';
//        $(selector).show();
//    }, function() {
//        $(selector).hide();
//    });
//    
//    // don't run event when hover over the chevron
//    $(".fa-chevron-right,.fa-chevron-left").hover(function(event) {
//        event.stopPropagation();
//        $(".fa-chevron-right,.fa-chevron-left").show();
//    });


    function hideSlides() {
        $(".the-survey").children(".survey-slide").hide();
    }
    function showSlide() {
        $(".the-survey #slide" + currentSlide).fadeIn(750);
    }

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