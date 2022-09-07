<?php

class MainMenuBModelsMainMenu {

    function __construct() {
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_products',1);
    }

    function getList($group) {
        if (!$group)
            return;
        global $db;

        $fstable = FSFactory:: getClass('fstable');
        $table_name = $fstable->_('fs_menus_items',1);

        $sql = " SELECT id,image,link, name, level, parent_id as parent_id, 
                            target, description,is_type,is_link,summary,bk_color,icon
					        FROM " . $table_name . "
					        WHERE published  = 1
						    AND group_id = $group 
					        ORDER BY ordering
                    ";

        $db->query($sql);
        $result = $db->getObjectList();
        $tree_class = FSFactory::getClass('tree', 'tree/');
        return $list = $tree_class->indentRows($result, 3);
    }

    

}

?>