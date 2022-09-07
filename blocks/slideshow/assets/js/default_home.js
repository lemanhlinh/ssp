$(document).ready(function () {
   $('.carousel-inner').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                 breakpoint: 767,
                 settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      // dots: true,
                 }
            },
            {
                 breakpoint: 900,
                 settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      // dots: true,
                 }
            }
       ]
    });
    if ($('.slick-slide').hasClass('slick-active')) {
        $('.title-slider').addClass('animated animate__lightSpeedInRight');
    } else {
        $('.title-slider').removeClass('animated animate__lightSpeedInRight');
    }

    $('.carousel-inner').on("beforeChange", function() {
        $('.title-slider').removeClass('animated animate__lightSpeedInRight').hide();
        setTimeout(() => {
            $('.title-slider').addClass('animated animate__lightSpeedInRight').show();
        }, 1000);
    })
});
