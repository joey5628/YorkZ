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
								<h3 class="panel-title">发布设置</h3>
							</div>
							<div class="panel-body">
								<form>
									<div class="form-group">
										<button id="saveBtn" class="btn btn-default btn-sm" type="button">保存草稿</button>
										<button id="previewBtn" class="btn btn-default btn-sm pull-right" type="button">预览</button>
									</div>
									<div class="form-group">
										<label for="openStatus">公开状态：</label>
										<select id="openStatus">
											<option value="publish">公开</option>
											<option value="private">私密</option>
										</select>
									</div>
									<div class="form-group">
										<label for="postClass">分类目录：</label>
										<select id="postClass">
											<option value="0">未分类</option>
											<option value="1">Git</option>
											<option value="2">JavaScript</option>
											<option value="3">Css</option>
											<option value="4">Html</option>
										</select>
									</div>
									<div class="form-group">
										<label for="postClass">添加标签：</label>
										<div class="input-group">
									     	<input type="text" class="form-control input-sm" placeholder="添加标签">								      
									      	<span class="input-group-btn">
									      		<button class="btn btn-default btn-sm" type="button">添加</button>
									      	</span>
								      	</div>
								      	<div class="tag-list">
											<span class="tag-item">
												<button type="button" class="close">&times;</button>
												地图
											</span>								      		
								      	</div>
									</div>
									<div class="submit-group form-group">
										<button id="publishBtn" type="submit" class="btn btn-primary">发布</button>
										<button id="deletionBtn" type="button" class="btn btn-link btn-sm pull-right">移至回收站</button>
									</div>
								</form>
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