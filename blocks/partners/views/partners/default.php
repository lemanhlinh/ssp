<?php
    global $tmpl; 
    $tmpl -> addStylesheet('partners','blocks/partners/assets/css');
//    $tmpl -> addScript('jquery.grid-a-licious','blocks/partners/assets/js');
    $tmpl -> addScript('default','blocks/partners/assets/js');
?>
<?php if(count($data)){ ?>
<div class="block-partners">
    <div class="slider-partner">
        <div class="slider-partner-list">
            <?php foreach($data as $item){ ?>
                    <h3 class="item-infomation">
                        <a href="<?php echo $item->url ?>" title="<?php echo $item->name ?>" >
                            <img src="<?php echo URL_ROOT.str_replace('original','resized',$item->image) ?>" alt="">
                        </a>
                    </h3>
            <?php } ?>
        </div>
    </div>
</div><!-- END: block-partners -->
<?php } ?>	
