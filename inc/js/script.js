/**
 * Avenue Script
 * Author Bilal
 * 
 */
jQuery(document).ready(function($) {
    // slider
    var w = $('#main-slider').width();
    $('#slider_container,#slider_container > div').width(w);
    var options = {$AutoPlay: true};
    var jssor_slider1 = new $JssorSlider$('slider_container', options);

    //CTA boxes
    $('#site-cta .col-md-4 > div').hover(function(){
//        $('.fa',this).addClass('scale125').delay(300).addClass('transition').addClass('scale11');
        $('.fa',this).stop(true,false).animate({
            'width':'65px',
            'height':'65px',
            'font-size':'45px',
            'top':'-65px',
            'left':'-32px',
            'line-height':'65px'
        },100,function(){
            $(this).stop(true,false).animate({
                'width':'50px',
                'height':'50px',
                'font-size':'34px',
                'top':'-50px',
                'left':'-25px',
                'line-height':'50px'                
            },300,function(){
                
            });
        });
    },function(){
        
    });


});