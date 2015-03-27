<?php
	
	ob_start();
	define('RESOURCE', 'http://localhost:8080/yorkz/admin/');
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
