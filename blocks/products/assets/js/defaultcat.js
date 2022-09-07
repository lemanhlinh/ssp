$(document).ready(function () {
   $('.sider-slick-cat').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        responsive: [
            {
                 breakpoint: 767,
                 settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      dots: true,
                 }
            },
            {
                 breakpoint: 900,
                 settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                      // dots: true,
                 }
            }
       ]
    });
});
function change_image_price(price,image,id,id_block,element) {
    $("#block_id_"+id_block+" #img-pro-hot-"+id).attr("src", image);
    $("#block_id_"+id_block+" #price-pro-"+id).html(price);
    $('#block_id_'+id_block+' ul li').removeClass('active');
    $(element).parent("li").addClass("active");
}