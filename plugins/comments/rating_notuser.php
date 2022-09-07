<?php
global $tmpl;
$tmpl->addStylesheet('rating', 'plugins/comments/css');
$tmpl -> addScript('rating','plugins/comments/js');
$url = $_SERVER['REQUEST_URI'];
$module = FSInput::get('module');
$view = FSInput::get('view');
$rid = FSInput::get('id');
$arr_rating = array(
    5 => 'Xuất sắc',
    4 => 'Rất tốt',
    3 => 'Trung bình',
    2 => 'Tàm tạm',
    1 => 'Kém',
);

$return = base64_encode($url);
if (empty($_SESSION['user_id'])) {
    $login = 0;
} else {
    $login = 1;
}
//print_r($comments_ad).'sss';die();
?>
<!---->
<!--<div class="wrapper-name-raty cf">-->
<!--    <h3 class="title-tabs fl">Đánh giá và bình luận</h3>-->
<!--</div>-->
<div class="tab_content ">
    <div class='comments'>

        <!-- FORM COMMENT	-->

        <div class='comment_form cf'  id="comment_form">
            <form method="post" name="comment_add_form" id='comment_add_form' class='form_comment'>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 wrapper-txt-comment">
                        <textarea id="full_rate" class="txt_input full_rate form-control mbl" placeholder="Viết bình luận của bạn..." rows="6" name="full_rate"></textarea>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left-cm fl">
                        <div class='row clearfix '>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input type="text" id="name" name="name" placeholder="Họ và tên" value=""  class="name txt_input mbl form-control"/>
                                <input type="text" id="email" name="email"  placeholder="Email"  class="email txt_input mbl form-control"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<!--                                <input type="text" id="phone" name="phone"  placeholder="Điện thoại"  class="phone txt_input mbl form-control"/>-->
                                <input type='button' class="button submitbt mbl btn btn-danger" value='Bình luận' id='submitbt'>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $module; ?>" name='module' />
                <input type="hidden" value="<?php echo $view; ?>" name='view' />
                <input type="hidden" value="save_comment" name='task' />
                <input type="hidden" value="<?php echo (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>" name='user_id' />
                <input type="hidden" value="<?php echo (isset($_SESSION['fullname'])) ? $_SESSION['fullname'] : ''; ?>"  name="user_name"/>
                <input type="hidden" value="<?php echo (isset($_SESSION['user_email'])) ? $_SESSION['user_email'] : ''; ?>" name='user_email' />
                <input type="hidden" value="<?php echo $data->id; ?>" name='record_id' id='record_id'  />
                <input type="hidden" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" name='return'  />
            </form>
        </div>
