function submit_form_search() {
		itemid = 17;
		url = '';
		var keyword = document.getElementById('autocomplete').value;
		keyword = encodeURIComponent(encodeURIComponent(keyword));
//		var link_search = $('#link_search').val();
		var link_search = document.getElementById('link_search').value;
		if(keyword!= 'Tìm kiếm' && keyword != '')	{
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

$(document).ready(function(){
	$('#autocomplete').devbridgeAutocomplete({
		serviceUrl:"/index.php?module=products&view=search&raw=1&task=get_ajax_search",
		// groupBy:"brand",
		minChars:2,
		formatResult:function(n,t){
			t=t.replace(/[^a-z0-9\s]/gi,"");
			var i=n.data.text.split(" "),r="";
			for(j=0;j<i.length;j++)
				r+=t.toLowerCase().indexOf(i[j].toLowerCase())>=0?"<strong>"+i[j]+"</strong> ":i[j]+" ";
			return' <a href = "'+n.value+'" > <span> <img src = "'+n.data.image+'" /> </span> <div> <h3> '+r+' </h3> <p class = "price"> '+n.data.price+"</p></div></a>"
		},
		onSelect:function(n){
			$(".nav-search input[name=keyword]").val(n.data.text)
		}
	});
});