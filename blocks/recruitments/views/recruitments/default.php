<?php
global $config, $tmpl;
$tmpl->addStylesheet("default", "blocks/recruitments/assets/css");
?>
<?php if(count($list)){ ?>
    <div id="block_id_<?php echo $id; ?>">
        <div class="list_recruitment clearfix">
                        <div class="list_block_recruitment clearfix">
                            <div class="title-block-all">
                                <div class="title-small-block"><?php echo FSText::_('Góc tuyển dụng'); ?></div>
                                <a href="<?php echo FSRoute::_('index.php?module=recruitments&view=home'); ?>">
                                    <h3><?php echo $title; ?></h3>
                                    <span><?php echo FSText::_('Xem tất cả')?> <i class="fas fa-long-arrow-alt-right"></i></span>
                                </a>
                            </div>
                            <div class="row">
                                <?php foreach ($list as $item) {
                                    $link = FSRoute::_('index.php?module=recruitments&view=recruitments&code='.$item->alias.'&id='.$item->id);
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="image-info-service">
                                            <a href="<?php echo $link; ?>" title="<?php echo $item->name; ?>">
                                                <h3 class="title-product"><?php echo $item->name; ?>
                                                    <?php if($item->is_new){ ?>
                                                    <span><?php echo FSText::_('New'); ?></span>
                                                    <?php } ?>
                                                </h3>
                                                <summary><?php echo $item->summary; ?></summary>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
        </div>
    </div>
<?php } ?>
