<?php
/*
 * Huy write
 */
	// controller
	
	class ProductsControllersHome extends FSControllers
	{
		function display()
		{			
			// call models
            $model = $this->model;

            $query_body = $model->set_query_body();
            $list = $model->getProductsList($query_body);
            $total = $model->getTotal($query_body);
            $pagination = $model->getPagination($total);
            $list_cat = $model->getListCats();

			$breadcrumbs = array();
			$breadcrumbs[] = array(0=> FSText::_('Sản phẩm'), 1 => FSRoute::_('index.php?module=products&view=home'));
			global $tmpl;	
			$tmpl -> assign('breadcrumbs', $breadcrumbs);
			$tmpl -> set_seo_special();
			
			// call views			
			include 'modules/'.$this->module.'/views/'.$this->view.'/default.php';
		}

		function get_info(){
            $id = FSInput::get('id');
            $model = $this->model;
            $data = $model->get_data($id);
            $html ='';
            $html .='<div class="row">';
                $html .='<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
                    $html .='<img src="'.URL_ROOT.str_replace('original','large', $data->image).'" title="'.$data->name.'" class="img-responsive" />';
                $html .='</div>';
                $html .='<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">';
                    $html .='<h3 class="title-popup">'.$data->name.'</h3>';
                    $html .= html_entity_decode($data->bestseller);
                $html .='</div>';
            $html .='</div>';
            if($data->content){
                $html .='<div class="detail-product">';
                $html .='<h4 class="detail-popup">'.FSText::_('Mô tả chi tiết').'</h4>';
                $html .= html_entity_decode($data->content);
                $html .='</div>';
            }
            echo $html;
        }
	}
	
?>