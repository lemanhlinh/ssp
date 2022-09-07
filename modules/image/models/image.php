<?php 
	class ImageModelsImage extends FSModels
	{
		function __construct()
		{
            $fstable = FSFactory::getClass('fstable');
            $this->table_name  = $fstable->_('fs_multimedia',1);
            $this->table_image  = $fstable->_('fs_image_images');
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
            $query = " SELECT *
						FROM ". $this->table_name ." 
						WHERE published = 1 ".$where ;
            global $db;
            $sql = $db->query($query);
            $result = $db->getObject();
            return $result;
        }
        function get_image($id){

            $query = " SELECT *
						FROM ". $this->table_image ." 
						WHERE record_id = ".$id ;
            global $db;
            $sql = $db->query($query);
            $result = $db->getObjectList();
            return $result;
        }
    }
?>