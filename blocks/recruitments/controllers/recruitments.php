<?php

/*
 * Huy write
 */
// models 
include 'blocks/recruitments/models/recruitments.php';

class RecruitmentsBControllersRecruitments {

    function __construct() {
        
    }

    function display($parameters, $title,$id) {
        $style = $parameters->getParams('style');
        $style = $style ? $style : 'default';
        // call models
        $model = new RecruitmentsBModelsRecruitments();
        $list = $model->getList();
        // call views
        include 'blocks/recruitments/views/recruitments/default.php';
    }

}

?>