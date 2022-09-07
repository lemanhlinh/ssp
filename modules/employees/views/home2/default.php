<?php
global $tmpl,$config;
$tmpl -> addStylesheet('home2','modules/employees/assets/css');
$total = count($list);
$Itemid = 7;
FSFactory::include_class('fsstring');
?>
<aside class="new-contents">
    <h1 class="title-module">
        <span><?php echo FSText::_('Thành viên gia đình SSP chia sẻ'); ?></span>
    </h1>
    <div class="list-news row-item">
        <?php foreach ($list as $item) {
            ?>
            <div class="image-info">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <img src="<?php echo URL_ROOT.str_replace('original','resized', $item->image); ?>" class="img-responsive" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                        <h3 class="title-product"><?php echo $item->name; ?></h3>
                        <div class="time-rec">
                           (<?php echo $item->time_work; ?>)
                        </div>
                        <summary><?php echo $item->summary; ?></summary>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
        <?php if ($pagination) echo $pagination->showPagination(3); ?>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</aside>