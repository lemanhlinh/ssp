<!--	RELATE CONTENT		-->
<?php
$total_content_relate = count($relate_products_list);
if ($total_content_relate) {
    ?>
    <div class="related_product">
        <h3 class="title-related"><span><?php echo FSText::_('Sản phẩm khác'); ?></span></h3>
        <div class="row">
            <div class="list_products clearfix" >
                <?php
                for ($i = 0; $i < $total_content_relate; $i ++) {
                    $item = $relate_products_list[$i];
                    $link = FSRoute::_('index.php?module=products&view=product&code=' . $item->alias . '&ccode=' . $item->category_alias . '&id=' . $item->id);
                    ?>
                    <div class="image-check col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="image-info-plus">
                            <a href="<?php echo $link; ?>" title="<?php echo $item->name; ?>">
                                <img src="<?php echo URL_ROOT.str_replace('original', 'resized', $item->image); ?>" class="img-responsive">
                            </a>
                            <a href="<?php echo $link; ?>" title="<?php echo $item->name; ?>">
                                <h4 class="title-product"><?php echo $item->name; ?></h4>
                            </a>
                            <p><?php echo FSText::_('Giá'); ?>: <?php echo format_money($item->price_old); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<!--	end RELATE CONTENT		-->
