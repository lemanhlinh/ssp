<?php
class RecruitmentsModelsOrder extends FSModels
{
    function __construct()
    {
        parent::__construct();
        $fstable = FSFactory::getClass('fstable');
        $this->table_name = $fstable->_('fs_recruitments',1);
    }

    function get_data()
    {
        $code = FSInput::get('code');
        if($code){
            $where = " AND alias = '$code' ";
        } else {
            $id = FSInput::get('id',0,'int');
            if(!$id)
                die('Not exist this url');
            $where = " AND id = '$id' ";
        }
        $query = " SELECT *
						FROM ".$this->table_name." 
						WHERE published = 1 ".$where;
        global $db;
        $sql = $db->query($query);
        $result = $db->getObject();
        return $result;
    }

}

?>