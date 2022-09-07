$(document).ready( function(){
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        var type = $(this).data('type');
        $.ajax({
    	    url: "/index.php?module=news&view=cat&task=ajax_session&raw=1",
    		data: {type: type},
    		dataType: "text",
    		success: function(result) {
    			if(result == 1){
    				location.reload();
    			} 
    		}
    	});
    });
    //$('#myTab a:last').tab('show');
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