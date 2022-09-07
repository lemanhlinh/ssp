<?php
global $tmpl, $config;
$tmpl->addStylesheet('detail', 'modules/products/assets/css');
$tmpl->addScript("detail", "modules/products/assets/js");
$tmpl->addScript("jquery-ui-slider-pips", "modules/products/assets/js");
$tmpl->addStylesheet('jquery-ui-slider-pips','modules/products/assets/css'); 
$seo_title = $data->seo_title ? $data->seo_title : $data->name;
$seo_keyword = $data->seo_keyword ? $data->seo_keyword : $seo_title;
$seo_description = $data->seo_description ? $data->seo_description : strip_tags($data->name);
$tmpl->addMetakey($seo_keyword);
$tmpl->addMetades($seo_description . ' - OneWay ');
$tmpl->setMeta('og:image', URL_ROOT . $data->image);
$tmpl->setMeta('og:type', 'article');
$tmpl->setMeta('og:url', 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$tmpl->setMeta('og:title', $seo_title);
$tmpl->setMeta('og:description', $seo_description . ' OneWay ');
$tmpl->addTitle($seo_title);
?>
<input type="hidden" name="quantity" id="quantity" value="1">
<input type="hidden" name="product_id" id="product_id" value="<?php echo $data->id; ?>">

<!--<input type="hidden" name="price" id="price" value="--><?php //echo $data->price; ?><!--">-->
<!--<input type="hidden" name="installment_plan" id="installment_plan" value="0">-->
<!--<input type="hidden" name="time_plan" id="time_plan" value="3">-->


<div class="background-detail-product clearfix">
    <div class="row">
        <div class="all_info_product col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="image-table">
                <div class="img_styling clearfix">
                    <img src="<?php echo URL_ROOT.str_replace('original','large',$data->image); ?>" alt="<?php echo $data->name; ?>" class="img-responsive">
<!--                    --><?php //include_once 'images/styling.php'; ?>
                </div>
            </div>
        </div>
        <div class="price_product_pc col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="border-detail_top">
                <h1 class="title-product pdl"><?php echo $data->name; ?></h1>
            </div>
            <div class="border-detail_bottom">
                <?php if(isset($data->content)){ ?>
                <div class="summary-product clearfix">
                    <?php echo $data->content; ?>
                </div>
                <?php } ?>
            </div>
            <div class="price-product"><?php echo FSText::_('Giá'); ?>: <?php echo format_money($data->price_old); ?></div>

        </div>
    </div>
</div>
<div class="tab-info-product">
    <?php // echo $data->content; ?>
    <?php include_once 'default_related.php'; ?>
</div>

<?php // include_once 'default_popup.php'; ?>