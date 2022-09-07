<div class="row clearfix">
    <div class="parameter-show">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <?php if (!empty($list_parameter)){ ?>
            <table class="shop_attributes">
                <tbody>
                <?php
                $a = 0;
                foreach ($list_parameter as $item ){
                    $a++;
                    if ($a == 7) {
                        break;
                    }
                ?>
                <tr>
                    <th><?php echo $item->name; ?></th>
                    <td>
                        <p><?php echo $item->size; ?></p>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <p class="text-center view-all-pramater"><a href="javascript:void(0);" data-toggle="modal" data-target="#myPramater"><i class="far fa-eye"></i>Xem bảng cấu hình chi tiết</a></p>
            <?php } ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <?php if(isset($data->video)){ ?>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $this->_get_video_id($data->video); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php } ?>
        </div>
    </div>
</div>

