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
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>分类目录
				</h3>
				<div class="col-box clearfix">
					<div class="col-left">
						<h4>新建分类目录</h4>
						<form action="" class="form" method="post">
							<div class="form-group">
						 		<label for="termName" class="control-label">名称：</label>
							 	<input type="email" class="form-control" id="termName" placeholder="分类名称">
							 	<p>这将是它在站点上显示的名字。</p>
						 	</div>
						 	<div class="form-group">
					 			<label for="termSulg" class="control-label">别名：</label>
							 	<input type="email" class="form-control" id="termSulg" placeholder="分类别名">
							 	<p>“别名”是在 URL 中使用的别称，它可以令 URL 更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
							</div>
							<div class="form-group">
						 		<label for="termGroup" class="control-label">父级：</label><br>
							 	<select name="termGroup" id="termGroup">
							 		<option value="0">无</option>
							 		<option value="1" selected>Git</option>
							 		<option value="2">历史</option>
							 	</select>
							 	<p>分类目录和标签不同，它可以有层级关系。您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</p>
							</div>
							<div class="form-group">
								<button class="btn btn-primary">新建分类目录</button> 	
							</div>
						</form>
					</div>
					<div class="col-right">
						<h4>分类目录管理</h4>
						<table class="table table-bordered table-hover">
							<thead>
								<tr class="active">
									<th>名称</th>
									<th>别名</th>
									<th>文章</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<strong>
											<a href="javascript:;" data-toggle="modal" data-target="#myModal">Git</a>
										</strong>
										<div class="row-actions">
											<a href="javascript:;" data-toggle="modal" data-target="#myModal">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="btn-recycle" href="javascript:;">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a href="#">查看</a>
										</div>	
									</td>
									<td>git</td>
									<td>10</td>
								</tr>
								<tr>
									<td>
										<strong>
											<a href="javascript:;" data-toggle="modal" data-target="#myModal">历史</a>
										</strong>
										<div class="row-actions">
											<a href="javascript:;" data-toggle="modal" data-target="#myModal">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a class="btn-recycle" href="javascript:;">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;
											<a href="#">查看</a>
										</div>	
									</td>
									<td>history</td>
									<td>100</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">更新分类目录</h4>
				</div>
				<div class="modal-body">
					<form action="" class="form" method="post">
						<div class="form-group">
							<label for="termName" class="control-label">名称：</label>
							<input type="email" class="form-control" id="termName" placeholder="分类名称">	
						</div>
						<div class="form-group">
							<label for="termSulg" class="control-label">别名：</label>
							<input type="email" class="form-control" id="termSulg" placeholder="分类别名">	
						</div>
						<div class="form-group">
							<label for="termGroup" class="control-label">父级：</label>
							<br>	
							<select name="termGroup" id="termGroup">
								<option value="0">无</option>
								<option value="1" selected>Git</option>
								<option value="2">历史</option>
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" class="btn btn-primary">保存更新</button>
				</div>
			</div>
		</div>
	</div>
	<?php $fed->allJs(); ?>
</body>
</html>