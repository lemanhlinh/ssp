<?php
global $tmpl,$config;
$tmpl -> addStylesheet('home','modules/recruitments/assets/css');
$total = count($list);
$Itemid = 7;
FSFactory::include_class('fsstring');
?>
<aside class="new-contents">
    <h1 class="title-module">
        <span><?php echo FSText::_('Tuyển dụng tại SSP Moulding'); ?></span>
    </h1>
    <div class="list-news row-item">
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
        <?php if ($pagination) echo $pagination->showPagination(3); ?>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</aside>