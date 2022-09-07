<?php

class ProductsBModelsProducts {

    function __construct() {
        $fstable = FSFactory::getClass('fstable');
        $this->table_name  = $fstable->_('fs_products',1);
    }
    function setQuery($limit) {
        $where = '';
        $order = '';

        $order .= ' id DESC';
        $query = ' SELECT name,id,alias,category_id,image,category_alias,bestseller
						  FROM ' . $this->table_name . '
						  WHERE  published = 1 AND show_in_homepage = 1 ' . $where . '
						  ORDER BY  ' . $order . ' 
						  LIMIT ' . $limit
        ;
        return $query;
    }

    function get_list($limit) {
        global $db;
        $query = $this->setQuery($limit);
        if (!$query)
            return;
        $sql = $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }

}
?>
