$(document).ready(function () {
    // $('.see-products-menu').hover(function () {
    //         $('.full2').show();
    //         $('.show_list_see_pr').show();
    // });
    // $(".full2, header").hover(function () {
    //     $(".show_list_see_pr").hide();
    //     $('.full2').hide();
    // });
    $("#addClass").click(function () {
        $('#qnimate').addClass('popup-box-on');
    });

    $("#removeClass").click(function () {
        $('#qnimate').removeClass('popup-box-on');
    });
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    //>=, not <=
    if (scroll >= 5) {
        //clearHeader, not clearheader - caps H
        $("ul.dropdown-menu").addClass("darkHeader");
    }else {
        $("ul.dropdown-menu").removeClass("darkHeader");
    }
});

function submit_form_search_a() {
    itemid = 17;
    url = '';
    var keyword = document.getElementById('autocomplete').value;
    keyword = encodeURIComponent(encodeURIComponent(keyword));
//		var link_search = $('#link_search').val();
    var link_search = document.getElementById('link_search').value;
    if(keyword!= 'Từ khóa tìm kiếm ...' && keyword != '')	{
        url += 	'&keyword='+keyword;
        var check = 1;
    }else{
        var check =0;
    }
    if(check == 0){
        alert('Bạn phải nhập tham số tìm kiếm');
        return false;
    }
//		if(link_search.indexOf("&") == '-1')
    var link = link_search+'/'+keyword+'.html';
//		else
//			var link = link_search+'&keyword='+keyword+'&Itemid=9';

    window.location.href=link;
    return false;
}