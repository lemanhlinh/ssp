<?php
global $tmpl, $config;
$tmpl->addStylesheet('leftmenu', 'blocks/mainmenu/assets/css');
$tmpl->addScript('leftmenu', 'blocks/mainmenu/assets/js');
$lang = FSInput::get('lang');
if($lang == 'vi'){
    $lang_a = URL_ROOT;
}else {
    $lang_a = URL_ROOT.$lang;
}
?>
<div class="menu_left clearfix hidden-xs">
    <?php
    $Itemid = FSInput::get('Itemid');
    $root_total = 0;
    $root_last = 0;
    for ($i = 1; $i <= count($list); $i++) {
        if (@$list[$i]->level == 0) {
            $root_total ++;
            $root_last = $i;
        }
    }
    ?>
    <?php $url = $_SERVER['REQUEST_URI']; ?>
    <?php $url = substr($url, strlen(URL_ROOT_REDUCE)); ?>
    <?php $url = URL_ROOT . $url; ?>
    <ul id="navmenu-v2" class="nav navbar-nav">
        <?php
        $html = "";
        $i = 1;
        $num_child = array();
        $parant_close = 0;
        foreach ($list as $item) {
            ?>
            <?php
            $link = FSRoute::_($item->link);
            $class = '';
            $class .= ' level' . $item->level;

            if ($url == $link)
                $class .= ' activated ';

            // level = 1

            // level = 1
            if ($item->level == 1) {
                if ($i == 1)
                    $class .= ' level1-item';
                if ($i == ($root_last - 1))
                    $class .= ' level1-item';
                if ($i != ($root_last - 1))
                    $class .= ' level1-menu-item';

                // $caret = '<span class="caret"></span>';
            }

            if ($item->level == 0) {
                if ($i == 1)
                    $class .= ' first-item';
                if ($i == ($root_last - 1))
                    $class .= ' last-item';
                if ($i != ($root_last - 1))
                    $class .= ' menu-item';

                // $caret = '<span class="caret"></span>';
            }

            // level > 1
            else {
                $parent = $item->parent_id;
                // total children
                $total_children_of_parent = @$list[$parent]->children;
                if (isset($num_child[$parent])) {
                    if ($total_children_of_parent == $num_child[$parent]) {
                        $class .= ' first-sitem sub-menu-item ';
                    } else {
                        $class .= ' mid-sitem sub-menu-item ';
                    }
                }
                if ($total_children_of_parent > 1) {
//                    $class .= ' sub-menu ';
                }

                $caret = '';
            }
            $name = $item->name;
            $html .= '<li class="' . $class . '" >';
            if ($item->level == 1) {
                $html .= '<i class="fa fa-arrow-circle-right"></i>';
            }else if ($item->level > 1){
                $html .= '<i class="fa fa-chevron-right"></i>';
            }
            $html .= '<a href="' . $link . '" data-target="#">';
//            if($item->icon){
//                $html .= '<i class="'.$item->icon.'"></i>';
//            }
//            if($item->image){
//                $html .= '<img src="'.URL_ROOT.$item->image.'"/>';
//            }
            $html .= $name;
            $html .= '</a>';

            // browse child
            $num_child[$item->id] = $item->children;
            if ($item->children > 0)
                $html .= '<ul class="sub-menu">';

            if (@$num_child[$item->parent_id] == 1) {
                // if item has children => close in children last, don't close this item
                if ($item->children > 0) {
                    $parant_close ++;
                } else {
                    $parant_close ++;
                    for ($i = 0; $i < $parant_close; $i++) {
//                        $html .= "	<li class='sub-footer'>&nbsp;</li>";
                        $html .= '</ul>';
                    }
                    $parant_close = 0;
                    $num_child[$item->parent_id] --;
                }
            }
            if (( (@$num_child[$item->parent_id] == 0) && (@$item->parent_id > 0 ) ) || !$item->children) {

            }
            if (@$num_child[$item->parent_id] >= 1)
                $num_child[$item->parent_id] --;

            $i ++;
        }
        echo $html;
        ?>
        <!-- NEWS_TYPE for menu	-->
    </ul>
</div>
