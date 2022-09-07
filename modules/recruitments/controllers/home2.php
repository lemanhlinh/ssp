<?php
/*
 * Huy write
 */
// controller

class RecruitmentsControllersHome2 extends FSControllers
{
    function display()
    {
        // call models
        $model = $this -> model;

        $query_body = $model->set_query_body();
        $list = $model->getProductsList($query_body);
        $total = $model->getTotal($query_body);
        $pagination = $model->getPagination($total);

        $breadcrumbs = array();
        $breadcrumbs[] = array(0=> FSText::_('Tuyển dụng'), 1 => FSRoute::_('index.php?module=recruitments&view=home&Itemid=2'));
        global $tmpl;
        $tmpl -> assign('breadcrumbs', $breadcrumbs);
        $tmpl -> set_seo_special();

        // call views
        include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
    }
}

?>