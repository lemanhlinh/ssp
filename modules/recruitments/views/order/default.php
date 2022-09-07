<?php
global $tmpl;
$tmpl -> addStylesheet('order','modules/recruitments/assets/css');
//	$tmpl -> addScript('data','modules/department/assets/js');
?>
<div class="content-default">
    <h1 class="title-module"><span><?php echo FSText::_('Nộp hồ sơ'); ?></span></h1>
    <div class="content">
        <form method="post" action="#" name="contact" class="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label><?php echo FSText::_('Tên người nộp')?>:</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <input type="text" maxlength="255"  name="contact_name" placeholder='<?php //echo FSText::_("Họ và tên"); ?>' id="contact_name" value="" class="form_control" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label><?php echo FSText::_('Vị trí ứng tuyển')?>:</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <input type="text" maxlength="255"  name="contact_local" id="contact_local" value="<?php echo $data->name; ?>" class="form_control" readonly="true"/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label><?php echo FSText::_('Email của bạn')?>:</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <input type="email" maxlength="255"  placeholder="<?php // echo FSText::_("Email"); ?>" name="contact_email" id="contact_email" value="" class="form_control" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label><?php echo FSText::_('Số điện thoại')?>:</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <input type="text" maxlength="255"   name="contact_phone" id="contact_phone" placeholder="<?php echo FSText::_("--- --- --- / --- --- ---"); ?>" value="" class="form_control" required/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label><?php echo FSText::_('CV')?>:</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <label class="custom-file-upload" for="cv-file">
                                <input type="file" name="cv-file" id="cv-file" class="form-control mbl cv-file" placeholder="<?php echo FSText::_("Đính kèm dưới 2 File (dưới 3 MB)"); ?>">
                                <span><?php echo FSText::_("Đính kèm dưới 2 File (dưới 3 MB)"); ?></span>
                                <span class="upload-label"><?php echo FSText::_('Tải file đính kèm'); ?></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <label><?php echo FSText::_('Ghi chú')?>:</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <textarea rows="4" cols="30" name='message' id='message' placeholder="<?php // echo FSText::_("Nội dung"); ?>" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-right">
                            <button type="submit" ><i class="fab fa-telegram-plane"></i> <?php echo FSText::_("Gửi đi"); ?></button>
                        </div>
                    </div>

                </div>
            </div>
            <input type="hidden" name='return' value='<?php // echo $return; ?>' />
            <input type="hidden" name="module" value="recruitments" />
            <input type="hidden" name="task" value="save" />
            <input type="hidden" name="view" value="home" />
        </form>
    </div>

</div>