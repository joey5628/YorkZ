<?php
	/**
	 *	检查是否登录过
	 */
	$toLogin = false;
	$url = $_SERVER['PHP_SELF'];
	$name = end(explode('/', $url));  
	$name = current(explode('.', $name));
	if($name != 'login'){
		$toLogin = true;
		if(isset($_COOKIE["user"])){
			$user = $_COOKIE["user"];
			$n = strpos($user, '|');
			$login = substr($user, 0, $n);
			$pwd = substr($user, $n + 1);
			$db = getDBConnect();
			$sql = "select * from user where login='$login' and pass='$pwd'";
			$result = $db->query($sql);

			$info = $result->fetch(PDO::FETCH_ASSOC);

			if($info){
				$toLogin = false;
				setcookie("user", $user, time()+3600);
			}
		}
	}
	
	//echo 'toLogin-'.$toLogin.'<br>';
	if($toLogin){
		header('location:login.php');
	}

?>