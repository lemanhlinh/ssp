<?php
/*
 * Huy write
 */
	// controller
	
	class ProductsControllersSearch
	{
		var $module;
		var $view;
		function __construct()
		{
			
			$this->module  = 'products';
			$this->view  = 'search';
			include 'modules/'.$this->module.'/models/'.$this->view.'.php';
		}
		function display()
		{
			// call models
			$model = new ProductsModelsSearch();
			$query_body = $model -> set_query_body();
			$list = $model -> get_list($query_body);

			$total = $model -> getTotal($query_body);
			$total_list = count($list);
			$pagination = $model->getPagination($total);
            $list_cat = $model->getListCats();
			$breadcrumbs = array();
			$breadcrumbs[] = array(0=> FSText::_('Tìm kiếm'), 1 => '');
			global $tmpl;	
			$tmpl -> assign('breadcrumbs', $breadcrumbs);
			$tmpl -> set_seo_special();

			// create breadcrumb
//			$array_breadcrumb = $model -> get_breadcrumb();
			// call views			
			include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
		}
	}
	
?>