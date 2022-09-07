<?php
global $tmpl;
$tmpl->addStylesheet('detail', 'modules/image/assets/css');
$tmpl -> addScript('default','modules/image/assets/js');
?>
<div class="contents_detail row-item">
    <h1 class="title-module">
        <span><?php echo $data->name; ?></span>
    </h1>
    <?php if ($data->content) { ?>
        <div class='contents-image'>
            <div class="list_image row">
                <?php foreach ($list_image as $item ){ ?>
                    <div class="col-md-12">
                        <img src="<?php echo URL_ROOT.str_replace('original','resized',$item->image); ?>" class="img-responsive" alt="">
                    </div>
                <?php } ?>
            </div>
        </div><!-- END: .contents-detail-content -->
    <?php } ?>
    <?php if ($data->content) { ?>
        <div class='contents-description row-item'>
            <?php echo $data->content; ?>
        </div><!-- END: .contents-detail-content -->
    <?php } ?>
</div><!-- END: .contents_detail -->
