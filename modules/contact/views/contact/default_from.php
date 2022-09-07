<?php
$url = $_SERVER['REQUEST_URI'];
$return = base64_encode($url);
?>
<div class="contact_form row-item">
    <form method="post" action="#" name="contact" class="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-xs-12">
                <label><?php echo FSText::_('Tên đầy đủ của bạn')?> (*)</label>
                <input type="text" maxlength="255"  name="contact_name" placeholder='<?php //echo FSText::_("Họ và tên"); ?>' id="contact_name" value="" class="form_control" required/>
            </div>
            <div class="col-xs-12">
                <label><?php echo FSText::_('Email của bạn')?> (*)</label>
                <input type="email" maxlength="255"  placeholder="<?php // echo FSText::_("Email"); ?>" name="contact_email" id="contact_email" value="" class="form_control" required/>
            </div>
            <div class="col-xs-12">
                <label><?php echo FSText::_('Số điện thoại')?> (*)</label>
                <input type="text" maxlength="255"   name="contact_phone" id="contact_phone" placeholder="<?php // echo FSText::_("Số điện thoại"); ?>" value="" class="form_control" required/>
            </div>
            <div class="col-xs-12">
                <label><?php echo FSText::_('Nội dung phản hồi')?> (*)</label>
                <textarea rows="4" cols="30" name='message' id='message' placeholder="<?php // echo FSText::_("Nội dung"); ?>" required></textarea>
            </div>
            <div class="col-xs-12">	
                <input type="submit" value="<?php echo FSText::_("Gửi"); ?>">
            </div>
        </div>
        <input type="hidden" name='return' value='<?php echo $return; ?>' />
        <input type="hidden" name="module" value="contact" />
        <input type="hidden" name="task" value="save" />
        <input type="hidden" name="view" value="contact" />
    </form>
    <!--	end FORM				-->
    <div class="clear"></div>
</div>