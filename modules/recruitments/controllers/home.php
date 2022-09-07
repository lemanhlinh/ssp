<?php
/*
 * Huy write
 */
// controller

class RecruitmentsControllersHome extends FSControllers
{
    function display()
    {
        // call models
        $model = $this -> model;

        $query_body = $model->set_query_body();
        $list = $model->getProductsList($query_body);
        $cat_new = $model->getCatNew();
        $list_new = $model->getNews($cat_new->id);
        $total = $model->getTotal($query_body);
        $pagination = $model->getPagination($total);

        $breadcrumbs = array();
        $breadcrumbs[] = array(0=> FSText::_('Tuyển dụng'), 1 => FSRoute::_('index.php?module=recruitments&view=home&Itemid=2'));
        global $tmpl;
        $tmpl -> assign('breadcrumbs', $breadcrumbs);
        $tmpl -> set_seo_special();

        // call views
        include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
    }

    function save(){
        $model = $this->model;
        $id = $model->save();
        $return = base64_decode(FSInput::get('return'));
        $sender_name = FSInput::get('contact_name');
        $sender_email = FSInput::get('contact_email');
        if ($id) {
            if ($return) {
                $link = $return;
            } else {
                $link = FSRoute::_("index.php?module=recruitments&view=home");
            }

            $msg = FSText::_("Cảm ơn bạn đã gửi cv cho Chúng tôi.");
//            if (!$this->send_mail($sender_name, $sender_email)) {
//                $msg = FSText::_("Cảm ơn bạn đã gửi cv cho Chúng tôi.");
//            }
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
        $subject = ' - Nộp hồ sơ';

        $contact_fullname = FSInput::get('contact_name');
        $contact_telephone = FSInput::get('contact_phone');
        $contact_email = FSInput::get('contact_email');

        $product_name = FSInput::get('contact_local');
        $product_content = FSInput::get('message');

        $mailer->isHTML(true);
        $mailer->setSender(array($sender_email, $sender_name));
        $mailer->AddAddress($to, 'admin');
        $mailer->AddCC($sender_email, $sender_name);


        $mailer->setSubject('' . html_entity_decode($site_name) . ' ' . $subject . ' từ ' . $contact_fullname);
        // body
        $message="Cảm ơn bạn đã gửi cv cho Chúng tôi";
        $body = '';
        $body .= '<table border="0" cellpadding="1" cellspacing="1"><tbody>';
        $body .= '<tr><td style="width:120px;"><strong>Họ và tên:</strong></td><td>' . $contact_fullname . '</td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Email:</strong></td><td>' . $contact_email . '</td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Số điện thoại:</strong></td><td>' . $contact_telephone . '</td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Công việc:</strong></td><td><span style=\'color: red;\'>'.$product_name.'</span></td></tr>';
        $body .= '<tr><td style="width:120px;"><strong>Ghi chú:</strong></td><td><span style=\'color: red;\'>'.$product_content.'</span></td></tr>';
        $body .= '</tbody></table>';
        $body .= $message;
        $mailer->setBody($body);
        if (!$mailer->Send())
            return false;
        return true;
    }
}

?>