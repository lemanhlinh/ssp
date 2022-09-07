<?php
$this->dt_form_begin(1, 4, $title . ' ' . FSText::_('Products'), 'fa-edit', 1, 'col-md-8');
TemplateHelper::dt_edit_text(FSText :: _('Sản phẩm'), 'name', @$data->name);
TemplateHelper::dt_edit_text(FSText :: _('Alias'), 'alias', @$data->alias, '', 60, 1, 0, FSText::_("Can auto generate"));
TemplateHelper::dt_edit_image(FSText :: _('Hình ảnh'), 'image', str_replace('/original/', '/small/', URL_ROOT . @$data->image));
TemplateHelper::dt_edit_selectbox(FSText::_('Categories'), 'category_id', @$data->category_id, 0, $categories, $field_value = 'id', $field_label = 'treename', $size = 10, 0, 1);


//TemplateHelper::dt_edit_selectbox('Tác giả','author_book_id',@$data -> author_book_id,0,$author_book,'id', 'name',1,0,1);
//TemplateHelper::dt_edit_selectbox('Công ty phát hành','company_ex_id',@$data -> company_ex_id,0,$company_ex,'id', 'name',1,0,1);
//TemplateHelper::dt_edit_selectbox('Nhà xuất bản','home_ex_id',@$data -> home_ex_id,0,$xuatban,'id', 'name',1,0,1);
//TemplateHelper::dt_edit_selectbox('Loại bìa','loai_bia_id',@$data -> loai_bia_id,0,$loaibia,'id', 'name',1,0,1);
//TemplateHelper::datetimepicke(FSText :: _('Ngày xuất bản'), 'released_time', @$data->released_time ? @$data->released_time : date('Y-m-d H:i:s'), FSText :: _('Bạn vui lòng chọn thời gian hiển thị'), 20, '', 'col-md-3', 'col-md-4');
//TemplateHelper::dt_edit_text(FSText :: _('Giá'),'price_old',@$data -> price_old,0);
//TemplateHelper::dt_edit_selectbox('Loại giảm giá','discount_unit',@$data -> discount_unit,0,array('percent'=>'Phần trăm','price'=>'Giá trị'),$field_value = '', $field_label='');
//TemplateHelper::dt_edit_text(FSText :: _('Giảm giá'),'discount',@$data -> discount,0);
//TemplateHelper::dt_edit_text(FSText :: _('Link video'), 'video', @$data->video);
//TemplateHelper::dt_edit_text(FSText :: _('Phiên bản'), 'version', @$data->version);
//TemplateHelper::dt_edit_text(FSText :: _('Bảo hành'), 'guarantee', @$data->guarantee);
//TemplateHelper::dt_edit_selectbox('Tầm giá','price_range',@$data -> price_range,0,array('1'=>'Cao cấp','2'=>'Trung cấp','3'=>'Phổ thông'),$field_value = '', $field_label='');
//TemplateHelper::dt_edit_text(FSText :: _('Số lượng'),'quantity',@$data -> quantity,0);
$this->dt_form_end_col(); // END: col-1

//$this->dt_form_begin(1, 2, FSText::_('Quản trị'), 'fa-user', 1, 'col-md-4 fl-right');
//TemplateHelper::dt_text(FSText :: _('Người tạo'), @$data->author);
//TemplateHelper::dt_text(FSText :: _('Thời gian tạo'),date('H:i:s d/m/Y',strtotime(@$data -> start_time)));
//TemplateHelper::dt_text(FSText :: _('Người sửa cuối'), @$data->author_last);
//TemplateHelper::dt_text(FSText :: _('Thời gian sửa'),date('H:i:s d/m/Y',strtotime(@$data -> end_time)));
//$this->dt_form_end_col(); // END: col-4

$this->dt_form_begin(1, 2, FSText::_('Kích hoạt'), 'fa-unlock', 1, 'col-md-4 fl-right');
TemplateHelper::dt_checkbox(FSText::_('Published'), 'published', @$data->published, 1, '', '', '', 'col-sm-4', 'col-sm-8');
//TemplateHelper::dt_checkbox(FSText::_('Is Hot'), 'is_hot', @$data->is_hot, 0, '', '', '', 'col-sm-4', 'col-sm-8');
TemplateHelper::dt_checkbox(FSText::_('Nổi bật'), 'show_in_homepage', @$data->show_in_homepage, 0, '', '', '', 'col-sm-4', 'col-sm-8');

TemplateHelper::dt_edit_text(FSText :: _('Ordering'), 'ordering', @$data->ordering, @$maxOrdering, '', '', 0, '', '', 'col-sm-4', 'col-sm-8');
$this->dt_form_end_col(); // END: col-2

//$this->dt_form_begin(1, 2, FSText::_('Tags'), 'fa-tag', 1, 'col-md-4 fl-right');
//TemplateHelper::dt_edit_selectbox(FSText::_('Tags'),'tag_alias',@$data -> tag_alias,0,$tag,$field_value = 'alias', $field_label='name',$size = 30,1);
//$this->dt_form_end_col(); // END: col-2
//$this->dt_form_begin(1, 2, FSText::_('Summary'), 'fa-info', 1, 'col-md-4 fl-right');
//TemplateHelper::dt_edit_text(FSText :: _(''), 'summary', @$data->summary, '', 100, 5, 0, '', '', 'col-sm-2', 'col-sm-12');
//$this->dt_form_end_col(); // END: col-4

$this->dt_form_begin(1, 4, FSText::_('Thông tin cơ bản'), 'fa-info', 1, 'col-md-8');
TemplateHelper::dt_edit_text(FSText :: _(''), 'bestseller', @$data->bestseller, '', 650, 450, 1, '', '', 'col-sm-2', 'col-sm-12');
$this->dt_form_end_col(); // END: col-4

$this->dt_form_begin(1, 4, FSText::_('Mô tả chi tiết'), 'fa-info', 1, 'col-md-8');
TemplateHelper::dt_edit_text(FSText :: _(''), 'content', @$data->content, '', 650, 450, 1, '', '', 'col-sm-2', 'col-sm-12');
$this->dt_form_end_col(); // END: col-4

//$this->dt_form_begin(1, 4, FSText::_('Khách hàng đã mua'), 'fa-info', 1, 'col-md-8');
//TemplateHelper::dt_edit_text(FSText :: _(''), 'custome_buy', @$data->custome_buy, '', 650, 450, 1, '', '', 'col-sm-2', 'col-sm-12');
//$this->dt_form_end_col(); // END: col-4



// $this->dt_form_begin(1, 2, FSText::_('Sản phẩm mua kèm'), 'fa-info', 1, 'col-md-12');
// include 'detail_package.php';
// $this->dt_form_end_col(); // END: col-4
?>