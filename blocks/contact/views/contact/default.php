<?php
    global $tmpl;
    $tmpl -> addStylesheet('contact', 'blocks/contact/assets/css');
?>

<div class="form-contact">
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center"><?php echo FSText::_('Gửi thông tin liên hệ')?></h3>
        <span class="text-center"><?php echo FSText::_('Vui lòng điền tất cả thông tin dưới đây')?></span>
        <form method="post" action="#" name="contact" class="form" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" maxlength="255" autocomplete="off"  name="contact_name" placeholder='&#xf007; <?php echo FSText::_("Họ và tên"); ?>' id="contact_name" value="" class="form_control" required/>
                </div>
                <div class="col-xs-6">
                    <input type="text" maxlength="255" autocomplete="off"  name="contact_addres" placeholder='&#xf64f; <?php echo FSText::_("Địa chỉ"); ?>' id="contact_addres" value="" class="form_control" required/>
                </div>
                <div class="col-xs-6">
                    <input type="text" maxlength="255" autocomplete="off"  name="contact_phone" id="contact_phone" placeholder="&#xf2a0; <?php echo FSText::_("Số điện thoại"); ?>" value="" class="form_control" required/>
                </div>
                <div class="col-xs-6">
                    <input type="email" maxlength="255" autocomplete="off"  placeholder="&#xf0e0; <?php echo FSText::_("Email"); ?>" name="contact_email" id="contact_email" value="" class="form_control" required/>
                </div>
                <div class="col-xs-12">
                    <textarea rows="6" cols="30" name='message' id='message' placeholder="&#xf4ad; <?php echo FSText::_("Nội dung"); ?>" required></textarea>
                </div>
                <div class="col-xs-12">
                    <input type="submit" value="<?php echo FSText::_("Gửi liên hệ"); ?>">
                </div>
            </div>
            <input type="hidden" name="module" value="contact" />
            <input type="hidden" name="task" value="save" />
            <input type="hidden" name="view" value="contact" />
        </form>
        <!--	end FORM				-->
        <div class="clear"></div>
    </div>
</div>
</div>
