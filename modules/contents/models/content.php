<?php 
	class ContentsModelsContent extends FSModels
	{
		function __construct()
		{
		
			$fstable = FSFactory::getClass('fstable');
			$this->table_name  = $fstable->_('fs_contents',1);
            $this -> table_add = $fstable->_('fs_contents_categories',1);
		}


		/*
		 * get Article
		 */
		function get_data()
		{
			$id = FSInput::get('id',0,'int');
			if($id){
				$where = " AND id = '$id' ";				
			} else {
				$code = FSInput::get('code');
				if(!$code)
					die('Not exist this url');
				$where = " AND alias = '$code' ";
			}
			$query = " SELECT id,title,image,source,content,category_id,category_id_wrapper,category_alias,category_name,
                                summary, alias, created_time, updated_time,seo_title,seo_keyword,seo_description,show_map,tags
						FROM ". $this->table_name ." 
						WHERE published = 1 AND category_published = 1
						".$where ;
			global $db;
		$sql = $db->query($query);
			$result = $db->getObject();
			return $result;
		}

        function get_list_contents($id)
        {
            $where=" AND category_id = " .$id ;
            $order = 'ORDER BY ordering';
            $query = "  SELECT id,title,alias,category_alias
					FROM ".$this->table_name."
					WHERE published = 1 ".$where."
					 ".$order."
					 ";
            global $db;
            $db->query($query);
            $result = $db->getObjectList();
            return $result;
        }
        
        function get_cat_list($id){
			$query = ' select id,has_col from '. $this -> table_add.' where published = 1 AND id = '.$id;
			global $db;
			$sql = $db->query($query);
			$list = $db->getObject();
			return $list;
		}
	}
	
?>