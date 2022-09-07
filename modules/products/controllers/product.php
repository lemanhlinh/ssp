<?php

/*
 * Huy write
 */

// controller

class ProductsControllersProduct extends FSControllers {

    var $module;
    var $view;

    function display() {
        // call models
        $model = $this->model;
        $limit = $model->limit;
        $id = FSInput::get2('id', 0, 'int');
        $data = $model->getProduct($id);

        if (!$data)
            setRedirect(URL_ROOT, 'Không tồn tại sản phảm này', 'Error');

        $list_parameter = $model->get_parameter_code($id);
        $category_id = $data->category_id;
        $category = $model->get_category_by_id($category_id);
        if (!$category)
            setRedirect(URL_ROOT, 'Không tồn tại danh mục này', 'Error');

        // relate
        $relate_products_list = $model->getRelateProductsList($category_id);
        $product_images = $model->getImageProducts($data->id);

        $breadcrumbs = array();
        $breadcrumbs[] = array(0 => FSText::_('Sản phẩm'), 1 => FSRoute::_('index.php?module=products&view=home&Itemid=2'));
        $breadcrumbs[] = array(0 => $category->name, 1 => FSRoute::_('index.php?module=products&view=cat&cid=' . $data->category_id . '&ccode=' . $data->category_alias));	
        $breadcrumbs[] = array(0 => $data->name, 1 => "#");
        global $tmpl, $module_config;
        $tmpl->assign('breadcrumbs', $breadcrumbs);
        $tmpl->assign('title', $data->name);
        $tmpl->assign('description', $data->content);
        $tmpl->assign('og_image', URL_ROOT . $data->image);
        // seo
        $tmpl->set_data_seo($data);
        // call views			
        include 'modules/' . $this->module . '/views/' . $this->view . '/default.php';
    }
    
    function update_hits(){
            $model = $this -> model;
            $news_id = FSInput::get('id');
            $model -> update_hits($news_id);
    }

    function save(){
        $model = $this->model;
        $id = $model->save();
        $return = base64_decode(FSInput::get('return'));
        $sender_name = FSInput::get('name');
        $sender_email = FSInput::get('email');
        if ($id) {
            if ($return) {
                $link = $return;
            } else {
                $link = FSRoute::_("index.php?module=products");
            }

            $msg = FSText::_("Chúng tôi sẽ sớm liên hệ với bạn.");
            if (!$this->send_mail($sender_name, $sender_email)) {
                $msg = FSText::_("Cám ơn bạn đã liên lạc với chúng tôi.");
            }
            setRedirect($link, $msg);
            return;
        } else {
            echo "<script type='text/javascript'>alert('Bạn cần nhập đẩy đủ thông tin.'); </script>";
            $this->display();
            return;
        }
    }

    // function sendmail
    function send_mail($sender_name = '', $sender_email = '') {
        include 'libraries/errors.php';
        // send Mail()
        $mailer = FSFactory::getClass('Email', 'mail');
        $global = new FsGlobal();

        // Recipient
        $to = $global->getConfig('admin_email');
        $site_name = $global->getConfig('site_name');

        global $config;
        $subject = ' - Yêu cầu tư vấn';

        $contact_fullname = FSInput::get('name');
        $contact_telephone = FSInput::get('phone');
        $contact_email = FSInput::get('email');

        $product_name = FSInput::get('product_name');

        $mailer->isHTML(true);
        $mailer->setSender(array($sender_email, $sender_name));
        $mailer->AddAddress($to, 'admin');
        $mailer->AddCC($sender_email, $sender_name);


        $mailer->setSubject('' . html_entity_decode($site_name) . ' ' . $subject . ' từ ' . $contact_fullname);
        // body
        $message="Cảm ơn bạn liên hệ với Nagita";
        $body = '';
        $body .= '<table border="0" cellpadding="1" cellspacing="1"><tbody>';
        $body .= '<tr><td style="width:120px;"><strong>Họ và tên:</strong></td><td>' . $contact_fullname . '</td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Email:</strong></td><td>' . $contact_email . '</td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Số điện thoại:</strong></td><td>' . $contact_telephone . '</td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Sản phẩm:</strong></td><td><span style=\'color: red;\'>'.$product_name.'</span></td></tr>';
        $body .= '</tbody></table>';
        $body .= $message;
        $mailer->setBody($body);
        if (!$mailer->Send())
            return false;
        return true;
    }

}

?>