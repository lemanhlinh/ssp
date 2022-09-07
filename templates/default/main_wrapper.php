<div class="main-content row-item ">
    <div class="row row-1">
        <?php if ($tmpl->count_block('right')) { ?>
            <div class="main-column-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <?php if ($tmpl->count_block('pos_contents_top')) { ?>
                    <div class="row-content pos_contents_top">
                        <?php echo $tmpl->load_position('pos_contents_top'); ?>
                    </div> <!-- END: .pos_contents_top -->
                <?php } ?>

                <?php echo $main_content; ?>

                <?php if ($tmpl->count_block('pos_contents_bottom')) { ?>
                    <div class="row-content pos_contents_bottom">
                        <?php echo $tmpl->load_position('pos_contents_bottom'); ?>
                    </div> <!-- END: .pos_contents_bottom -->
                <?php } ?>
            </div>
            <div class="main-column-right col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <?php echo $tmpl->load_position('right'); ?>
            </div>
        <?php } else if ($tmpl->count_block('left')) { ?>
            <div class="main-column-content col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
                <?php if ($tmpl->count_block('pos_contents_top')) { ?>
                    <div class="row-content pos_contents_top">
                        <?php echo $tmpl->load_position('pos_contents_top'); ?>
                    </div> <!-- END: .pos_contents_top -->
                <?php } ?>

                <?php echo $main_content; ?>

                <?php if ($tmpl->count_block('pos_contents_bottom')) { ?>
                    <div class="row-content pos_contents_bottom">
                        <?php echo $tmpl->load_position('pos_contents_bottom'); ?>
                    </div> <!-- END: .pos_contents_bottom -->
                <?php } ?>
            </div>
            <div class="main-column-left col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-pull-9 col-md-pull-9">
                <?php echo $tmpl->load_position('left'); ?>
            </div>
        <?php } else { ?>
            <div class="main-column col-xs-12">
                <?php if ($tmpl->count_block('pos_contents_top')) { ?>
                    <div class="row-content pos_contents_top">
                        <?php echo $tmpl->load_position('pos_contents_top'); ?>
                    </div> <!-- END: .pos_contents_top -->
                <?php } ?>

                <?php echo $main_content; ?>

                <?php if ($tmpl->count_block('pos_contents_bottom')) { ?>
                    <div class="row-content pos_contents_bottom">
                        <?php echo $tmpl->load_position('pos_contents_bottom'); ?>
                    </div> <!-- END: .pos_contents_bottom -->

                <?php } ?>
            </div><!-- END: .main-column -->
        <?php } ?>
    </div>
</div>
<div class="clearfix"></div>

