<?php
global $tmpl, $config;
$tmpl->addStylesheet('detail', 'modules/news/assets/css');
$tmpl->setMeta('og:image', URL_ROOT . $data->image);
?>
<div class="news_detail row-content">
    <div id="DivIdToPrint">
        <h1 class="news-title"><?php echo $data->title; ?></h1>
        <div class="time">
            <p>
                <i class="fal fa-clock"></i>
                <?php echo date('d/m/Y', strtotime($data->created_time)); ?>
            </p>
            <div class="social-share-new">
                <i class="fal fa-share-alt"></i><?php echo FSText::_('Chia sẻ'); ?><?php include 'default_share_bottom.php'; ?>
            </div>
            
        </div>
        <summary class="contents-summary">
        <?php echo $data->summary; ?>
        </summary><!-- END: .contents-detail-content -->
        <div class='description row-item'>
            <?php echo $data->content; ?>
        </div><!-- END: .news-detail-content -->
    </div>
<!--    --><?php //include 'comment_facebook.php'; ?>
    <?php include 'default_related.php'; ?>
    <?php //include 'default_related_cat.php'; ?>
</div><!-- END: .news_detail -->