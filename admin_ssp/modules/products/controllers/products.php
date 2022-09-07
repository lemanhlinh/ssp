<?php

// models 
//	include 'modules/'.$module.'/models/'.$view.'.php';

class ProductsControllersProducts extends Controllers {

    function __construct() {
        $this->view = 'products';
        parent::__construct();
    }

    function display() {
        parent::display();
        $sort_field = $this->sort_field;
        $sort_direct = $this->sort_direct;

        $model = $this->model;
        //$categories = $model->get_categories_tree();
        $list = $model->get_data();
        $categories = $model->get_categories_tree();

        $pagination = $model->getPagination('');
        include 'modules/' . $this->module . '/views/' . $this->view . '/list.php';
    }

    function add() {
        $model = $this->model;
        $categories = $model->get_categories_tree();
        // data from fs_news_categories
//        $categories_home = $model->get_categories_tree();
        $maxOrdering = $model->getMaxOrdering();
        $uploadConfig = base64_encode('add|' . session_id());

        include 'modules/' . $this->module . '/views/' . $this->view . '/detail.php';
    }

    function edit() {
        $ids = FSInput::get('id', array(), 'array');
        $id = $ids[0];
        $model = $this->model;
        $categories = $model->get_product_categories_tree_by_permission();
        $data = $model->get_record_by_id($id);

        // data from fs_news_categories
        include 'modules/' . $this->module . '/views/' . $this->view . '/detail.php';
    }
    
     



    function show_in_homepage() {
        $this->is_check('show_in_homepage', 1, 'show home');
    }

    function unshow_in_homepage() {
        $this->unis_check('show_in_homepage', 0, 'un home');
    }
    function is_hot() {
        $this->is_check('is_hot', 1, 'is hot');
    }

    function unis_hot() {
        $this->unis_check('is_hot', 0, 'un is hot');
    }


}

?>