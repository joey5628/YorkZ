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
	<?php 
		//获取类别
		try{
			$db = getDBConnect();
			$sql = "select t.*, count(p.id) from term t left join posts p on t.id=p.term group by t.id order by t.id desc;";

			$rs = $db->query($sql);
			$rs->setFetchMode(PDO::FETCH_ASSOC);
			$result = $rs->fetchAll();

		}catch(PDOException $e){
			echo $e->getMessage();
		}

	?>
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
						<div class="form-group">
					 		<label for="termName" class="control-label">名称：</label>
						 	<input type="email" class="form-control" id="termName" placeholder="分类名称">
						 	<p>这将是它在站点上显示的名字。</p>
					 	</div>
					 	<div class="form-group">
				 			<label for="termSlug" class="control-label">别名：</label>
						 	<input type="email" class="form-control" id="termSlug" placeholder="分类别名">
						 	<p>“别名”是在 URL 中使用的别称，它可以令 URL 更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
						</div>
					 	<div class="form-group">
				 			<label for="termDisplay" class="control-label">公开：</label>
						 	<label class="radio-inline">
							 	<input type="radio" name="termDisplay" id="termDisplay1" value="1" checked="checked">设为公开
							</label>
						 	<label class="radio-inline">
							 	<input type="radio" name="termDisplay" id="termDisplay2" value="0">设为私密
							</label>
						</div>
						<div class="form-group">
					 		<label for="termGroup" class="control-label">父级：</label><br>
						 	<select name="termGroup" id="termGroup">
						 		<option value="0" selected>无</option>
						 		<?php foreach ($result as $val): ?>
						 		<option value="<?php echo $val['id']; ?>"><?php echo $val['term_name']; ?></option>
								<?php endforeach; ?>
						 	</select>
						 	<p>分类目录和标签不同，它可以有层级关系。您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</p>
						</div>
						<div class="form-group">
							<button id="addTermBtn" class="btn btn-primary">新建分类目录</button> 	
						</div>
					</div>
					<div class="col-right">
						<h4>分类目录管理</h4>
						<table class="table table-bordered table-hover table-condensed">
							<thead>
								<tr class="active">
									<th>名称</th>
									<th>别名</th>
									<th>是否公开</th>
									<th>文章</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row): ?>
									<tr data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['term_name']; ?>" 
									data-slug="<?php echo $row['slug']; ?>" data-display="<?php echo $row['display']; ?>"
									data-group="<?php echo $row['term_group']; ?>" data-count="<?php echo $row['count(p.id)']; ?>">
										<td>
											<strong>
												<a href="#"><?php echo $row['term_name']; ?></a>
											</strong>
											<div class="row-actions">
												<?php if($row['id'] != 1){ ?>
												<a href="javascript:;" data-toggle="modal" data-target="#myModal">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;
												<a class="btn-recycle" href="javascript:;">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;
												<?php } ?>
												<a href="#">查看</a>
											</div>	
										</td>
										<td><?php echo $row['slug']; ?></td>
										<td data-column="display">
											<?php if($row['display']){
												echo "公开";
											}else{
												echo "私密";
											} ?>
										</td>
										<td><?php echo $row['count(p.id)']; ?></td>
									</tr>
								<?php endforeach; ?>
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
					<h4 class="modal-title" id="myModalLabel">修改分类目录</h4>
				</div>
				<div class="modal-body">
					<input id="utermId" type="hidden">
					<input id="upostNum" type="hidden">
					<div class="form-group">
						<label for="utermName" class="control-label">名称：</label>
						<input type="email" class="form-control" id="utermName" placeholder="分类名称">	
					</div>
					<div class="form-group">
						<label for="utermSlug" class="control-label">别名：</label>
						<input type="email" class="form-control" id="utermSlug" placeholder="分类别名">	
					</div>
				 	<div class="form-group">
			 			<label for="utermDisplay" class="control-label">公开：</label>
					 	<label class="radio-inline">
						 	<input type="radio" name="utermDisplay" id="utermDisplay1" value="1" checked="true">设为公开
						</label>
					 	<label class="radio-inline">
						 	<input type="radio" name="utermDisplay" id="utermDisplay2" value="0">设为私密
						</label>
					</div>
					<div class="form-group">
						<label for="utermGroup" class="control-label">父级：</label>
						<br>	
						<select name="utermGroup" id="utermGroup">
							<option value="0">无</option>
					 		<?php foreach ($result as $val): ?>
					 		<option value="<?php echo $val['id']; ?>"><?php echo $val['term_name']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
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