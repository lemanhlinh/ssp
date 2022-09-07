<?php
/*
 * Huy write
 */
	// controller
	
	class NewsControllersCat extends FSControllers
	{
		var $module;
		var $view;
		function display()
		{
			// call models
			$model = $this -> model;
			$cat  = $model->getCategory();
			if(!$cat)
			{
				setRedirect(URL_ROOT,'Không tồn tại danh mục này','error');
			}

			$query_body = $model->set_query_body($cat->id);
			$list = $model->getNewsList($query_body);
			$total = $model->getTotal($query_body);
			$pagination = $model->getPagination($total);
            $list_cat = $model->get_list_cat();
			
			$breadcrumbs = array();
            $breadcrumbs[] = array(0=>FSText::_('Tin tức'), 1 => FSRoute::_('index.php?module=news&view=home&Itemid=2'));
			$breadcrumbs[] = array(0=>$cat->name, 1 => FSRoute::_('index.php?module=news&view=cat&ccode='.$cat->alias.'&id='.$cat->id.'&Itemid=3'));
			global $tmpl;	
			$tmpl -> assign('breadcrumbs', $breadcrumbs);
			// seo
			$tmpl -> set_data_seo($cat);
			// call views			
			include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
		}
	}
	
?>