<?php
	global $tmpl;
	$tmpl -> addStylesheet('default','modules/recruitments/assets/css');
//	$tmpl -> addScript('data','modules/department/assets/js');
?>	
<div class="content-default">
    <h1 class="title"><?php echo $data->name; ?></h1>
    <div class="content">
        <h3 class="title-module">
            <span><?php echo FSText::_('Thông tin tuyển dụng')?></span>
        </h3>
        <div class="data-content">
            <?php echo $data->content; ?>
        </div>
    </div>
    <div class="content">
        <h3 class="title-module"><span><?php echo FSText::_('Thông tin liên hệ')?></span></h3>
        <div class="data-content">
            <?php echo $data->info_rec; ?>
        </div>
    </div>
    <div class="text-center">
        <a href="<?php echo FSRoute::_('index.php?module=recruitments&view=order&id='.$data->id); ?>" class="submit-order"><i class="fab fa-telegram-plane"></i><?php echo FSText::_('Nộp hồ sơ'); ?></a>
    </div>
</div>