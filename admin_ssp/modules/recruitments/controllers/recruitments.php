<?php
	class RecruitmentsControllersRecruitments extends Controllers
	{
		function __construct()
		{
			$this->view = 'recruitments' ;
			parent::__construct(); 
		}
		function display()
		{
			parent::display();
			$sort_field = $this -> sort_field;
			$sort_direct = $this -> sort_direct;
			
			$model  = $this -> model;
			$list = $model->get_data('');
			$pagination = $model->getPagination('');
			include 'modules/'.$this->module.'/views/'.$this->view.'/list.php';
		}
		function add()
		{
			$model = $this -> model;
			$maxOrdering = $model->getMaxOrdering();
			
			// products related
			//$products_categories = $model->get_products_categories_tree();
				
			include 'modules/'.$this->module.'/views/'.$this -> view.'/detail.php';
		}
		
		function edit()
		{
			$ids = FSInput::get('id',array(),'array');
			$id = $ids[0];
			$model = $this -> model;
			$data = $model->get_record_by_id($id);
			include 'modules/'.$this->module.'/views/'.$this->view.'/detail.php';
		}
        function is_new() {
            $this->is_check('is_new', 1, 'is new');
        }

        function unis_new() {
            $this->unis_check('is_new', 0, 'un is new');
        }
		
	}
?>