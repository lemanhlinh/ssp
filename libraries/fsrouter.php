<?php

class FSRoute {

    var $url;

    function __construct($url) {
        
    }

    static function _($url) {
        return FSRoute::enURL($url);
    }

    /*
     * Trả lại tên mã hóa trên URL
     */

    static function get_name_encode($name, $lang) {
        $lang_url = array(
            'c'=>array(
                '1'=>'ce',
                '2'=>'cj',
            ),
            'tim-kiem'=>array(
                '1'=>'search',
                '2'=>'search-japan',
            ),
            'nang-luc'=>array(
                '1'=>'capacity',
                '2'=>'capacity-japan',
            ),
            'tin-tuc'=>array(
                '1'=>'news',
                '2'=>'news-japan',
            ),
            'viec-lam'=>array(
                '1'=>'job',
                '2'=>'job-japan',
            ),
            'thanh-vien'=>array(
                '1'=>'employees',
                '2'=>'employees-japan',
            ),
            'san-pham'=>array(
                '1'=>'products',
                '2'=>'products-japan',
            ),
            'tuyen-dung'=>array(
                '1'=>'recruitments',
                '2'=>'recruitments-japan',
            ),
            'danh-sach-tuyen-dung'=>array(
                '1'=>'list-recruitments',
                '2'=>'list-recruitments-japan',
            ),
            'lien-he'=>array(
                '1'=>'contact',
                '2'=>'contact-japan',
            ),
            'nop-ho-so'=>array(
                '1'=>'order-now',
                '2'=>'order-now-japan',
            ),
            'pc'=>array(
                '1'=>'pce',
                '2'=>'pcj',
            ),
            'n'=>array(
                '1'=>'ne',
                '2'=>'nj',
            ),
            'cn'=>array(
                '1'=>'cne',
                '2'=>'cnj',
            ),
            'td'=>array(
                 '1'=>'tde',
                 '2'=>'tdj',
            ),
            'hr'=>array(
                '1'=>'hre',
                '2'=>'hrj',
            ),
            'od'=>array(
                '1'=>'ode',
                '2'=>'odj',
            ),
            'i'=>array(
                '1'=>'in',
                '2'=>'ij',
            ),
        );

        if ($lang == 'vi'){
            return $name;
        } else if($lang == 'en'){
            return $lang_url[$name][1];
        } else if($lang == 'jp'){
            return $lang_url[$name][2];
        }

        if ($lang == 'vi')
            return $name;
        else
            return $lang_url[$name];
    }

    static function addParameters($params, $value, $module = '', $view = '') {
        // only filter
        if (!$module) {
            $module = FSInput::get('module');
            //$view = FSInput::get('view');
            if (!$view) {
                //$module = FSInput::get('module');
                $view = FSInput::get('view');
            }
        }

        return FSRoute :: _($_SERVER['REQUEST_URI']);
    }

    function removeParameters($params) {
        // only filter
        $module = FSInput::get('module');
        $view = FSInput::get('view');
        $ccode = FSInput::get('ccode');
        $filter = FSInput::get('filter');
        $manu = FSInput::get('manu');
        $Itemid = FSInput::get('Itemid');

        $url = 'index.php?module=' . $module . '&view=' . $view;
        if ($ccode) {
            $url .= '&ccode=' . $ccode;
        }
        if ($filter) {
            $url .= '&filter=' . $filter;
        }
        $url .= '&Itemid=' . $Itemid;
        $url = trim(preg_replace('/&' . $params . '=[0-9a-zA-Z_-]+/i', '', $url));
    }

    /*
     * rewrite
     */

