<?php
	global $tmpl;
	$tmpl -> addStylesheet('cat','modules/news/assets/css');
	//$tmpl -> addScript('cat','modules/contents/assets/js');

	$total_list = count($list);
    $Itemid = 7;
	$class = '';	
?>	
<aside class="news_cat row-item">
	<h1 class="news-cat-title">
        <span><?php echo $cat->name; ?></span>
    </h1>
<div class="row">
	<?php if($total_list){?>
		<?php $j=0; foreach ($list as $item) {?>
		<?php $link = FSRoute::_('index.php?module=contents&view=content&code='.$item -> alias.'&ccode='.$item->category_alias.'&id='.$item->id);
        ?> 
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<a class="item-news" href='<?php echo  $link;?>' title='<?php echo $item ->title;?>'>
				<img  class="img-responsive fl-left" alt="<?php echo $item ->title;?>" src="<?php echo URL_ROOT.str_replace('/original/', '/original/', $item->image);?>">
                <h3 class="title-news"><?php echo getWord(16,$item->title);?></h3>
                <p class="time-news"><i class="fas fa-history"></i><?php echo date('d/m/Y',strtotime($item->created_time)) ?></p>
            </a><!-- END: .item-news -->
        </div>
		<?php	
       $j++; } ?>
   </div>
        <div class="clearfix"></div>
		<?php if($pagination) echo $pagination->showPagination(3);?>
	<?php } ?>
</aside><!-- END: .news_cat -->

