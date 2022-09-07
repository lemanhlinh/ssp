<?php
global $tmpl;
$tmpl -> addScript('styles','blocks/mainmenu/assets/js');
$tmpl->addStylesheet('styles', 'blocks/mainmenu/assets/css');
$lang = FSInput::get('lang');
$Itemid = FSInput::get('Itemid');
?>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="list_menu">
    <div class="list-menu-product-show">
        <div class="title-menu-top">
            <i class="fas fa-bars"></i><?php echo FSText::_("Danh mục sản phẩm"); ?><i class="fas fa-angle-down"></i>
        </div>
        <ul id = 'megamenu' class="menu <?php echo ($Itemid != 1)?'selected':''; ?>" >
            <?php $i = 0; ?>
            <?php foreach ($level_0 as $item): ?>
                <?php $link = $item->link ? FSRoute::_($item->link) : ''; ?>
                <?php $class = 'level_0'; ?>
                <?php $class .= $item->description ? ' long ' : ' sort' ?>
                <?php if ($arr_activated[$item->id]) $class .= ' activated '; ?>

                <li class="<?php echo $class; ?> <?php echo $item->is_type ? 'mega-menu' : '' ?>">
                    <a href="<?php echo $link; ?>" id="menu_item_<?php echo $item->id; ?>" class="menu_item_a" title="<?php echo htmlspecialchars($item->name); ?>">
                        <?php echo $item->name; ?>
                        <i class="fal fa-angle-right fl-right"></i>
                    </a>
                    <!--	LEVEL 1			-->
                    <?php if (isset($children[$item->id]) && count($children[$item->id])) { ?>
                        <ul>
                        <?php } ?>
                        <?php if (isset($children[$item->id]) && count($children[$item->id])) { ?>
                            <?php $j = 0; ?>
                            <?php foreach ($children[$item->id] as $key => $child) { ?>
                                <?php $link = $child->link ? FSRoute::_($child->link) : ''; ?>
                                <li class='sub-menu-level1 <?php if ($arr_activated[$child->id]) $class .= ' activated '; ?> '>
                                    <a href="<?php echo $link; ?>" class="sub-menu-item" id="menu_item_<?php echo $child->id; ?>" title="<?php echo htmlspecialchars($child->name); ?>">
                                        <?php echo $child->name; ?>
                                    </a>
                                </li>
                                <?php $j++; ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if (isset($children[$item->id]) && count($children[$item->id])) { ?>
                        </ul>   
                    <?php } ?>
                </li>	
                <?php $i ++; ?>	
            <?php endforeach; ?>
            <!--	CHILDREN				-->
        </ul>
    </div>
</div>
                



