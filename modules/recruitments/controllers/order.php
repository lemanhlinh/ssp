<?php
/*
 * Huy write
 */

// controller

class RecruitmentsControllersOrder extends FSControllers
{
    var $module;
    var $view;

    function display()
    {
        // call models
        $model = $this->model;
        $data = $model->get_data();
        $breadcrumbs = array();
        $breadcrumbs[] = array(0 => FSText::_('Tuyển dụng'), 1 => 'index.php?module=recruitments&view=home');
        $breadcrumbs[] = array(0=>FSText::_('Nộp hồ sơ'), 1 => '');
        global $tmpl;
        $tmpl->assign('breadcrumbs', $breadcrumbs);
        // call views
        include 'modules/' . $this->module . '/views/' . $this->view . '/default.php';
    }
}

?>