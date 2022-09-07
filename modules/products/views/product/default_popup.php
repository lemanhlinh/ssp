<?php
$url = $_SERVER['REQUEST_URI'];
$return = base64_encode($url);
?>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog order-product">
    
      <!-- Modal content-->
      	<div class="modal-content">
	      	<div class="modal-body">
                <div class="content-popup">
                    <h3><?php echo FSText::_('Nhận tư vấn ngay'); ?></h3>
                    <div class="form-order">
                        <form method="post" action="#" name="order-product" class="form" enctype="multipart/form-data">
                                <input type="text" name="name" class="form-control mbl" placeholder="<?php echo FSText::_('Họ tên')?>">
                                <input type="tel" name="phone" class="form-control mbl" placeholder="<?php echo FSText::_('Số điện thoại')?>" pattern="[0-9]{10}" >
                                <input type="email" name="email" class="form-control mbl" placeholder="<?php echo FSText::_('Email')?>">
                                <input type="submit" value="<?php echo FSText::_("Gửi"); ?>" class="btn btn-danger form-control">
                            </div>
                            <input type="hidden" name='return' value='<?php echo $return; ?>' />
                            <input type="hidden" name="module" value="products" />
                            <input type="hidden" name="task" value="save" />
                            <input type="hidden" name="view" value="product" />
                            <input type="hidden" name="product_name" value="<?php echo $data->name; ?>" />
                        </form>
                    </div>
                </div>
	      </div>
      	</div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="myPramater" role="dialog">
    <div class="modal-dialog order-product">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
<!--                <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>-->
                <div class="content-popup">
                    <h3><?php echo FSText::_('Thông số kỹ thuật'); ?></h3>
                    <table class="shop_attributes">
                        <tbody>
                        <?php foreach ($list_parameter as $item ){?>
                            <tr>
                                <th><?php echo $item->name; ?></th>
                                <td>
                                    <p><?php echo $item->size; ?></p>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>