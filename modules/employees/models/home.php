<?php

class EmployeesModelsHome extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_employees',1);
        $this->limit = 7;
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
}

?>