<!--        <div class="bt-raty fr">-->
<!--            <select name="order-comment" >-->
<!--                <option value="">Sắp xếp theo</option>-->
<!--                <option value="desc">Mới nhất</option>-->
<!--                <option value="desc">Cũ nhất</option>-->
<!--            </select>-->
<!--        </div>-->
        <?php

        //echo $total_comment;
        if(isset($total_comment)){
            $return = base64_encode($url);
            ?>
            <div class='comments_contents'>
                <div id="list-comment">
                    <?php
                    $i=1;
                    foreach ($list_parent as $item){ ?>
                        <?php echo  display_comment_item($i,$item,$list_children,0,3,$return,$comments_ad,$comments_reply_user);?>
                        <?php $i++; }?>
                </div>
                <?php
                if($total_comment/$limit >=1){
                    ?>
                    <!--                            <div class="view-more-cm">
                                                            Xem thêm các bình luận khác
                                                        </div>-->
                <?php } ?>
                <input type="hidden" id="total_page" name="total_page" value="<?php echo ceil($total/$limit); ?>" />
                <input type="hidden" id="record_id" value="<?php echo $data->id; ?>" />
                <input type="hidden" id="url_current" name="url_current" value="<?php echo $_SERVER["REQUEST_URI"]?>" />
            </div>
        <?php }?>
    </div>
    <?php



    function humanTiming ($time)
    {

        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'năm trước',
            2592000 => 'tháng trước',
            604800 => 'tuần trước',
            86400 => 'ngày trước',
            3600 => 'giờ trước',
            60 => 'phút trước',
            1 => 'giây trước'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text;
        }

    }
    function display_comment_item($i,$item,$childdren,$level,$max_level = 2,$return,$comments_ad,$comments_reply_user){
        $i=$item -> id;
        $sub = ($level >= $max_level) ? ($max_level % 2) : ($level % 2);
        $html = '<div class="cf comment-item comment-item-'.$item -> id.' '. ($item -> parent_id? "comment-child":""). ' comment_level_'.$level.' comment_sub_'.$sub.'"   >';

//	$html .= '<span class="sum_cm fl"><img src="/images/user.png" /></span>';
//        $html .= '<div class="star-detail fl" data-rating="' . ceil(($item->point_value + $item->point_quan + $item->point_price) / 3) . '"></div>';
//        $html .= '<div class="star-detail fl" data-rating="' . $item->point_value . '"></div>';
        $html .= '<span class="stick-cm-p fl"></span><div class="wrapper_comment_content fl "><div class="info_cm "><span class="name"><span class="text_b_cm">'.$item -> name.'</span></span></div></div>';
        $html .= '<div class="clearfix mt10"></div> ';
        $html .= '<div class="comment_content "> ';
        $html .=  $item -> comment;
        $html .= '</div>';
        $html .= '<div class="clearfix mt10"></div> ';
//        $html .= '<span class="date fl"><a href="javascript:get_form('.$i.')" class="fl bt-reply">Trả lời</a> '. humanTiming(strtotime($item -> created_time)).'</span> ';
        $html .= '<div class="clearfix mt10"></div> ';
        $html.='<div class="get_form_'.$item -> id.'"></div>';

        $cm=0;
        $html .= '<div class="wrapper-admin-rep">';
        foreach($comments_reply_user as $user){
            if($user->reply_for_id==$item->id){
                $h=1;
                if($cm==0){
                    $html .= '<div class="border-cm"></div>';
                }
                $html .= '<div class="cf comment-item "   >';
                $html .= '<span class="sum_cm fl"><img src="/images/user.png" /></span>';
                $html .= '<span class="name fl"><span class="text_b_cm">'.$user -> name.'</span></span>';
                $html .= '<div class="clearfix mt10 "></div> ';
                $html .= '<div class="comment_content "> ';
                $html .=  $user -> full_rate;
                $html .= '</div>';
                $html .= '<div class="clearfix"></div> ';
                $html .= '<span class="date fl"> '. humanTiming(strtotime($user -> created_time)).'</span> ';
//			$html.='<span id="count-like'.$user -> id.'" class="fl count-like">'.$user -> like.'</span>';

//			$html.='<a href="javascript:void(0)" onclick="like('.$user -> id.')" class="fr bt-like like'.$user -> id.'">Thích</a>';
//			$html.='<a href="javascript:void(0)" onclick="unlike('.$user -> id.')" class="fr unlike unlike'.$user -> id.'">Bỏ thích</a>';
                $html .= '<div class="clearfix"></div> ';
                $html.='<div class="get_form_'.$user -> id.'"></div>';
                $html .= '</div>';

                $html .= '<script type="text/javascript" >
		
		$("document").ready(function(){
			// // document.cookie = '.$user -> id.' + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
			// $.cookie(""+'.$item -> id.'+"", "");
			// alert($.cookie(""+'.$user -> id.'+"","","=;expires=Thu, 21 Sep 1979 00:00:01 UTC;"));
			//var cookie=$.cookie;
			//cookie.remove(""+'.$item -> id.'+"")
			//alert($.cookie(""+'.$item -> id.'+""));
//			if($.cookie(""+'.$user -> id.'+"")){
//				$(".like"+'.$user -> id.').hide();
//				$(".unlike"+'.$user -> id.').show();
//			}
		});
	</script>';
                $cm++;

            }
        }
        $html .= '</div>';


        $cm=0;

        foreach($comments_ad as $ad_cm){
            if($ad_cm->parent_id==$item->id){
                $h=1;
                if($cm==0){
                    $html .= '<div class="wrapper-admin-rep"><div class="border-cm"></div>';
                }
                $html .= '<div class="cf comment-item "   >';
                // $html .= '<span class="sum_cm fl"><img src="/images/admin.png" /></span>';
                $html .= '<span class="name fl">'.$ad_cm -> name.'<span class="text_b_cm">Quản trị viên</span></span>';
                $html .= '<div class="clearfix mt10 "></div> ';
                $html .= '<div class="comment_content "> ';
                $html .=  $ad_cm -> comment;
                $html .= '</div>';
                $html .= '<div class="clearfix"></div> ';
                $html .= '<span class="date fl"> '. humanTiming(strtotime($ad_cm -> created_time)).'</span> ';
//			$html.='<span id="count-like'.$ad_cm -> id.'" class="fl count-like">'.$ad_cm -> like.'</span>';
//			$html.='<a href="javascript:void(0)" onclick="like('.$ad_cm -> id.')" class="fr bt-like like'.$ad_cm -> id.'">Thích</a>';
//			$html.='<a href="javascript:void(0)" onclick="unlike('.$ad_cm -> id.')" class="fr unlike unlike'.$ad_cm -> id.'">Bỏ thích</a>';
                $html .= '<div class="clearfix"></div> ';
                $html .= '<script type="text/javascript" >
		
		$("document").ready(function(){
			// // document.cookie = '.$ad_cm -> id.' + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
			// $.cookie(""+'.$item -> id.'+"", "");
			// alert($.cookie(""+'.$ad_cm -> id.'+"","","=;expires=Thu, 21 Sep 1979 00:00:01 UTC;"));
			//var cookie=$.cookie;
			//cookie.remove(""+'.$item -> id.'+"")
			//alert($.cookie(""+'.$item -> id.'+""));
//			if($.cookie(""+'.$ad_cm -> id.'+"")){
//				$(".like"+'.$ad_cm -> id.').hide();
//				$(".unlike"+'.$ad_cm -> id.').show();
//			}
		});
	</script>';
                $cm++;
                $html.='<div class="get_form_'.$ad_cm -> id.'"></div>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }
        $html .= '</div>';

        return $html;
    }
    ?>
</div>