<?php 
	class SlideshowBModelsSlideshow
	{
		function __construct()
		{
		    $fstable = FSFactory::getClass('fstable');
            $this->table_name = $fstable->_('fs_slideshow',1);
            $this->table_categories = $fstable->_('fs_slideshow_categories',1);
		}
		
		function get_data($cat_id){
		    $where = '';
            //var_dump($cat_id);
            if($cat_id){
                $where .= ' AND category_id = '. $cat_id;
            }
			$query = '  SELECT id,name,image,url,summary,video,image_thumb
					FROM '. $this->table_name .'
					WHERE published = 1 '. $where .'
					ORDER BY ordering ';
                    
			global $db;
			$db->query($query);
			$result = $db->getObjectList();
			return $result;
		}
	}
	
?>