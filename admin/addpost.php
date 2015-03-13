<?php include('common/config.php'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YorkZ index</title>
	<?php $fed->allCss(); ?>
	<?php $fed->addEditorCss(); ?>
</head>
<body>
	<div class="admin-panel">
		<?php include('_slidebar.php'); ?>
		<div class="main">
			<?php include('_topbar.php'); ?>
			<div class="post-wrap">
				<h3>
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>撰写文章
				</h3>
				<div class="post-box clearfix">
					<div class="post-content">
						<div class="form-group">
							<input type="text" id="title" class="form-control" placeholder="文章标题"/>
						</div>
						<div class="form-group">
							<script type="text/plain" id="myEditor" style="width: 100%; height:300px;">
							</script>
						</div>
					</div>
					<div class="post-right">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">发布</h3>
							</div>
							<div class="panel-body">
								<div>
									<button class="btn btn-default btn-sm" type="button">保存草稿</button>
									<button class="btn btn-default btn-sm" type="button">预览</button>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<?php $fed->allJs(); ?>
	<?php $fed->addEditorJs(); ?>

</body>
</html>