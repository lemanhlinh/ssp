<?php
global $tmpl;
$tmpl->addStylesheet('detail', 'modules/contents/assets/css');
//$tmpl -> addScript('form');
//$tmpl -> addScript('main');
//$tmpl -> addScript('detail','modules/contents/assets/js');
//FSFactory::include_class('fsstring');
//$print = FSInput::get('print',0);
$tmpl->setMeta('og:image', URL_ROOT.$data->image);
$code = FSInput::get('code');
?>
<div class="contents_detail row-item">
        <h1 class="title-module">
            <span><?php echo $data->title; ?></span>
        </h1>

        <summary class="contents-summary hide">
            <?php echo $data->summary; ?>
        </summary><!-- END: .contents-detail-content -->

        <?php if ($data->content) { ?>
            <div class='contents-description row-item'>
                <?php echo $data->content; ?>
            </div><!-- END: .contents-detail-content -->
        <?php } ?>
</div><!-- END: .contents_detail -->
