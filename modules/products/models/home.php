<?php

class ProductsModelsHome extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_products',1);
        $this->table_cat = $fstable->_('fs_products_categories',1);
        $this->limit = 6;
    }

    function set_query_body() {
        $query = ' FROM ' . $this->table_name . '
						  WHERE published = 1  ORDER BY ordering DESC';
        return $query;
    }

    function getProductsList($query_body) {
        if (!$query_body)
            return;

        global $db;
        $query = " SELECT id,name,summary,image, created_time,category_id, category_alias, alias,bestseller";
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


    function getListCats() {
            $where = '';
        $query = " SELECT *
						FROM ".$this->table_cat." 
						WHERE published = 1" ;
        global $db;
        $sql = $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }

    function get_data($id) {
        if ($id) {
            $where = " id = '$id' ";
        } else {
            $code = FSInput::get('code');
            if (!$code)
                die('Not exist this url');
            $where = " alias = '$code' ";
        }
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

}

?>