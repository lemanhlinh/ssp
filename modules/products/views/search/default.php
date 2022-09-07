<?php
global $tmpl;
$tmpl->addStylesheet('author', 'modules/products/assets/css');
$tmpl->addScript("search", "modules/products/assets/js");
$total = count($list);
$Itemid = 7;
FSFactory::include_class('fsstring');
$keyword = FSInput::get('keyword');
?>
<div class="main-column-content">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
            <h1 class="title-module">
                <span><?php echo FSText::_('Tìm kiếm') . ': ' . $keyword ?></span>
            </h1>
            <div class="row">
                <?php if ($total) { ?>
                    <?php foreach ($list as $item) {
                        ?>
                        <div class="image-check col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="image-check-round">
                                <div class="image-info-plus">
                                    <img id="img-bg-hot-<?php echo $item->id; ?>"
                                         src="<?php echo URL_ROOT . str_replace('original', 'resized', $item->image); ?>"
                                         class="img-responsive" onclick="show_info(<?php echo $item->id; ?>)"
                                         data-toggle="modal" data-target="#myModal">
                                </div>
                                <div class="title-price-product">
                                    <div class="title-product"><a href="javascript:void(0);"
                                                                  onclick="show_info(<?php echo $item->id; ?>)"
                                                                  data-toggle="modal" data-target="#myModal"
                                                                  title="<?php echo $item->name; ?>"><?php echo $item->name; ?></a>
                                    </div>
                                    <p class="text-center show_more" onclick="show_info(<?php echo $item->id; ?>)"
                                       data-toggle="modal" data-target="#myModal"><?php echo FSText::_('Xem thêm'); ?>
                                        <i class="fas fa-long-arrow-alt-right"></i></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <?php if ($pagination) echo $pagination->showPagination(3); ?>
            <div class="clearfix"></div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
            <div id="css_menu_content">
                <ul>
                    <?php $i = 0;
                    foreach ($list_cat as $item) {
                        $link = FSRoute::_('index.php?module=products&view=cat&cid=' . $item->id . '&ccode=' . $item->alias);
                        ?>
                        <li class="has-sub ">
                            <a href="<?php echo $link; ?>"
                               title="<?php echo $item->name; ?>"><?php echo $item->name; ?> <i
                                        class="fal fa-chevron-right"></i></a>
                        </li>
                        <?php $i++;
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog order-product modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body popup-gallery">

            </div>
        </div>
    </div>
</div>