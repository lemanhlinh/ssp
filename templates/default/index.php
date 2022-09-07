<?php
global $config, $tmpl, $user;
$Itemid = FSInput::get('Itemid', 1, 'int');
$lang = FSInput::get('lang');
$logo = URL_ROOT . $config['logo'];
$tmpl->addStylesheet('fontawesome-all.min', 'libraries/font-awesome/css');
//$tmpl -> addStylesheet('form_');
//$tmpl -> addStylesheet('cart');
$tmpl -> addStylesheet('slick');
$tmpl -> addStylesheet('slick-theme');
$tmpl -> addStylesheet2('https://code.jquery.com/ui/1.10.4/themes/flick/jquery-ui.css');
$tmpl -> addStylesheet2('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css');
$tmpl -> addScript('slick.min');
$tmpl -> addScript('form');
$tmpl -> addScript2('https://code.jquery.com/ui/1.11.1/jquery-ui.js','top');
$tmpl -> addScript2('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js');
$total_cart = 0;
if(isset($_SESSION['cart'])){
    $product_list = $_SESSION['cart'];
    foreach ($product_list as $prd) {
        $total_cart+=$prd[1];
    }
}
if($lang == 'vi'){
    $lang_a = URL_ROOT;
}else {
    $lang_a = URL_ROOT.$lang;
}
?>
<?php
if($lang == 'jp'){
    ?>
    <style>
        body{
            font-size: 16px;
        }
    </style>
    <?php
}
?>
<?php echo $tmpl->load_direct_blocks('mainmenu', array('style' => 'megamenu_moblie', 'group' => 1)); ?>
<div class="box-shadow-ql <?php echo 'lang_'.$lang; ?>">
    <header class="row-content" id="header" >
        <div class="header-logo clearfix" >
            <div class="container">
                <div class="row row-1">
                    <div class="col col-md-3 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-2 visible-xs">
                            <div id="page">
                                <div class="header_menu">
                                    <a href="#navigation-menu"><i class="fas fa-bars fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                        <a class="logo-image col-md-12 col-sm-8 col-xs-8" href="<?php echo $lang_a; ?>" title="<?php echo $config['site_name'] ?>">
                            <img class="img-responsive" src="<?php echo $logo; ?>" alt="<?php echo $config['site_name'] ?>" />
                        </a>
                        <div class="col-md-2 col-sm-2 col-xs-2 visible-xs">
                            <select name="" id="cmbIdioma" style="width: 120px;"  onchange="location = this.value;">
                                <option value="<?php echo URL_ROOT; ?>" title="<?php echo URL_ROOT.'images/vn.jpg';?>" <?php echo ($lang == 'vi')?'selected':''; ?> ></option>
                                <option value="<?php echo URL_ROOT . 'en'; ?>" title="<?php echo URL_ROOT.'images/en.jpg';?>" <?php echo ($lang == 'en')?'selected':''; ?> ></option>
                                <option value="<?php echo URL_ROOT . 'jp'; ?>" title="<?php echo URL_ROOT.'images/jp.png';?>" <?php echo ($lang == 'jp')?'selected':''; ?> ></option>
                            </select>
                        </div>
                        <div class="language-top-hd col-md-12 col-sm-12 col-xs-12 hidden-xs"">
                            <ul>
                                <li class=""><?php echo FSText::_('Ngôn ngữ'); ?>:</li>
                                <li>
                                    <?php if($lang == 'vi'){ ?>
                                        <a href="<?php echo URL_ROOT; ?>"><img src="<?php echo URL_ROOT.'images/language/icon_40.png'?>" alt=""></a>
                                    <?php } else {?>
                                        <a href="<?php echo URL_ROOT; ?>"><img src="<?php echo URL_ROOT.'images/language/icon_37.png'?>" alt=""></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($lang == 'en'){ ?>
                                        <a href="<?php echo URL_ROOT. 'en'; ?>"><img src="<?php echo URL_ROOT.'images/language/icon_42.png'?>" alt=""></a>
                                    <?php } else {?>
                                        <a href="<?php echo URL_ROOT . 'en'; ?>"><img src="<?php echo URL_ROOT.'images/language/icon_35.png'?>" alt=""></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php if($lang == 'jp'){ ?>
                                        <a href="<?php echo URL_ROOT. 'jp'; ?>"><img src="<?php echo URL_ROOT.'images/language/icon_52.png'?>" alt=""></a>
                                    <?php } else {?>
                                        <a href="<?php echo URL_ROOT . 'jp'; ?>"><img src="<?php echo URL_ROOT.'images/language/icon_33.png'?>" alt=""></a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 menu-right-head hidden-xs" style="background: url(<?php echo URL_ROOT.$config['banner_top']; ?>) no-repeat center;">
                        <nav class="nav-item-menu" id="nav">
                            <div id='cssmenu' class="row-item">
                                <div class="list-item-menu">
                                    <?php echo $tmpl->load_direct_blocks('mainmenu', array('style' => 'main_activities', 'group' => '1')); ?>
                                </div>
                            </div>
                        </nav>
                        <!-- END: nav -->
                    </div>
                </div>
            </div><!-- END: .header-logo -->        
            <div class="clearfix"></div>
        </div>
    </header>
    <!-- END: header -->
    
    <div class="clearfix"></div>
    <?php if ($tmpl->count_block('top')) { ?>
        <div class="row-content pos-top">
            <?php // echo $tmpl->load_position('top'); ?>
        </div> <!-- END: .pos-top -->
        <div class="clearfix"></div>
    <?php } ?>
    <?php if ($Itemid != 1) { ?>
<!--        <section id="main-breadcrumbs" class="main-breadcrumbs">-->
             <?php // echo $tmpl->load_direct_blocks('breadcrumbs', array('style' => 'simple')); ?>
<!--        </section>-->
<!--        <div class="clearfix"></div>-->
    <?php } ?>
    <div class="container">
        <div class="main row-content" id="main">
            <?php include 'main_wrapper.php' ?>
        </div>
        <!-- END: main -->
        <div class="clearfix"></div>
    </div>
    <?php if ($tmpl->count_block('bottom')) { ?>
        <div class="pos-bottom row-content">
            <?php echo $tmpl->load_position('bottom'); ?>
        </div><!--END: .pos-bottom -->
        <div class="clearfix"></div>
    <?php } ?>
    <footer class="row-conten clearfixt" id="footer">
        <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h3 class="title-footer"><?php // echo FSText::_('Vị trí bản đồ'); ?></h3>
                            <?php echo $config['map_contact']; ?>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h3 class="title-footer"><?php echo FSText::_('CÔNG TY TNHH SSP MOULDING'); ?></h3>
                            <?php echo $config['info_contact']; ?>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h3 class="title-footer title-footer2 text-center"><?php echo FSText::_('Khách hàng của chúng tôi'); ?></h3>
                            <?php echo $tmpl->load_direct_blocks('partners', array('style' => 'default')); ?>
                        </div>
                    </div>
                </div><!--END: .pos-bottom -->
            </div>

        <div class="info-footer">
            <div class="container">
                <ul >
                    <li><?php echo $config['info_footer']; ?></li>
                    <li><a href="<?php echo $config['facebook']; ?>" target="_blank"><img src="<?php echo URL_ROOT.'images/icon_21.png'?>" alt=""></a></li>
                    <li><a href="<?php echo $config['twitter']; ?>" target="_blank"><img src="<?php echo URL_ROOT.'images/icon_23.png'?>" alt=""></a></li>
                    <li><a href="<?php echo $config['google']; ?>" target="_blank"><img src="<?php echo URL_ROOT.'images/icon_25.png'?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </footer><!-- END: footer -->
</div>        


        
<?php include 'notification.php'; // thong bao?>
<!--popup-->
<div class="content-pop">
    <div class="wrapper-popup" id="wrapper-popup"></div>
    <div class="wrapper-popup-2" id="wrapper-popup-2"></div>
</div> 
<div class="full"></div>
<div class="full2"></div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=261705784465814&autoLogAppEvents=1"></script>