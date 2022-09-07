<?php 
	class PartnersBModelsPartners
	{
		function __construct()
		{
            $fstable = FSFactory::getClass('fstable');
            $this->table_name = $fstable->_('fs_partners');
            $this -> limit = 20;
		}
		
		function get_data(){
			$where=" published = 1 ";
			$order = 'ORDER BY ordering';
			$query = "  SELECT id,name,image,url
					FROM ".$this->table_name."
					WHERE ".$where."
					 ".$order."
					 ";
			global $db;
			$db->query($query);
			$result = $db->getObjectList();
			return $result;
		}

	}
	
?>