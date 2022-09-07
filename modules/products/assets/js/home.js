$(document).ready(function () {

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