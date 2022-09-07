<?php
global $config, $tmpl;
$tmpl->addStylesheet("products", "blocks/products/assets/css");
$tmpl->addScript("defaultcat", "blocks/products/assets/js");
$url = $_SERVER['REQUEST_URI'];
$return = base64_encode($url);
?>
<div class="container">
    <div id="block_id_<?php echo $id; ?>">
        <div class="list_products clearfix">
            <div class="block-product clearfix">
                <h3 class="not-bgr text-center">
                    <span class="title-cat-block"><?php echo $title; ?></span>
                </h3>
            </div>
            <div class="main-column-content">
                <div class="row">
                    <div class="sider-slick-cat">
                        <?php
                        foreach ($list as $item) {
                            $link = FSRoute::_('index.php?module=products&view=product&ccode='.$item->category_alias.'&code='.$item->alias.'&id='.$item->id);
                        ?>
                            <div class="image-check" >
                                <div class="image-check-round">
                                    <div class="image-info-plus">
                                        <img id="img-pro-hot-<?php echo $item->id; ?>" src="<?php echo URL_ROOT.str_replace('original', 'resized', $item->image); ?>" class="img-responsive">
                                        <?php if ($item->bestseller) { ?>
                                            <div class="info-plus">
                                                <?php echo $item->bestseller; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="title-price-product">
                                        <div class="color-product">
                                            <ul>
                                                <?php if ($price_colors[$item->id]){ ?>
                                                <?php foreach ($price_colors[$item->id] as $color){ ?>
                                                    <?php $price = format_money($color->price); ?>
                                                    <li ><span style="background-color: #<?php echo $color->color_code; ?>" onclick="change_image_price('<?php echo $price; ?>','<?php echo URL_ROOT.str_replace('original', 'resized', $color->image); ?>',<?php echo $color->record_id; ?>,<?php echo $id; ?>,this)"></span></li>
                                                <?php }} ?>
                                            </ul>
                                        </div>
                                        <div class="title-product"><a href="<?php echo $link; ?>" title="<?php echo $item->name; ?>"><?php echo $item->name; ?></a></div>
                                        <div class="price-product text-center clearfix">
                                            <span class="final-price" id="price-pro-<?php echo $item->id; ?>"><?php echo format_money($item->price); ?></span>
                                            <?php if($item->price != $item->price_old){ ?>
                                            <span class="price-regular"><?php echo format_money($item->price_old); ?></span>
                                            <?php } ?>
                                            <?php if($item->discount){ ?>
                                                <?php if($item->discount_unit == 'percent'){ ?>
                                                    <span class="sale-tag sale-tag-square"><?php echo $item->discount . ' %'; ?></span>
                                                <?php }else{ ?>
                                                    <span class="sale-tag sale-tag-square"><?php echo format_money($item->discount); ?></span>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>