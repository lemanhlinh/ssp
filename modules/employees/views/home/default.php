<?php
global $tmpl,$config;
$tmpl -> addStylesheet('home','modules/employees/assets/css');
$tmpl -> addScript('home','modules/employees/assets/js');
$total = count($list);
$Itemid = 7;
FSFactory::include_class('fsstring');
?>
<aside class="new-contents">
    <div class="list-news row-item">
        <div class="content-employees">
            <?php echo $config['content_employees']; ?>
        </div>
        <h1 class="title-module">
            <span><?php echo FSText::_('Thành viên gia đình SSP chia sẻ'); ?></span>
        </h1>
        <div class="image-info-service">
            <?php foreach ($list as $item) {
                ?>
                <div class="image-info text-center">
                    <img src="<?php echo URL_ROOT.str_replace('original','resized', $item->image)?>" class="img-responsive" alt="">
                    <h3 class="title-product"><?php echo $item->name; ?></h3>
                    <div class="time-rec">
                        (<?php echo $item->time_work; ?>)
                    </div>
                    <summary><?php echo $item->summary; ?></summary>
                </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
        <div class="show-list-new text-right">
            <a href="<?php echo FSRoute::_('index.php?module=employees&view=home2'); ?>"><?php echo FSText::_('Xem tất cả');?> <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</aside>