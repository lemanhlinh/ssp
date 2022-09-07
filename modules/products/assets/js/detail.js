$(document).ready(function () {

    $( ".scroll-ins a" ).click(function() {
       $('html,body').animate({
        scrollTop: $("#exTab1").offset().top},
        'slow');
        $('#exTab1 ul li:nth-child(3) a').click(); 
    });
    $( "#click-show-all" ).click(function() {
       $('.detail-content').css("height","auto");
    });

    $(".price-procent").slider({ 
        min: 0, 
        max: 70, 
        step: 10,
        change: function( event, ui ) {
            let selection = ui.value;
            $("input#installment_plan").val(selection);
            console.log(selection);
            calculation();
        }
    }).slider("pips", {
        rest: "label",
        suffix: "%",
    });


    $(".month-pay").slider({ 
        min: 3,
        max: 12,
        step: 3,
        change: function( event, ui ) {
            let selection = ui.value;
            $("input#time_plan").val(selection);
            console.log(selection);
            calculation();
        }
    }).slider("pips", {
        rest: "label",
    });

    $('select#bankId').on('change', function() {
        $('select#cardType').prop('disabled', false);
    }); 
    $('select#cardType').on('change', function() {
        let price = $('#price').val();
        let installment_plan = $('#installment_plan').val();
        let time_plan = $('#time_plan').val();

        let bankid = $('select#bankId').val();

        let first_pay = Math.round(price - (price*(100-installment_plan))/100);

        var money_shortage = price - first_pay;
        $('#loading-image').css('display', 'inline-block');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/index.php?module=installment&view=installment&raw=1&task=mpos',
            data: "first_pay=" + money_shortage + "&type_bank=" + this.value + "&period=" + time_plan + "&bankid=" + bankid,
            success: function (data) {
                console.log(data);
                $('#auto-caculate').html(formatNumber(data.data.amountMonthResponse));
            },
            complete: function(){
                $('#loading-image').hide();
            }
        });
    });



    $('.sider-slick-add').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: true,
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
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    // dots: true,
                }
            }
        ]
    });
});

$(document).ready(function() {
    
    setTimeout(function() {
            var product_id = $('#product_id').val();
            $.get("/index.php?module=products&view=product&task=update_hits&raw=1",{id: product_id}, function(status){
            });
    }, 3000);
        
  // var maxHeight = 0;			
  //   if ($('.all_info_product').height() > maxHeight) { maxHeight = $('.all_info_product').height(); }		
  // $(".price_product_pc").height(maxHeight);
});

function calculation() {
    var price = $('#price').val();
    var installment_plan = $('#installment_plan').val();
    var time_plan = $('#time_plan').val();

    var first_pay = Math.round(price - (price*(100-installment_plan))/100);
    var money_shortage = price - first_pay;

    var interest_rate;
    if(installment_plan >= 30 && time_plan == 6){
       interest_rate =  3.43;
    } else if(installment_plan >= 30 && time_plan > 6){
        interest_rate =  2.58;
    }else{
        interest_rate =  4;
    }
    var monthly = Math.round((money_shortage/time_plan)+(money_shortage*(interest_rate/100))+11000);

    $('#procent').html(installment_plan);
    $('#first-pay').html(formatNumber(first_pay));
    $('#bank-procent').html(formatNumber(first_pay));
    $('#monthly').html(formatNumber(monthly));


    var bankid = $('select#bankId').val();
    var cardType = $('select#cardType').val();
    if (bankid !== null && cardType !== null) {
        $('#loading-image').show();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/index.php?module=installment&view=installment&raw=1&task=mpos',
            data: "first_pay=" + money_shortage + "&type_bank=" + cardType + "&period=" + time_plan + "&bankid=" + bankid,
            success: function (data) {
                $('#auto-caculate').html(formatNumber(data.data.amountMonthResponse));
            },
            complete: function(){
                $('#loading-image').hide();
            }
        });
    }
}

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function change_image_price_main(price,image,id,element) {
    // $("#list-img-product-"+id).attr("src", image);
    $("#price-main"+id).html(price);
    $("#price-tab").html(price);
    $("#price-tab-3").html(price);
    $('#price').val(price.replace(/[^0-9]/g, ''));
    $('#temp-oneway ul li').removeClass('active');
    $(element).parent("li").addClass("active");
}

function change_image_price_related(price,image,id,element) {
    $("#img-bg-hot-"+id).attr("src", image);
    $("#price-bg-"+id).html(price);
    $('#related_tab'+id+' ul li').removeClass('active');
    $(element).parent("li").addClass("active");
}

function order($id_pro) {
    $('html,body').animate({scrollTop: '0px'}, 500);
    var $id = $id_pro;
    var $quan = $("#quantity").val();
    $.ajax({
        type: 'GET',
        dataType: 'html',
        url: '/index.php?module=products&view=product&raw=1&task=buy',
        data: "quantity=" + $quan + "&id=" + $id,
        success: function (data) {
            $("#wrapper-popup").html(data);
            ajax_pop_cart();
            del_cart();
        }
    });
    $(".wrapper-popup").show();
    $(".full").show();

}

function ajax_pop_cart(){
	  $("#close-cart").click(function(){
		$(".wrapper-popup-2").hide();
		$(".wrapper-popup").hide();
		$(".full").hide();
	});
}

function del_cart() {

    $(".name-product .del-pro-link").click(function () {
        $a = $(this).attr("data-tr");
        $("." + $a).hide();

        var $id = $(this).attr("data-id");
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/index.php?module=products&view=product&task=edel',
            data: "id=" + $id,
            success: function () {

            }
        });
    });
    $(".continue-buy").click(function () {
        document.order_form.submit();
    });
}