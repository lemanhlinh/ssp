<?php
/*
 * Huy write
 */
	// controller
	
	class NewsControllersHome extends FSControllers
	{
		function display()
		{			
			// call models
			$model = $this -> model;

            $list_cat = $model->get_list_cat();
            $list = array();
            foreach ($list_cat as $cat){
                $list[$cat->id] = $model->get_list($cat->id);
            }

			$breadcrumbs = array();
			$breadcrumbs[] = array(0=> FSText::_('Tin tức'), 1 => FSRoute::_('index.php?module=news&view=home&Itemid=2'));
			global $tmpl;	
			$tmpl -> assign('breadcrumbs', $breadcrumbs);
			$tmpl -> set_seo_special();
			
			// call views			
			include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
		}
	}
	
?>