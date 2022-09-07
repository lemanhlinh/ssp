$(document).ready(function () {
   $('.sider-slick-add').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        dots: true,
        responsive: [
            {
                 breakpoint: 767,
                 settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                 }
            },
            {
                 breakpoint: 900,
                 settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2,
                 }
            }
       ]
    });
});
function show_info(id) {
    $.ajax({
        type : 'get',
        url : 'index.php?module=products&view=home&raw=1&task=get_info',
        dataType : 'html',
        data: {id:id},
        success : function(data){
            $('.popup-gallery').html(data);
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {}
    });
    return false;
}