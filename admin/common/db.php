<?php
	/**
	 *	连接数据库
	 */
	function getDBConnect(){
		$db_host = 'localhost';
		$db_name = 'db_demo';
		$db_user = 'root';
		$db_pass = '';

		$db = new PDO('mysql:host='. $db_host .';dbname='. $db_name, $db_user, $db_pass);
		$db->query("set character set 'utf8'");

		return $db;
	}

?>