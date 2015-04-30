<?php
	
	ob_start();
	$res = 'http://localhost:80/yorkz/admin/';
	if(strpos($_SERVER["HTTP_USER_AGENT"],"Windows")){
		$res = 'http://localhost:8080/yorkz/admin/';
	}
	define('RESOURCE', $res);
	define('LOGIN_TEXT', 'yi.zYorkZ2015-03-19');
	/*define('DB_HOST', 'localhost');
	define('DB_DBNAME', 'db_demo');
	define('DB_USER', 'root');
	define('DB_PASS', '');*/
	
	require('./common/fed.class.php');
	require('./common/db.php');
	require('./common/checklogin.php');

	$fed = new Fed();
	ob_end_flush();
 ?>
