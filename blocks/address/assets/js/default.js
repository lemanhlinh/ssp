$(document).ready(function () {
    $('.contact-location').slick({
        infinite: true,
        slidesToShow: 7,
        slidesToScroll: 7,
        arrows: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    // dots: true,
                }
            },
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    // dots: true,
                }
            }
        ]
    });
});