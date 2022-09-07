<?php

class ProductsModelsCat extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $this->limit =  6;
        //$this->limit = 10;
        $fs_table = FSFactory::getClass('fstable');
        $this->table_name = $fs_table->getTable('fs_products',1);
        $this->table_cat = $fs_table->getTable('fs_products_categories',1);
    }

    function set_query_body($cid) {
        
        $sort = FSInput::get('sort');
        $query_ordering = '';
        switch ($sort) {
                case 'new' :
                        $query_ordering = ' released_time DESC';
                        break;
                case 'hits' :
                        $query_ordering = ' is_hot DESC, hits DESC ';
                        break;
                case 'buy' :
                        $query_ordering = ' is_hot DESC, number_buy DESC';
                        break;
                case 'up' :
                        $query_ordering = ' price ASC';
                        break;
                case 'down' :
                        $query_ordering = ' price DESC';
                        break;
                default:
                        $query_ordering = ' is_hot DESC, hits DESC ';
                        break;
        }
        
        $prices = FSInput::get('prices');
        $where = "";
        if($prices){
            $fillter_price=$this->get_about_price($prices);
            if($fillter_price) {
                $operator = $fillter_price->operator;
                $begin_price = $fillter_price->start;
                $end_price = $fillter_price->end;
                $where  .= ' AND ';
                if($operator == 5) {
                    $where .= 'price = '.$begin_price;
                }else if ($operator == 6) {
                    $where .= $begin_price.' < price ';
                }else if ($operator == 7) {
                    $where .= 'price < '.$begin_price;
                }else if ($operator == 8) {
                    $where .= $begin_price.' >= price';
                }else if ($operator == 9) {
                    $where .= 'price <= '.$begin_price;
                }else if ($operator == 10) {
                    $where .= $begin_price.' < price AND price < '.$end_price;
                }else if ($operator == 11) {
                    $where .= $begin_price.' < price AND price <= '.$end_price;
                }else if ($operator == 12) {
                    $where .= $begin_price.' <= price AND price < '.$end_price;
                }else if ($operator == 13) {
                    $where .= $begin_price.' <= price AND price <= '.$end_price;
                }
            } 
        }
        $type = !empty($_SESSION['type']) ? $_SESSION['type'] : '';
        if ($type)
            $order = $type . ' DESC, ';
        //$fs_table = FSFactory::getClass('fstable');
        $query = ' FROM ' . $this->table_name . '
						  WHERE ( category_id = ' . $cid . ' 
						  	OR category_id_wrapper like "%,' . $cid . ',%" )
						  	AND published = 1
						  	' . $where .
                ' ORDER BY ' . $query_ordering;
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
        $query = " SELECT id,name, image, alias,parent_id as parent_id,seo_title,seo_keyword,seo_description,content
						FROM " . $this->table_cat . " 
						WHERE published = 1 " . $where;
        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
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