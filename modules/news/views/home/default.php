<?php
	global $tmpl;
	$tmpl -> addStylesheet('home','modules/news/assets/css');
	$total = count($list);
    $Itemid = 7;
	FSFactory::include_class('fsstring');
?>
<aside class="new-contents">
    <?php foreach ($list_cat as $cat){ ?>
        <a href="<?php echo FSRoute::_('index.php?module=news&view=cat&ccode='.$cat->alias.'&cid='.$cat->id)?>" class="title-link">
            <h2 class="title-module">
                <span><?php echo $cat->name; ?></span>
            </h2>
            <span><?php echo FSText::_('Xem tất cả')?> <i class="fas fa-long-arrow-alt-right"></i></span>
        </a>
    <div class="list-news row-item">
        <div class="row">
        <?php if($total){ ?>
            <?php $i=0; foreach($list[$cat->id] as $item){
                $link = FSRoute::_('index.php?module=news&view=news&code='.$item->alias.'&id='.$item->id);
                $image2 = URL_ROOT.str_replace('original','small2',$item->image);
                $image = URL_ROOT.str_replace('original','small',$item->image);
                $image_large = URL_ROOT.str_replace('original','lange',$item->image);
                $image_resized = URL_ROOT.str_replace('original','resized',$item->image);
            ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 item-new" >
                        <div class="content-item">
                            <h3 class="title"><a href="<?php echo $link ?>" title="<?php echo $item->title ?>"><?php echo $item->title ?></a></h3>
                        </div>
                        <div class="image-list">
                            <a href="<?php echo $link ?>" title="<?php echo $item->title ?>">
                                <img class="img-responsive" src="<?php echo $image_resized ?>" alt="<?php echo $item->title ?>" onerror="this.onerror=null;this.src='<?php echo URL_ROOT.'images/no-images.png'?>';" />
                            </a>
                        </div>
                    </div>
                <?php } ?>
        <?php } ?>
        </div>
    </div>
    <?php  } ?>
    <div class="clearfix"></div>
</aside>