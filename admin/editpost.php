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
		</div>
	</div>
	<?php $fed->allJs(); ?>
</body>
</html>