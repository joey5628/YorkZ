<?php include('common/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YorkZ</title>
	<?php $fed->allCss(); ?>
</head>
<body>
	<header class="header">
		<div class="inner">
			<div class="logo">
				<a href="/">
					<img src="../img/sun.jpg" alt="" class="logo-img">
					<h1 class="logo-name">YorkZ&nbsp;-</h1>
					<h1 class="logo-description">专注前端开发和用户体验</h1>
				</a>
			</div>
		</div>
	</header>
	<div class="container">
	
	</div>
	<footer class="footer">
		<div class="inner">
			<div class="footer-info">
				© 2015
				<a href="/" target="_blank">YorkZ</a>
			</div>
		</div>
	</footer>
	<!-- <div class="site-header">
		<div class="header-box">
			<img src="../img/sun.jpg" alt="" class="header-pic">
			<h1>
				<a href="/">YorkZ</a>
			</h1>
		</div>
	</div>
	<div class="container">
		container
	</div>
	<div class="site-footer">
		footer
	</div> -->
	<?php $fed->allJs(); ?>
</body>
</html>