    static function enURL($url) {
        if (!$url)
            $url = $_SERVER['REQUEST_URI'];

        if (!IS_REWRITE)
            return URL_ROOT . $url;
        if (strpos($url, 'http://') !== false || strpos($url, 'https://') !== false)
            return $url;

        $url_reduced = substr($url, 10); // width : index.php
        $array_buffer = explode('&', $url_reduced, 10);
        $array_params = array();
        for ($i = 0; $i < count($array_buffer); $i ++) {
            $item = $array_buffer[$i];
            $pos_sepa = strpos($item, '=');
            $array_params[substr($item, 0, $pos_sepa)] = substr($item, $pos_sepa + 1);
        }

        $module = isset($array_params['module']) ? $array_params['module'] : '';
        $view = isset($array_params['view']) ? $array_params['view'] : $module;
        $task = isset($array_params['task']) ? $array_params['task'] : 'display';
        $Itemid = isset($array_params['Itemid']) ? $array_params['Itemid'] : 0;
        //$location  = isset($array_params['location'])?$array_params['location']: CITY;

        $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';
        $url_first = URL_ROOT;
        $url1 = '';
        switch ($module) {
            case 'news':
                switch ($view) {
                    case 'news':
                        $code = isset($array_params['code']) ? $array_params['code'] : '';
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                        return $url_first . $code . '-' . FSRoute::get_name_encode('n', $lang) . $id . '.html';
                    case 'cat':
                        $ccode = isset($array_params['ccode']) ? $array_params['ccode'] : '';
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                        return $url_first . $ccode . '-' . FSRoute::get_name_encode('cn', $lang) . $id . '.html';
                    case 'home':
                        return $url_first.FSRoute::get_name_encode('tin-tuc', $lang).'.html';
                    default:
                        return $url_first . $url;
                }
                break;
//            case 'products':
//                switch ($view) {
//                    case 'product':
//                        $code = isset($array_params['code']) ? $array_params['code'] : '';
//                        $ccode = isset($array_params['ccode']) ? $array_params['ccode'] : '';
//                        $id = isset($array_params['id']) ? $array_params['id'] : '';
//                        return $url_first . $ccode .'/' . $code . '-'.FSRoute::get_name_encode('dp', $lang). $id . '.html';
//                    case 'cat':
//                        $ccode = isset($array_params['ccode']) ? $array_params['ccode'] : '';
//                        $id = isset($array_params['cid']) ? $array_params['cid'] : '';
//                        $url_first .= $ccode . '-' . FSRoute::get_name_encode('pc', $lang) . $id;
//                        return $url_first .= '.html';
//                    case 'home':
//                        $url_first .= FSRoute::get_name_encode('san-pham', $lang);
//                        return $url_first.'.html';
//                    case 'search':
//                        $keyword = isset($array_params['keyword']) ? $array_params['keyword'] : '';
//                        $url = $url_first . FSRoute::get_name_encode('tim-kiem', $lang);
//                        if ($keyword) {
//                            $url .= '/' . $keyword . '.html';
//                        }
//                        return $url;
//                    default:
//                        return $url_first . $url;
//                }
//                break;
            case 'image':
                switch ($view) {
                    case 'image':
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                        $code = isset($array_params['code']) ? $array_params['code'] : '';
                        return $url_first.FSRoute::get_name_encode('nang-luc', $lang).'/'. $code . '-' . FSRoute::get_name_encode('i', $lang). $id . '.html';
                }
            case 'contents':
                switch ($view) {
                    case 'cat':
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                        $ccode = isset($array_params['ccode']) ? $array_params['ccode'] : '';
                        return $url_first . $ccode . '-cc' . $id . '.html';
                    case 'content':
                        $code = isset($array_params['code']) ? $array_params['code'] : '';
                        $ccode = isset($array_params['ccode']) ? $array_params['ccode'] : '';
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                        //return $url_first.FSRoute::get_name_encode('ct',$lang).'-'.$code.'.html';
                        return $url_first .$ccode.'/'. $code . '-' . FSRoute::get_name_encode('c', $lang) . $id . '.html';
                }
                break;
             case 'home':
                switch ($view) {
                    case 'home':
                        return $url_first;
                }
                break;
            
            case 'notfound':
                switch ($view) {
                    case 'notfound':
                        return $url_first . '404-page.html';
                    default:
                        return $url_first . $url;
                }
                break;

            case 'contact':
                switch ($view){
                    case 'contact':
                        return $url_first.FSRoute::get_name_encode('lien-he', $lang).'.html';
                }
                break;
            case 'employees':
                switch ($view){
                    case 'home':
                        return $url_first.FSRoute::get_name_encode('viec-lam', $lang).'.html';
                    case 'home2':
                        return $url_first.FSRoute::get_name_encode('thanh-vien', $lang).'.html';
                }
                break;
            case 'recruitments':
                switch ($view){
                    case 'home':
                            return $url_first.FSRoute::get_name_encode('tuyen-dung', $lang).'.html';
                    case 'home2':
                        return $url_first.FSRoute::get_name_encode('danh-sach-tuyen-dung', $lang).'.html';
                    case 'order':
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                            return $url_first.FSRoute::get_name_encode('nop-ho-so', $lang). '-' . FSRoute::get_name_encode('od', $lang) . $id.'.html';
                    case 'recruitments':
                        $code = isset($array_params['code']) ? $array_params['code'] : '';
                        $ccode = isset($array_params['ccode']) ? $array_params['ccode'] : '';
                        $id = isset($array_params['id']) ? $array_params['id'] : '';
                        //return $url_first.FSRoute::get_name_encode('ct',$lang).'-'.$code.'.html';
                        return $url_first . $code . '-' . FSRoute::get_name_encode('hr', $lang) . $id . '.html';
                }
                break;
            default:
                return URL_ROOT . $url;
        }
    }

