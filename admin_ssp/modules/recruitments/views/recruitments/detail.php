<?php
$title = @$data ? FSText :: _('Edit'): FSText :: _('Add'); 
global $toolbar;
$toolbar->setTitle($title);
$toolbar->addButton('apply',FSText :: _('Apply'),'','apply.png'); 
$toolbar->addButton('Save',FSText :: _('Save'),'','save.png'); 
$toolbar->addButton('back',FSText :: _('Cancel'),'','cancel.png');   
	
	//$this -> dt_form_begin(0);
    $this -> dt_form_begin(1,4,$title.' '.FSText::_('Tuyển dụng'),'fa-edit',1,'col-md-8',1);
     
        TemplateHelper::dt_edit_text(FSText :: _('Name'),'name',@$data -> name);
//        TemplateHelper::dt_edit_text(FSText :: _('Email'),'email',@$data -> email);
//        TemplateHelper::dt_edit_text(FSText :: _('Số điện thoại'),'telephone',@$data -> telephone);
//        TemplateHelper::dt_edit_text(FSText :: _('Địa chỉ'),'address',@$data -> address);
//    	TemplateHelper::dt_edit_text(FSText :: _('Alias'),'alias',@$data -> alias,'',60,1,0,FSText::_("Can auto generate"));
//    	TemplateHelper::dt_edit_selectbox(FSText::_('Danh mục hỏi đáp'),'category_id',@$data -> category_id,0,$categories,$field_value = 'id', $field_label='treename',$size = 0,0);
//    	TemplateHelper::dt_edit_image(FSText :: _('Image'),'image',URL_ROOT.@$data->image);
        TemplateHelper::datetimepicke( FSText :: _('Ngày đăng' ), 'created_time', @$data->created_time?@$data->created_time:date('Y-m-d H:i:s'), FSText :: _('Bạn vui lòng chọn ngày đăng'), 20,'','col-md-3','col-md-4');
        TemplateHelper::datetimepicke( FSText :: _('Hạn nộp hồ sơ' ), 'end_time', @$data->end_time?@$data->end_time:date('Y-m-d H:i:s'), FSText :: _('Bạn vui lòng chọn hạn nộp hồ sơ'), 20,'','col-md-3','col-md-4');
        //TemplateHelper::dt_edit_text(FSText :: _('Tên người hỏi'),'asker',@$data -> asker);
        //TemplateHelper::dt_edit_text(FSText :: _('Email người hỏi'),'email',@$data -> email);
        TemplateHelper::dt_edit_text(FSText :: _('Tóm tắt'),'summary',@$data -> summary,'',100,9);
	$this->dt_form_end_col(); // END: col-1

    $this -> dt_form_begin(1,4,FSText::_('Kích hoạt'),'fa-unlock',1,'col-md-4 fl-right');
        TemplateHelper::dt_checkbox(FSText::_('Published'),'published',@$data -> published,1,'','','','col-sm-4','col-sm-6');
        TemplateHelper::dt_checkbox(FSText::_('Is New'), 'is_new', @$data->is_new, 0, '', '', '', 'col-sm-4', 'col-sm-8');
        TemplateHelper::dt_edit_text(FSText :: _('Ordering'),'ordering',@$data -> ordering,@$maxOrdering,'','',0,'','','col-sm-4','col-sm-6');
    $this->dt_form_end_col(); // END: col-2
    
    $this -> dt_form_begin(1,4,FSText::_('Nội dung'),'fa-unlock',1,'col-md-8');
        TemplateHelper::dt_edit_text(FSText :: _('Thông tin tuyển dụng'),'content',@$data -> content,'',650,450,1,'','','col-sm-5','col-sm-12');
        TemplateHelper::dt_edit_text(FSText :: _('Thông tin liên hệ'),'info_rec',@$data -> info_rec,'',650,450,1,'','','col-sm-5','col-sm-12');
    $this->dt_form_end_col(); // END: col-2
//	TemplateHelper::dt_edit_text(FSText :: _('Người hỏi'),'asker',@$data -> asker,'',60,1);
//	TemplateHelper::dt_edit_text(FSText :: _('Email'),'email',@$data -> email,'',60,1);
	//TemplateHelper::dt_edit_text(FSText :: _('Ordering'),'ordering',@$data -> ordering,@$maxOrdering,'20');
	//TemplateHelper::dt_checkbox(FSText::_('Published'),'published',@$data -> published,1);
//	TemplateHelper::dt_edit_text(FSText :: _('Câu hỏi'),'question',@$data -> question,'',100,9);
	
	//TemplateHelper::dt_edit_text(FSText :: _('Tags'),'tags',@$data -> tags,'',100,4); 
    
    $this -> dt_form_end(@$data,0,1,2,'Cấu hình seo','',1,'col-sm-4');
    //$this -> dt_form_end(@$data,0);
?>
