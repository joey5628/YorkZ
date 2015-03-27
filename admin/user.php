<?php include('common/config.php'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YorkZ index</title>
	<?php $fed->allCss(); ?>
</head>
<body>
	<div class="admin-panel">
		<?php include('_slidebar.php'); ?>
		<div class="main">
			<?php include('_topbar.php'); ?>
			<div class="wrap">
				<h3>
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人资料
				</h3>

				<form class="form">
					<div class="form-group">
						<label for="loginName" class="control-label">登录名：</label>
						<input type="text" class="form-control" id="loginName" placeholder="登录名">
					</div>
					<div class="form-group">
						<label for="displayName" class="control-label">显示名：</label>
						<input type="text" class="form-control" id="displayName" placeholder="显示名">
					</div>
					<div class="form-group">
						<label for="email" class="control-label">邮箱：</label>
						<input type="text" class="form-control" id="email" placeholder="邮箱">
					</div>
					<div class="form-group">
						<label for="introduce" class="control-label">个人介绍：</label>
						<textarea id="introduce" class="form-control" rows="4" placeholder="个人介绍"></textarea>
					</div>

					<div class="form-group">
						<label for="oldPassword" class="control-label">修改密码：</label>
						<div class="pass-box">
							<input type="password" class="form-control" id="oldPassword" placeholder="旧密码">
							<input type="password" class="form-control" id="newPassword" placeholder="新密码">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">更新个人信息</button>
					</div>
				</form>

			</div>
		</div>
	</div>
	<?php $fed->allJs(); ?>
</body>
</html>