<?php		
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'].'/sessions');
		
		mb_internal_encoding("UTF-8");
		
		require_once 'app/index.php';
?>