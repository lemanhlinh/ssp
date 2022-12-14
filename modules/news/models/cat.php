<?php

class NewsModelsCat extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $limit = '';
        FSFactory::include_class('parameters');
        if (!empty($module_config->params)) {
            $current_parameters = new Parameters($module_config->params);
            $limit = $current_parameters->getParams('limit');
        }

        $this->limit = $limit ? $limit : 7;
        //$this->limit = 10;
        $fs_table = FSFactory::getClass('fstable');
        $this->table_name = $fs_table->getTable('fs_news',1);
        $this->table_cat = $fs_table->getTable('fs_news_categories',1);
    }

    function set_query_body($cid) {
        $date1 = FSInput::get("date_search");
        $where = "";
        $order = '';
        $type = !empty($_SESSION['type']) ? $_SESSION['type'] : '';
        if ($type)
            $order = $type . ' DESC, ';
        //$fs_table = FSFactory::getClass('fstable');
        $query = ' FROM ' . $this->table_name . '
						  WHERE ( category_id = ' . $cid . ' 
						  	OR category_id_wrapper like "%,' . $cid . ',%" )
						  	AND published = 1
						  	' . $where .
                ' ORDER BY ' . $order . '  created_time DESC,ordering DESC
						 ';
        //print_r($query);             
        return $query;
    }

    /*
     * get Category current
     * By Id or By code
     */

    function getCategory() {
        $code = FSInput::get('ccode');
        if ($code) {
            $where = " AND alias = '$code' ";
        } else {
            $id = FSInput::get('id', 0, 'int');
            if (!$id)
                die('Not exist this url');
            $where = " AND id = '$id' ";
        }
        $query = " SELECT id,name, icon, alias,parent_id as parent_id,seo_title,seo_keyword,seo_description
						FROM " . $this->table_cat . " 
						WHERE published = 1 " . $where;
        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
    }

    function getNewsList($query_body) {
        if (!$query_body)
            return;

        global $db;
        $query = " SELECT id,title,summary,image, created_time,category_id, category_alias, category_name,alias,comments_total,comments_published";
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

    function get_list_cat() {
        $query = " SELECT *
						FROM " . $this->table_cat . " 
						WHERE published = 1 ";
        global $db;
        $sql = $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }

}

?>