<?php
    global $tmpl,$config; 
    $tmpl -> addStylesheet('address','blocks/address/assets/css');
    $tmpl -> addScript('default','blocks/address/assets/js');
?>
 <div class="contact-ndt">
	<div class="commitment text-center">
        <h3><?php echo FSText::_('Hệ thống tech coffee'); ?></h3>
	</div>
    
	<div class="contact-location">
        <?php foreach($list as $item){ ?>
            <article>
                <img src="<?php echo URL_ROOT.$item->image;?>" alt="" class="img-responsive">
    		</article>
        <?php } ?>
	</div><!-- END: contact-location -->
</div>
