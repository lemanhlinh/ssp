<?php

class NewsModelsHome extends FSModels {

    function __construct() {
        parent::__construct();
        global $module_config;
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_news',1);
        $this->table_category = $fstable->_('fs_news_categories',1);
        $this->limit = 9;
    }



    function get_list($cat_id) {
        if (!$cat_id)
            return;

        global $db;
        $where = ' AND category_id = '.$cat_id;
        $query = ' SELECT id,title,summary,image, created_time,category_id,category_name, category_alias, alias
                    FROM ' . $this->table_name . ' 
                                WHERE published = 1 '.$where.'
                                ORDER BY id DESC LIMIT 3';
        //print_r($query); 
        $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }

    function get_list_cat() {
        $query = " SELECT id, name, alias
						FROM " . $this->table_category . " 
						WHERE published = 1 ";
        global $db;
        $sql = $db->query($query);
        $result = $db->getObjectList();
        return $result;
    }

}

?>