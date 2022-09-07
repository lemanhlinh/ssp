<?php
global $config, $tmpl;
$tmpl->addStylesheet("left", "blocks/products/assets/css");
?>
<?php if(count($list)){ ?>
<div id="block_id_<?php echo $id; ?>">
    <div class="list_products clearfix">
        <h3 class="head-block-product">
            <span><?php echo $title; ?></span>
        </h3>
        <div class="background-slide">
            <?php foreach ($list as $item) {
            $link = FSRoute::_('index.php?module=products&view=product&ccode='.$item->category_alias.'&code='.$item->alias.'&id='.$item->id);
            ?>
                <div class="image-check">
                    <a href="<?php echo $link; ?>">
                        <div class="row">
                        <div class="image-info-plus col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img src="<?php echo URL_ROOT.str_replace('original', 'small', $item->image); ?>" class="img-responsive"> 
                        </div>
                                                          
                        <div class="title-price-product col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="title-product"><?php echo $item->name; ?></div>
                            <div class="price-product"><?php echo FSText::_('Giá'); ?>: <?php echo format_money($item->price); ?></div>
                        </div>
                        </div>
                   </a>
               </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>