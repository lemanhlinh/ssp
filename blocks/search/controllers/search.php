<?php

/*
 * Huy write
 */
	// models 
	
	
	class SearchBControllersSearch
	{
		function __construct()
		{
		}
		function display($parameters = array(),$title = '')
		{
			$style = $parameters->getParams('style');
			$style = $style ? $style : 'default';
            
			include 'blocks/search/models/search.php';
			$model = new SearchBModelsSearch();
			//$field_work = $model->get_field_work();
			
			// call views
			include 'blocks/search/views/search/'.$style.'.php';
		}
  
	}
	
?>