<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" title="CMS Admin - Finalstyle">
            <img style="height: 50px" src="templates/default/images/logo_finalstyle_thiet_ke_website.png" />
        </a>
    </div>
    
    <ul class="nav navbar-top-links navbar-right">
        <?php
        $arrLang = array('en'=>'English','vi'=>'Tiếng việt','jp'=>'Japan');
        $language = $_SESSION['ad_lang'];
        $query_string = trim(preg_replace('/(&)?ad_lang=[a-z]+/i', '', $_SERVER['QUERY_STRING']));
        if($query_string != '')
            $query_string = rtrim($query_string, '&').'&';
        ?>
        <select onchange="window.location.href='<?php echo URL_ADMIN.'index.php?'.$query_string.'ad_lang=';?>'+this.value">
            <?php foreach($arrLang as $key=>$val){ ?>
                <option <?php if($language == $key) echo 'selected="selected"'?> value="<?php echo $key?>"><?php echo $val?></option>
            <?php } ?>
        </select>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="index.php?module=users&view=log&task=logout">
                        <i class="fa fa-sign-out fa-fw"></i> <?php echo FSText::_('Logout') ?>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <?php require('modules/menus/admin.php');?>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>