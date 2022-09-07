<?php

class EmployeesModelsHome2 extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_employees',1);
        $this->limit = 6;
    }



    function set_query_body() {
        $query = ' FROM ' . $this->table_name . '
						  WHERE published = 1  ORDER BY created_time DESC, ordering DESC';
        return $query;
    }

    function getProductsList($query_body) {
        if (!$query_body)
            return;

        global $db;
        $query = " SELECT id,name,summary,image, created_time, alias, time_work";
        $query .= $query_body;
        $sql = $db->query_limit($query, $this->limit, $this->page);
        $result = $db->getObjectList();

        return $result;
    }

    function getTotal($query_body) {
        if (!$query_body)
            return;
        global $db;
        $query = "SELECT count(*)";
        $query .= $query_body;
        $sql = $db->query($query);
        $total = $db->getResult();
        return $total;
    }

    function getPagination($total) {
        FSFactory::include_class('Pagination');
        $pagination = new Pagination($this->limit, $total, $this->page);
        return $pagination;
    }

    function save(){
        $name = FSInput::get('contact_name');
        $email = FSInput::get('contact_email');
        $phone = FSInput::get('contact_phone');
        $product_name = FSInput::get('contact_local');
        $content = FSInput::get('message');

        $cv_file = $_FILES["cv-file"]["name"];
        if (isset($_FILES['cv-file']))
        {
            if ($_FILES['cv-file']['error'] > 0)
            {
                echo 'File Upload Bị Lỗi';
            }
            else{
                $path = PATH_BASE . 'images/upload_file/';
                move_uploaded_file($_FILES['cv-file']['tmp_name'], $path.$_FILES['cv-file']['name']);
                $file = 'images/upload_file/'.$_FILES['cv-file']['name'];
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }

        if (!$name || !$email || !$phone)
            return false;

        $time = date('Y-m-d H:i:s');
        $published = 1;

        $row['name'] = $name;
        $row['email'] = $email;
        $row['phone'] = $phone;
        $row['published'] = $published;
        $row['created_time'] = $time;
        $row['product_name'] = $product_name;
        $row['content'] = $content;
        $row['file'] = $file;
        global $db;
        $id = $this->_add($row, $this->table_order, 1);
        return $id;
    }
}

?>