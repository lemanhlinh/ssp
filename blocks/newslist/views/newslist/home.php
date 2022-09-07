<?php
global $tmpl;
$tmpl->addStylesheet('home', 'blocks/newslist/assets/css');
//$tmpl -> addScript('default','blocks/newslist/assets/js');
//$link_readmore =FSRoute::_("index.php?module=news&view=home");
?>

<div  id="block_id_<?php echo $id;?>">
    <div class="list_news clearfix">
            <div class="title-block-all clearfix">
                <a href="<?php echo FSRoute::_('index.php?module=news&view=home'); ?>">
                    <h3 class="text-center">
                        <span><?php echo $title; ?></span>
                    </h3>
                </a>
            </div>
            <div class="container-newlist">
                <div class="row">
                    <div class="sider-block-news">
                        <?php foreach ($list as $item) {
                            $link = FSRoute::_("index.php?module=news&view=news&id=" . $item->id . "&code=" . $item->alias . "&ccode=" . $item->category_alias);
                            ?>
                            <div class="image-check col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="image-info-plus">
                                    <a href="<?php echo $link; ?>" title="<?php echo $item->title; ?>">
                                            <img src="<?php echo URL_ROOT.str_replace('original', 'resized', $item->image); ?>" class="img-responsive">

                                    </a>
                                        <div class="info-block-new">
                                            <a href="<?php echo $link; ?>" title="<?php echo $item->title; ?>">
                                                <h3 class="title-product"><?php echo $item->title; ?></h3>
                                            </a>
                                        </div>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
    </div>
</div>

