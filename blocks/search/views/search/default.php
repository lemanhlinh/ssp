<?php
    global $tmpl;
    $tmpl -> addStylesheet("search","blocks/search/assets/css");
    $tmpl -> addScript("jquery.autocomplete","blocks/search/assets/js");
    $tmpl -> addScript("search","blocks/search/assets/js");
    $text_default = FSText::_('Gõ từ khóa tìm kiếm...');

    $keyword = $text_default;
    $module = FSInput::get('module');
    if($module == 'products'){
        $key = FSInput::get('keyword');
        if($key){
            $keyword = $key;
        }
    }
  
?>
<div id="search" class="nav-search fl-right">
    <?php $link = FSRoute::_('index.php?module=products&view=search');?>
    <form class="search-form row-item" action="<?php echo $link; ?>" name="search_form" id="search_form" method="get" onsubmit="javascript: submit_form_search();return false;" >
    	<input type="text" value="" placeholder="<?php echo $keyword; ?>" id="autocomplete" name="keyword" class="form-control" />
        <button type="submit"><i class="fas fa-search"></i></button>
        <input type='hidden'  name="module" value="products"/>
        <input type="hidden" name="module" id="link_search" value="<?php echo $link; ?>">
    	<input type='hidden'  name="view" value="search"/>
    	<input type='hidden'  name="Itemid" value="17"/>
    </form>
</div>
