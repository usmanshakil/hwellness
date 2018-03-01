$(document).ready(function(){
    
    //var slideHeight = $(window).height() - 150; //868;
    var slideHeight =  744; //868;

    $('.modules.carousel .carousel.slide, .modules.carousel .carousel-inner, .modules.carousel .carousel-inner .item, .modules.carousel .carousel-inner .item .overlay').css('height',slideHeight);

    $(window).resize(function(){
        'use strict',$('.modules.carousel .carousel.slide, .modules.carousel .carousel-inner, .modules.carousel .carousel-inner .item, .modules.carousel .carousel-inner .item overlay').css('height',slideHeight);
    });

//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

});