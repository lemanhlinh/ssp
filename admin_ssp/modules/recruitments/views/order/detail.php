<?php
$title = @$data ? FSText::_('Edit'): FSText::_('Add'); 
global $toolbar;
$toolbar->setTitle($title);
//$toolbar->addButton('apply',FSText::_('Apply'),'','apply.png');
//$toolbar->addButton('save',FSText::_('Save'),'','save.png');
$toolbar->addButton('cancel',FSText::_('Cancel'),'','cancel.png');   
$this -> dt_form_begin();
TemplateHelper::dt_edit_text(FSText :: _('Ứng tuyển job'),'product_name',@$data -> product_name);
TemplateHelper::dt_edit_text(FSText :: _('Name'),'name',@$data -> name);
TemplateHelper::dt_edit_text(FSText :: _('Phone'),'phone',@$data -> phone);
TemplateHelper::dt_edit_text(FSText :: _('Email'),'email',@$data -> email);
TemplateHelper::dt_edit_file(FSText :: _('File'),'file',@$data -> file);
TemplateHelper::dt_edit_text(FSText :: _('Nội dung'), 'content', @$data->content, '', 650, 450, 1, '', '', 'col-sm-12', 'col-sm-12');

//TemplateHelper::dt_checkbox(FSText::_('Published'),'published',@$data -> published,1);
//TemplateHelper::dt_edit_text(FSText :: _('Ordering'),'ordering',@$data -> ordering,@$maxOrdering,'20');
$this -> dt_form_end(@$data, 1, 0);
?>