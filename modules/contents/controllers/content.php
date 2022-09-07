<?php
/*
 * Huy write
 */
	// controller
	
	class ContentsControllersContent extends FSControllers
	{
		var $module;
		var $view;
	
		function display()
		{
			// call models
			$model = $this->model;
			
			$data = $model->get_data();
			if(!$data)
                setRedirect(URL_ROOT,'Không tồn tại bài viết này','Error');

            $category_id = $data -> category_id;
            $list_cat = $model->get_list_contents($category_id);
            $cat = $model->get_cat_list($category_id);

            global $tmpl,$module_config;
			$tmpl -> set_data_seo($data);
            
			$breadcrumbs = array();
			$breadcrumbs[] = array(0=>$data -> category_name, 1 => 'javascript: void(0)');
			$breadcrumbs[] = array(0=>$data->title, 1 => '');	
			global $tmpl;	
			$tmpl -> assign('breadcrumbs', $breadcrumbs);
			
			// seo
			$tmpl -> set_data_seo($data);
			// call views			
			include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
		}

	}
	
?>