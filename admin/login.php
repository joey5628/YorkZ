<?php include('common/config.php');  ?>
<?php
	if($_POST){
		$login = $_POST['username'];
		$pwd = $_POST['password'];
		$data = 0;
		if($login && $pwd){
			try{
				$pwd = md5($pwd . LOGIN_TEXT);
				$db = getDBConnect();
				$sql = "select * from user where login='$login' and pass='$pwd'";
				$result = $db->query($sql);
				$info = $result->fetch(PDO::FETCH_ASSOC);

				if($info){
					$user = $login . '|' . $pwd;
					setcookie("user", $user, time()+3600);
					$data = 1;
					//header('location:index.php');
				}else{
					$data = 0;
				}
			}catch(PDOException $e){
				echo $e->getmessage();
			}
		}
		exit(json_encode($data));
	}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YorkZ</title>
	<?php $fed->allCss(); ?>
</head>
<body>
	<div class="page">
		<section class="content">
			<img src="../img/sun.jpg" alt="" class="header-pic img-thumbnail">
			<div class="login-form">
				<form action="javascript:doLogin();">
				<div class="alert alert-danger" role="alert">
					用户名不能为空！
				</div>
				<div class="form-group">
					<input type="text" id="username" class="form-control" placeholder="Username" data-toggle="tooltip" data-trigger="manual" title="用户名不能为空!" data-placement="top" data-animation="true">
				</div>
				<div class="form-group">
					<input type="password" id="password" class="form-control" placeholder="Password" data-toggle="tooltip" data-trigger="manual" title="密码不能为空!" data-placement="top" data-animation="true">
				</div>
				<div class="form-group form-inline">
					<div class="checkbox">
						<label>
							<input type="checkbox">
							Remember me
						</label>
					</div>
					<button id="loginBtn" class="btn btn-info" type="submit" data-loading-text="Loading...">Login</button>
				</div>
				</form>
			</div>
		</section>
	</div>

	<?php $fed->allJs(); ?>
</body>
</html>