    /*
     * get real url from virtual url
     */

    function deURL($url) {
        if (!IS_REWRITE)
            return $url;
        return $url;
        if (strpos($url, URL_ROOT_REDUCE) !== false) {
            $url = substr($url, strlen(URL_ROOT_REDUCE));
        }
        if ($url == 'news.html')
            return 'index.php?module=news&view=home&Itemid=1';
        if (strpos($url, 'news-page') !== false) {
            $f = strpos($url, 'news-page') + 9;
            $l = strpos($url, '.html');
            $page = intval(substr($url, $f, ($l - $f)));
            return "index.php?module=news&view=home&page=$page&Itemid=1";
        }
        $array_url = explode('/', $url);
        $module = isset($array_url[0]) ? $array_url[0] : '';
        switch ($module) {
            case 'news':
                // if cat
                if (preg_match('#news/([^/]*)-c([0-9]*)-it([0-9]*)(-page([0-9]*))?.html#s', $url, $arr)) {
                    return "index.php?module=news&view=cat&id=" . @$arr[2] . "&Itemid=" . @$arr[3] . '&page=' . @$arr[5];
                }
                // if article
                if (preg_match('#news/detail/([^/]*)-i([0-9]*)-it([0-9]*).html#s', $url, $arr)) {
                    return "index.php?module=news&view=news&id=" . @$arr[2] . "&Itemid=" . @$arr[3];
                }
            case 'companies':
                $str_continue = ($module = isset($array_url[1])) ? $array_url[1] : '';
                if ($str_continue == 'register.html')
                    return "index.php?module=companies&view=company&task=register&Itemid=5";
                if (preg_match('#category-id([0-9]*)-city([0-9]*)-it([0-9]*)(-page([0-9]*))?.html#s', $str_continue, $arr)) {
                    if (isset($arr[5]))
                        return "index.php?module=companies&view=category&id=" . @$arr[1] . "&city=" . @$arr[2] . "&Itemid=" . @$arr[3] . "&page=" . @$arr[5];
                    else
                        return "index.php?module=companies&view=category&id=" . @$arr[1] . "&city=" . @$arr[2] . "&Itemid=" . @$arr[3];
                }
            default:
                return $url;
        }
    }

