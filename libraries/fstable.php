<?php 
	class FSTable
	{
		function __construct()
		{
		}
		public static function _($table,$multi_lang = 0)
		{
			if(!$multi_lang)
				return $table;
			$lang = isset($_SESSION['lang'])?$_SESSION['lang']:'vi';
            if($lang == 'vi'){
                return $table;
            }else if($lang == 'en'){
                return $table.'_'.'en';
            } else if($lang == 'jp'){
                return $table.'_'.'jp';
            }
		}
		public static function getTable($table,$multi_lang = 0)
		{
			if(!$multi_lang)
				return $table;
			$lang = isset($_SESSION['lang'])?$_SESSION['lang']:'vi';
            if($lang == 'vi'){
                return $table;
            }else if($lang == 'en'){
                return $table.'_'.'en';
            } else if($lang == 'jp'){
                return $table.'_'.'jp';
            }
		}
		public static function translate_table($table,$multi_lang = 0)
		{
			if(!$multi_lang)
				return $table;
			$lang = isset($_SESSION['lang'])?$_SESSION['lang']:'vi';
            if($lang == 'vi'){
                return $table;
            }else if($lang == 'en'){
                return $table.'_'.'en';
            } else if($lang == 'jp'){
                return $table.'_'.'jp';
            }
		}
	}
?>