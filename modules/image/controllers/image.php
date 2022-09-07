<?php
/*
 * Huy write
 */
	// controller
	
	class ImageControllersImage extends FSControllers
	{
		var $module;
		var $view;
		function display()
		{
            $model = $this->model;
            $data = $model->get_data();
            if(!$data)
                setRedirect(URL_ROOT,'Không tồn tại bài viết này','Error');
            $list_image = $model->get_image($data->id);

            global $tmpl,$module_config;
            $tmpl -> set_data_seo($data);
			include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
		}
	}
	
?>