    function get_home_link() {
        $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';
        if ($lang == 'vi') {
            return URL_ROOT;
        } else {
            return URL_ROOT . 'en';
        }
    }

    /*
     * Dịch ngang
     */

    static function change_link_by_lang($lang, $link = '') {
        $module = FSRoute::get_param('module', $link);
        $view = FSRoute::get_param('view', $link);
        if (!$view)
            $view = $module;
        if (!$module || ($module == 'home' && $view == 'home')) {
            if ($lang == 'en') {
//				return URL_ROOT;
            } else {
                return URL_ROOT . 'vi';
            }
        }
        switch ($module) {

            case 'contents':
                switch ($view) {
                    case 'content':
                        $code = FSRoute::get_param('code', $link);
                        $record = FSRoute::trans_record_by_field($code, 'alias', 'fs_contents', $lang, 'id,alias,category_alias');
                        if (!$record)
                            return;
                        $url = URL_ROOT . FSRoute::get_name_encode('ct', $lang) . '-' . $record->alias;
                        return $url . '.html';
                        return $url;
                }
                break;
            default:
                $url = URL_ROOT . 'ce-information';
                return $url . '.html';
        }
    }

    /*
     * Hàm trả lại tham số: có thể từ biến $_REQUEST hay từ phân tích URL truyền vào
     */

    static function get_param($param_name, $link = '') {
        if (!$link)
            return FSInput::get($param_name);
        $url = str_replace('&amp;', '&', $link);
        $url_reduced = substr($url, 10); // width : index.php
        $array_buffer = explode('&', $url_reduced, 10);
        $array_params = array();
        for ($i = 0; $i < count($array_buffer); $i ++) {
            $item = $array_buffer[$i];
            $pos_sepa = strpos($item, '=');
            $array_params[substr($item, 0, $pos_sepa)] = substr($item, $pos_sepa + 1);
        }
        return @$array_params[$param_name];
    }

    function get_record_by_id($id, $table_name, $lang, $select) {
        if (!$id)
            return;
        if (!$table_name)
            return;
        $fs_table = FSFactory::getClass('fstable');
        $table_name = $fs_table->getTable($table_name);

        $query = " SELECT " . $select . "
					  FROM " . $table_name . "
					  WHERE id = $id ";

        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
    }

    /*
     * Lấy bản ghi dịch ngôn ngữ
     */

    static function trans_record_by_field($value, $field = 'alias', $table_name, $lang, $select = '*') {
        if (!$value)
            return;
        if (!$table_name)
            return;
        $fs_table = FSFactory::getClass('fstable');
        $table_name_old = $fs_table->getTable($table_name);

        $query = " SELECT id
					  FROM " . $table_name_old . "
					  WHERE " . $field . " = '" . $value . "' ";

        global $db;
        $sql = $db->query($query);
        $id = $db->getResult();
        if (!$id)
            return;
        $query = " SELECT " . $select . "
					  FROM " . $fs_table->translate_table($table_name) . "
					  WHERE id = '" . $id . "' ";
        global $db;
        $sql = $db->query($query);
        $rs = $db->getObject();
        return $rs;
    }

    /*
     * Dịch từ field -> field ( tìm lại id rồi dịch ngược)
     */

    function translate_field($value, $table_name, $field = 'alias') {

        if (!$value)
            return;
        if (!$table_name)
            return;
        $fs_table = FSFactory::getClass('fstable');
        $table_name_old = $fs_table->getTable($table_name);

        $query = " SELECT id
					  FROM " . $table_name_old . "
					  WHERE $field = '" . $value . "' ";
        global $db;
        $sql = $db->query($query);
        $id = $db->getResult();
        if (!$id)
            return;
        $query = " SELECT " . $field . "
					  FROM " . $fs_table->translate_table($table_name) . "
					  WHERE id = '" . $id . "' ";
        global $db;
        $sql = $db->query($query);
        $rs = $db->getResult();
        return $rs;
    }

}
