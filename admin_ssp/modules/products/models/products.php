<?php

class ProductsModelsProducts extends FSModels {

    var $limit;
    var $prefix;

    function __construct() {
        $this->limit = 30;
        $this->view = 'products';
        $this->type = 'products';

        $this->arr_img_paths = array(
            array('large', 350, 350, 'resize_image'),
            array('resized', 230, 230, 'resize_image'),
            array('small', 80, 80, 'resize_image')
        );
        $this->arr_img_paths_other = array(
            array('large', 350, 350, 'resize_image'),
            array('resized', 230, 230, 'resize_image'),
            array('small', 80, 80, 'resize_image')
        );

        $this->table_category_name = FSTable_ad::_('fs_products_categories');
        $this->table_name = FSTable_ad::_('fs_products');
        // config for save
        $cyear = date('Y');
        $cmonth = date('m');
        $cday = date('d');
        $this->img_folder = 'images/products/' . $cyear . '/' . $cmonth . '/' . $cday;
        $this->check_alias = 1;
        $this->field_img = 'image';

        parent::__construct();
    }

    function setQuery() {

        // ordering
        $ordering = "";
        $where = "  ";
        if (isset($_SESSION[$this->prefix . 'sort_field'])) {
            $sort_field = $_SESSION[$this->prefix . 'sort_field'];
            $sort_direct = $_SESSION[$this->prefix . 'sort_direct'];
            $sort_direct = $sort_direct ? $sort_direct : 'asc';
            $ordering = '';
            if ($sort_field)
                $ordering .= " ORDER BY $sort_field $sort_direct, created_time DESC, id DESC ";
        }

        // estore
        if (isset($_SESSION[$this->prefix . 'filter0'])) {
            $filter = $_SESSION[$this->prefix . 'filter0'];
            if ($filter) {
                $where .= ' AND a.category_id_wrapper like  "%,' . $filter . ',%" ';
            }
        }

        if (!$ordering)
            $ordering .= " ORDER BY created_time DESC , id DESC ";


        if (isset($_SESSION[$this->prefix . 'keysearch'])) {
            if ($_SESSION[$this->prefix . 'keysearch']) {
                $keysearch = $_SESSION[$this->prefix . 'keysearch'];
                $where .= " AND a.name LIKE '%" . $keysearch . "%' ";
            }
        }

        $query = " SELECT name,created_time,is_hot,published,id,category_id,category_name,alias,image,show_in_homepage
						  FROM 
						  	" . $this->table_name . " AS a
						  	WHERE 1=1 " .
                $where .
                $ordering . " ";
        return $query;
    }

    function save($row = array(), $use_mysql_real_escape_string = 1) {
        $name = FSInput::get('name');
        if (!$name)
            return false;
        $id = FSInput::get('id', 0, 'int');
        $category_id = FSInput::get('category_id', 0, 'int');
        if (!$category_id) {
            Errors::_('Bạn phải chọn danh mục');
            return;
        }

        $cat = $this->get_record_by_id($category_id, $this->table_category_name);
        $row['category_id_wrapper'] = $cat->list_parents;
        $row['category_alias_wrapper'] = $cat->alias_wrapper;
        $row['category_name'] = $cat->name;
        $row['category_alias'] = $cat->alias;
        




        $row['content'] = htmlspecialchars_decode(FSInput::get('content'));
        $row['bestseller'] = htmlspecialchars_decode(FSInput::get('bestseller'));
//        $row['custome_buy'] = htmlspecialchars_decode(FSInput::get('custome_buy'));
        $time = date('Y-m-d H:i:s');

        $user_id = isset($_SESSION['ad_userid']) ? $_SESSION['ad_userid'] : '';
        if (!$user_id)
            return false;

        $user = $this->get_record_by_id($user_id, 'fs_users', 'username');
        if ($id) {
            $row['updated_time'] = $time;
//            $row['author_last'] = $user->username;
//            $row['author_last_id'] = $user_id;
        } else {
            $row['created_time'] = $time;
            $row['updated_time'] = $time;
//            $row['author'] = $user->username;
//            $row['author_id'] = $user_id;
        }

        //                     related products
        // $record_relate = FSInput::get('package_record_related', array(), 'array');
        // $row['package_related'] = '';
        // if (count($record_relate)) {
        //     $record_relate = array_unique($record_relate);
        //     $row['package_related'] = ',' . implode(',', $record_relate) . ',';
        // }
        
//        $tags = FSInput::get('tag_alias', '', 'array');
//        $list_tags_id = implode(',', $tags);
//        $row['tag_alias'] = $list_tags_id;
        
        $id = parent::save($row);

        return $id;
        
    }

    /*
     * select in category of home
     */

    function get_categories_tree() {
        global $db;
        $query = " SELECT a.*
						  FROM 
						  	" . $this->table_category_name . " AS a
						  	WHERE published = 1 ORDER BY ordering ";
        $sql = $db->query($query);
        $result = $db->getObjectList();
        $tree = FSFactory::getClass('tree', 'tree/');
        $list = $tree->indentRows2($result);
        return $list;
    }
   


    /*
     * Save all record for list form
     */

    function save_all() {
        $total = FSInput::get('total', 0, 'int');
        if (!$total)
            return true;
        $field_change = FSInput::get('field_change');
        if (!$field_change)
            return false;
        $field_change_arr = explode(',', $field_change);
        $total_field_change = count($field_change_arr);
        $record_change_success = 0;
        for ($i = 0; $i < $total; $i ++) {
//	        	$str_update = '';
            $row = array();
            $update = 0;
            foreach ($field_change_arr as $field_item) {
                $field_value_original = FSInput::get($field_item . '_' . $i . '_original');
                $field_value_new = FSInput::get($field_item . '_' . $i);
                if (is_array($field_value_new)) {
                    $field_value_new = count($field_value_new) ? ',' . implode(',', $field_value_new) . ',' : '';
                }

                if ($field_value_original != $field_value_new) {
                    $update = 1;
                    // category
                    if ($field_item == 'category_id') {
                        $cat = $this->get_record_by_id($field_value_new, $this->table_category_name);
                        $row['category_id_wrapper'] = $cat->list_parents;
                        $row['category_alias_wrapper'] = $cat->alias_wrapper;
                        $row['category_name'] = $cat->name;
                        $row['category_alias'] = $cat->alias;
                        $row['category_id'] = $field_value_new;
                    } else {
                        $row[$field_item] = $field_value_new;
                    }
                }
            }
            if ($update) {
                $id = FSInput::get('id_' . $i, 0, 'int');
                $str_update = '';
                global $db;
                $j = 0;
                foreach ($row as $key => $value) {
                    if ($j > 0)
                        $str_update .= ',';
                    $str_update .= "`" . $key . "` = '" . $value . "'";
                    $j++;
                }

                $sql = ' UPDATE  ' . $this->table_name . ' SET ';
                $sql .= $str_update;
                $sql .= ' WHERE id =    ' . $id . ' ';
                $db->query($sql);
                $rows = $db->affected_rows();
                if (!$rows)
                    return false;
                $record_change_success ++;
            }
        }
        return $record_change_success;
    }

    function standart_money($money, $method) {
        $money = str_replace(',', '', trim($money));
        $money = str_replace(' ', '', $money);
        $money = str_replace('.', '', $money);
        //		$money = intval($money);
        $money = (double) ($money);
        if (!$method)
            return $money;
        if ($method == 1) {
            $money = $money * 1000;
            return $money;
        }
        if ($method == 2) {
            $money = $money * 1000000;
            return $money;
        }
    }
}

?>