/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {
    //--slider
    resize_slider();



    
    //--Match CTA Boxes height
    matchColHeights('.site-cta');
    
    //--CTA boxes
    $('.site-cta').hover(function(){
        $(this).css({
           'borderColor':'#ff6600'
        });
        $('.col-md-10',this).stop(true,false).animate({'bottom': '20px'},300);
        $('.btn',this).fadeIn(300);
        $('h3',this).css({'color':'#ff6600'});
        
        $('.fa',this).css({
            'width':'85px',
            'height':'85px',
            'top':'-50px',
            'left':'-57px',
            'line-height': '85px',
            'color':'#ff6600',
            'borderColor':'#ff6600'            
        });
    },function(){
        $(this).css({
           'borderColor':'#444'
        });
        $('.col-md-10',this).stop(true,false).animate({'bottom': '0'},300);
        $('h3',this).css({'color':'#444'});
        $('.btn',this).fadeOut(300);
        $('.fa',this).css({
            'width':'50px',
            'height':'50px',
            'top':'0',
            'left':'-40px',
            'line-height': '50px',
            'color':'#444',
            'borderColor':'#444'            
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
    //------------------- Match Height Function
    function matchColHeights(selector){
        var maxHeight=0;
        $(selector).each(function(){
            var height = $(this).height();
            if (height > maxHeight){
                maxHeight = height;
            }
        });
        $(selector).height(maxHeight);
    };
    
    function resize_slider(){
        var w = $('#main-slider').width();
        $('#slider_container,#slider_container > div').width(w);        
    }

    $('.scroll-top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});