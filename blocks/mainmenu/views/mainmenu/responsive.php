<?php
global $tmpl;
?>

    <?php
    $Itemid = 7;
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
            if ($item->level == 0) {
                if ($i == 1)
                    $class .= ' first-item';
                if ($i == ($root_last - 1))
                    $class .= ' last-item';
                if ($i != ($root_last - 1))
                    $class .= ' menu-item';

                $caret = '<span class="caret"></span>';
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
                    $class .= ' dropdown-submenu ';
                }

                $caret = '';
            }
            $name = $item->name;
            $html .= '<li class="' . $class . '" >';
            $html .= '<a href="' . $link . '" data-target="#">';
            $html .= $name;
            $html .= '</a>';

            // browse child
            $num_child[$item->id] = $item->children;
            if ($item->children > 0)
                $html .= '<ul class="dropdown-menu">';

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

