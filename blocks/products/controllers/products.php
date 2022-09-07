<?php

/*
 * Huy write
 */
// models 
include 'blocks/products/models/products.php';

class ProductsBControllersProducts {

    function __construct() {
        
    }

    function display($parameters, $title, $id) {
        $limit = $parameters->getParams('limit');
        $style = $parameters->getParams('style');

        $model = new ProductsBModelsProducts();
        $list = $model->get_list($limit);
        include 'blocks/products/views/products/' . $style . '.php';
    }
    


}

?>