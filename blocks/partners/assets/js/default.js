$(document).ready(function() {

    $('.slider-partner-list').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        rows: 2,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

});