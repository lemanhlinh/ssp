
<?php

class ProductsModelsProduct extends FSModels {

    function __construct() {
        $limit = 10;
        $page = FSInput::get('page');
        $this->limit = $limit;
        $this->page = $page;
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_products',1);
        $this->table_category = $fstable->_('fs_products_categories',1);
        $this->table_parameter = $fstable->_('fs_products_add',1);
        $this->table_order = $fstable->_('fs_products_order');
    }

    /*
     * get Category current
     */

    function get_category_by_id($category_id) {
        if (!$category_id)
            return "";
        $query = " SELECT id,name,alias
						FROM " . $this->table_category . "  
						WHERE id = $category_id ";
        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
    }

    /*
     * get Article
     */

    function getProduct($id) {
        if ($id) {
            $where = " id = '$id' ";
        } else {
            $code = FSInput::get('code');
            if (!$code)
                die('Not exist this url');
            $where = " alias = '$code' ";
        }
        $fs_table = FSFactory::getClass('fstable');
        $query = " SELECT *
						FROM " . $this->table_name . " 
						WHERE
						" . $where . " ";
        //print_r($query) ;   
        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
    }

    function getRelateProductsList($cid) {
        if (!$cid)
            die;

        global $db;
        $limit = 8;
        $id = FSInput::get2('id', 0, 'int');
        $query = ' SELECT id,name,alias, category_id,updated_time ,image,category_alias,created_time,bestseller
						FROM ' . $this->table_name . '
						WHERE category_id = ' . $cid . '
							AND published = 1 AND id != ' . $id . '
						ORDER BY  created_time DESC, ordering DESC
						LIMIT ' . $limit;
        $db->query($query);
        $result = $db->getObjectList();

        return $result;
    }
    
    function getImageProducts($record_id){
        if (!$record_id)
            return;
        $limit = 10;
        $fs_table = FSFactory::getClass('fstable');
        $query = " SELECT id,image, record_id
						  FROM " . $fs_table->getTable('fs_products_images',1) . "
						  WHERE record_id =  $record_id
						     LIMIT $limit
						 ";
        global $db;
        $sql = $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }

    function update_hits($news_id){
            if(!$news_id)
                    return;

            // count
            global $db,$econfig;
            $sql = " UPDATE ".$this->table_name."
                            SET hits = hits + 1 
                            WHERE  id = '$news_id' 
                     ";
            $db->query($sql);
            $rows = $db->affected_rows();
            return $rows;
    }

    function save(){
        $name = FSInput::get('name');
        $email = FSInput::get('email');
        $phone = FSInput::get('phone');
        if (!$name || !$email || !$phone)
            return false;

        $time = date('Y-m-d H:i:s');
        $published = 1;

        $row['name'] = $name;
        $row['email'] = $email;
        $row['phone'] = $phone;
        $row['published'] = $published;
        $row['created_time'] = $time;
        global $db;
        $id = $this->_add($row, $this->table_order, 1);
        return $id;
    }

    function get_parameter_code($product_id) {
        if (!$product_id)
            return;
        $query = " SELECT id,name,size
						FROM ".$this -> table_parameter."
						WHERE  document_id = $product_id ";
        global $db;
        $db->query($query);
        return $rs = $db->getObjectList();
    }

}

?>