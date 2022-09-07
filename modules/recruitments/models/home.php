<?php

class RecruitmentsModelsHome extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_recruitments',1);
        $this->table_new = $fstable->_('fs_news',1);
        $this->table_cat_new = $fstable->_('fs_news_categories',1);
        $this->table_order = $fstable->_('fs_recruitments_order',1);
        $this->limit = 3;
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
        $query = " SELECT id,name,summary,image, created_time,end_time, alias,is_new";
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

    function getCatNew(){

        $query = " SELECT id,name,alias
						FROM ".$this->table_cat_new." 
						WHERE published = 1 AND display_recruitment = 1";
        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
    }

    function getNews($catId){
            if(!$catId)
                die('Not exist this url');
            $where = " AND category_id = '$catId' ";
        $query = " SELECT id,image,title,alias,category_id,category_alias
						FROM ".$this->table_new." 
						WHERE published = 1 ".$where.' LIMIT 6';
        global $db;
        $sql = $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }
}

?>