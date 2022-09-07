<?php
$title = @$data ? FSText::_('Edit') : FSText::_('Add');
global $toolbar;
$toolbar->setTitle($title);
$toolbar->addButton('apply', FSText::_('Apply'), '', 'apply.png');
$toolbar->addButton('Save', FSText::_('Save'), '', 'save.png');
$toolbar->addButton('back', FSText::_('Cancel'), '', 'back.png');
$this->dt_form_begin();
TemplateHelper::dt_text(FSText::_('Sản phẩm'), $products->name);
TemplateHelper::dt_text(FSText::_('Danh mục'), $products->category_name);
TemplateHelper::dt_text(FSText::_('Tên'), $parent->name);
TemplateHelper::dt_text(FSText::_('Email'), $parent->email);
TemplateHelper::dt_text(FSText::_('Comment'), $parent->comment);
TemplateHelper::dt_edit_text(FSText::_('Trả lời'), 'comment', @$data->comment, '', 60, 5, 1);
?>
<input type="hidden" value="1" name="reply" />
<input type="hidden" value="<?php echo @$data->id; ?>" name="reply_id" />
<input type="hidden" value="<?php echo $products->id; ?>" name="reply_product" />
<input type="hidden" value="<?php echo  $parent->id; ?>" name="reply_parent" />
<?php
$this->dt_form_end(@$data);
?>