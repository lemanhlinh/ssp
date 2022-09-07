<?php 
	class RecruitmentsBModelsRecruitments
	{
		function __construct()
		{
            $fstable = FSFactory::getClass('fstable');
            $this->table_name  = $fstable->_('fs_recruitments',1);
		}
		function getList(){
			$where = '';
			$query = "SELECT id,name,summary,image,alias,is_new
						  FROM ".$this->table_name." AS a
						  WHERE published = 1 AND is_new = 1 ".$where." 
						  ORDER BY id DESC LIMIT 6
						 ";
			global $db;
			$db->query($query);
            $result = $db->getObjectList();
            return $result;
		}
}
?>