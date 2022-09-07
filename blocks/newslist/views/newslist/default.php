<?php
global $tmpl;
$tmpl->addStylesheet('default', 'blocks/newslist/assets/css');
//$tmpl -> addScript('default','blocks/newslist/assets/js');
//$link_readmore =FSRoute::_("index.php?module=news&view=home");
?>

<div  id="block_id_<?php echo $id;?>">
    <div class="list_menu_new">
        <h3 class="title-left-menu"> <i class="fas fa-newspaper fa-pull-left"></i> <?php echo $title; ?></h3>
        <ul class="tab-content">
            <?php foreach ($list as $item) { ?>
                <?php $link = FSRoute::_("index.php?module=news&view=news&id=" . $item->id . "&code=" . $item->alias . "&ccode=" . $item->category_alias); ?>
            <li><a href="<?php echo $link; ?>"><i class="fas fa-caret-right"></i><?php echo $item->title; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>

