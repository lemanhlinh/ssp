<?php
class ProductsModelsOrder extends FSModels
{
    var $limit;
    var $prefix ;
    function __construct()
    {
        $this -> limit = 20;
        $this -> view = 'order';
        $this -> table_name = 'fs_products_order';
        $this -> check_alias = 0;
        parent::__construct();
    }
}
?>