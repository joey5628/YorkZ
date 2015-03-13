<?php
	
	//ob_start();
	define('RESOURCE', 'http://localhost:8080/yorkz/admin/');
	define('DB_HOST', 'localhost');
	define('DB_DBNAME', 'db_demo');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	require('fed.class.php');

	$fed = new Fed();
 ?>