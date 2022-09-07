<?php 
	class ProductsModelsCategories extends ModelsCategories
	{
		function __construct()
		{
			
			$this -> table_items = FSTable_ad::_('fs_products');
			$this -> table_name = FSTable_ad::_('fs_products_categories');
			$this -> check_alias = 1;
                        $this -> arr_img_paths = array(array('resized',506,279,'resize_image'),array('small',74,74,'resize_image'),array('larger',506,577,'resize_image'),array('larger2',570,321,'cut_image'));
			// exception: key (field need change) => name ( key change follow this field)
			$this -> field_except_when_duplicate = array(array('list_parents','id'),array('alias_wrapper','alias'));
			// config for save
			$cyear = date('Y');
			$cmonth = date('m');
			//$cday = date('d');
			$this -> img_folder = 'images/products/cat/'.$cyear.'/'.$cmonth;
			$this -> field_img = 'image';
			parent::__construct();
			$this -> limit = 100;
            
           // $this -> array_synchronize = array($this -> table_items=>array('id'=>'category_id','alias'=>'category_alias','name'=>'category_name'
//                                                                            ,'published'=>'published_cate','alias_wrapper'=>'category_alias_wrapper'));
		}
        function get_categories_tree_all()
		{
			global $db;
			$query = $this->setQuery();
			$sql = $db->query($query);
			$result = $db->getObjectList();
			$tree  = FSFactory::getClass('tree','tree/');
			$list = $tree -> indentRows2($result);
			
			return $list;
		}
	}
	
?>