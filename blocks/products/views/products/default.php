<?php
global $config, $tmpl;
$tmpl->addStylesheet("products", "blocks/products/assets/css");
$tmpl->addScript("products", "blocks/products/assets/js");
$url = $_SERVER['REQUEST_URI'];
$return = base64_encode($url);
$link = FSRoute::_('#');
?>
<?php if(count($list)){ ?>
<div id="block_id_<?php echo $id; ?>">
    <div class="list_products clearfix">
        <div class="title-block-all clearfix">
            <h3 class="text-center">
                <span><?php echo $title; ?></span>
            </h3>
        </div>
        <div class="background-slide">
                <div class="row">
                    <div class="sider-slick-add">
                        <?php foreach ($list as $item) {
//                        $link = FSRoute::_('index.php?module=products&view=product&ccode='.$item->category_alias.'&code='.$item->alias.'&id='.$item->id);
                        ?>
                            <div class="image-check">
                                <div class="image-check-round">
                                    <div class="image-info-plus">
                                        <img id="img-bg-hot-<?php echo $item->id; ?>" src="<?php echo URL_ROOT.str_replace('original', 'resized', $item->image); ?>" class="img-responsive" onclick="show_info(<?php echo $item->id; ?>)" data-toggle="modal" data-target="#myModal">
                                    </div>
                                    <div class="title-price-product">
                                        <div class="title-product"><a href="javascript:void(0);" onclick="show_info(<?php echo $item->id; ?>)" data-toggle="modal" data-target="#myModal" title="<?php echo $item->name; ?>"><?php echo $item->name; ?></a></div>
                                        <p class="text-center show_more" onclick="show_info(<?php echo $item->id; ?>)" data-toggle="modal" data-target="#myModal" ><?php echo FSText::_('Xem thêm'); ?> <i class="fas fa-long-arrow-alt-right"></i></p>
                                    </div>
                                </div>
                           </div>
                        <?php } ?>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog order-product modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button>
            <div class="modal-body popup-gallery">

            </div>
        </div>
    </div>
</div>