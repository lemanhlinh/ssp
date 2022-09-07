<?php
    global $tmpl; 
    $tmpl -> addStylesheet2('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
    $tmpl -> addStylesheet('style_default','blocks/slideshow/assets/css');
    $tmpl -> addScript('default_home','blocks/slideshow/assets/js');
    $i = 0;$j = 0;
?>	
<?php if(isset($data) && !empty($data)){?>
    <div id="myCarousel" class="" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php foreach($data as $item){?>
            <div class="item <?php echo ($j==0)?'active':''?> ">
                
                <a class="carousel-caption hot-corner" href="<?php echo $item->url; ?>" >
                    <img class="img-responsive" src="<?php echo URL_ROOT.str_replace('/original/', '/original/', $item -> image)?>" alt="<?php echo $item->name;?>" />
                    <h3 class="title-slider"><?php echo $item->name; ?></h3>
                </a>
            </div>
            <?php $j++;?>               
            <?php }?>
        </div>
        <div class="clear"></div>
    </div>
<?php }?>