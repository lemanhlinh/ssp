<?php
	class ContentsControllersCategories extends ControllersCategories{
        function has_col()
        {
            $this->is_check('has_col',1,'has_col');
        }
        function unhas_col()
        {
            $this->unis_check('has_col',0,'has_col');
        }
	}
	
?>