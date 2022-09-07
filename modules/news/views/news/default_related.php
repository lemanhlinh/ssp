<?php
    $total_content_relate = count($relate_news_list);
    if($total_content_relate){ ?>
        <h4 class="title-module-related">
            <span>
                <?php echo FSText::_('Tin tức khác'); ?>
            </span>
        </h4>
        <div class="new-related row-item">
        <div class="row">
            <?php 
                    for($i = 0; $i < $total_content_relate; $i ++){
                    $item = $relate_news_list[$i]; 
                    $link = FSRoute::_('index.php?module=news&view=news&code='.$item -> alias.'&ccode='.$item->category_alias.'&id='.$item->id);
                    $image_large = URL_ROOT.str_replace('original','lange',$item->image);
                ?>
                        <div class="image-check col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="info-block-new">
                                <a href="<?php echo $link; ?>" title="<?php echo $item->title; ?>">
                                    <h3 class="title-product"><?php echo $item->title; ?></h3>
                                </a>
                            </div>
                            <div class="image-info-plus">
                                <a href="<?php echo $link; ?>" title="<?php echo $item->title; ?>">
                                        <img src="<?php echo URL_ROOT.str_replace('original', 'resized', $item->image); ?>" class="img-responsive">

                                </a>
                            </div>
                        </div>
            <?php } ?>
            </div>
        </div>
<?php } ?>