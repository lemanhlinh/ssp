<?php
global $tmpl,$config;
$tmpl -> addStylesheet('home','modules/recruitments/assets/css');
$total = count($list);
$Itemid = 7;
FSFactory::include_class('fsstring');
?>
<aside class="new-contents">
    <h1 class="title-module">
        <span><?php echo FSText::_('Hoạt động công ty & Tuyển dụng'); ?></span>
    </h1>
    <div class="list-news row-item">
        <div class="row">
            <?php foreach ($list_new as $item){
                $link = FSRoute::_('index.php?module=news&view=news&code=' . $item->alias . '&id=' . $item->id);
                $image = URL_ROOT . str_replace('original', 'small', $item->image);
                $image_large = URL_ROOT . str_replace('original', 'lange', $item->image);
                $image_resized = URL_ROOT . str_replace('original', 'resized', $item->image);
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 item-new">
                    <div class="image-list">
                        <a href="<?php echo $link ?>" title="<?php echo $item->title ?>">
                            <img class="img-responsive" src="<?php echo $image_resized ?>" alt="<?php echo $item->title ?>" onerror="this.onerror=null;this.src='<?php echo URL_ROOT.'images/no-images.png'?>';" />
                        </a>
                    </div>
                    <div class="content-item">
                        <h3 class="title"><a href="<?php echo $link ?>" title="<?php echo $item->title ?>"><?php echo $item->title ?></a></h3>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
            <div class="show-list-new text-right">
                <a href="<?php echo FSRoute::_('index.php?module=news&view=cat&ccode='.$cat_new->alias.'&id='.$cat_new->id); ?>"><?php echo FSText::_('Xem tất cả hoạt động công ty');?> <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <img src="<?php echo URL_ROOT.'images/recruiment.png'; ?>" alt="" class="img-responsive">
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <?php foreach ($list as $item) {
                    $link = FSRoute::_('index.php?module=recruitments&view=recruitments&code='.$item->alias.'&id='.$item->id);
                    ?>
                        <div class="image-info-service">
                            <a href="<?php echo $link; ?>" title="<?php echo $item->name; ?>">
                                <h3 class="title-product"><?php echo $item->name; ?>
                                    <?php if($item->is_new){ ?>
                                        <span><?php echo FSText::_('New'); ?></span>
                                    <?php } ?>
                                </h3>
                                <div class="time-rec">
                                    <span><i class="fas fa-clock"></i> <?php echo FSText::_('Ngày đăng'); ?>: <?php echo date('d/m/Y', strtotime($item->created_time)); ?></span>
                                    <span><?php echo FSText::_('Hạn nộp hồ sơ'); ?>: <?php echo date('d/m/Y', strtotime($item->end_time)); ?></span>
                                </div>
                                <summary><?php echo $item->summary; ?></summary>
                            </a>
                        </div>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="show-list-new text-right">
                    <a href="<?php echo FSRoute::_('index.php?module=recruitments&view=home2'); ?>"><?php echo FSText::_('Xem tất cả');?> <i class="fa fa-angle-double-right"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</aside>