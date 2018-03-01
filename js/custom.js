$(document).ready(function(){

   $(document).on('click', '.ajax_add_to_cart', function(){

       var ths = $(this);

       ths.text('Adding to cart');

       setTimeout(function(){

           ths.text('Added to cart');

       }, 2000);

       setTimeout(function(){

           ths.text('Add to cart');

       }, 4000);

   });

       // Add Feature
    $(document).on('click', '.btn-sub', function(e){
      e.preventDefault();
        ths = $(this);
        var postName = $('#post-title').val();
        var postContent = $('textarea[name=textarea]').val();
        var featuredImage = $('#featured-image').val();
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                'action': 'createGuestPost',
                'post-name': postName,
                'post-content':postContent,
                'post-image':featuredImage,
            },
            beforeSend: function () {
                ths.text('Submitting your post......');
            },
            success: function (data) {
                ths.text('Submitted :)');
                $('.create-post').html('<h4>Thank you. Your post is under review.</h4>');
            },
            error: function (errorThrown) {
                console.log('Got error:' + errorThrown);
            }
        });

    });
	$('.owl-carousel').owlCarousel({
    loop:true,	
	nav:true,
	dots: false,
    animateOut: 'fadeOut',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    },
	navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
});
});