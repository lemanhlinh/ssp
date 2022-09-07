<?php
/*
 * Huy write
 */
	// models 
	include 'blocks/partners/models/partners.php';
	class PartnersBControllersPartners
	{
		function __construct()
		{
		}
		function display($parameters,$title)
		{
			$style = $parameters->getParams('style');
			$style = $style ? $style : 'default';
			$model = new PartnersBModelsPartners();
            $data = $model -> get_data();
   
			include 'blocks/partners/views/partners/'.$style.'.php';
		}
	}
	
?>