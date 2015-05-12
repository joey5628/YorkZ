<?php include('common/config.php'); ?>
<?php include('db/selectTerm.php'); ?>
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
	<?php 
		$id = 0;
		$info = '';
		if($_GET && $_GET['postId']){
			$id = $_GET['postId'];
			try{	
				$db = getDBConnect();
				$sql = "select * from posts where id=$id";
				$result = $db->query($sql);
				$info = $result->fetch(PDO::FETCH_ASSOC);

			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	?>
	<div class="admin-panel">
		<?php include('_slidebar.php'); ?>
		<div class="main">
			<?php include('_topbar.php'); ?>
			<div class="wrap">
				<h3>
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>撰写文章
				</h3>
				<div class="post-box clearfix">
					<div class="post-content">
						<input type="hidden" id="postId" value="<?php echo $id;?>">
						<div class="form-group">
							<input type="text" id="title" class="form-control" placeholder="文章标题" value="<?php echo $info == '' ? '' : $info['title'] ;?>" />
						</div>
						<div class="form-group">
							<script type="text/plain" id="myEditor" style="width: 100%; height:300px;">
							<?php echo $info == '' ? '' : $info['content']; ?>
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
										<label for="displayStatus">公开状态：</label>
										<select id="displayStatus">
											<option value="1" <?php echo $info != '' && $info['display'] == 1 ? 'selected' : ''?>>公开</option>
											<option value="0" <?php echo $info != '' && $info['display'] == 0 ? 'selected' : ''?>>私密</option>
										</select>
									</div>
									<div class="form-group">
										<label for="postTerm">分类目录：</label>
										<select id="postTerm">
											<?php
												$result = getTerms();
												$curTerm = $info == '' ? '' : $info['term'];
												foreach ($result as $row) {
													if($curTerm == $row['id']){
														echo "<option value=". $row['id'] ." selected>". $row['term_name'] ."</option>";
													}else{
														echo "<option value=". $row['id'] .">". $row['term_name'] ."</option>";
													}
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="postTerm">推荐阅读：</label>
										<label class="radio-inline">
										 	<input type="radio" name="recommend" id="recommend0" value="0" <?php echo $info != '' && $info['recommend'] == 0 ? 'checked="checked"' : ''?>>不推荐
										</label>
									 	<label class="radio-inline">
										 	<input type="radio" name="recommend" id="recommend1" value="1" <?php echo $info != '' && $info['recommend'] == 1 ? 'checked="checked"' : ''?>>推荐
										</label>
									</div>
									<div class="form-group">
										<label for="postTag">添加标签：</label>
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
										<button id="publishBtn" type="button" class="btn btn-primary">发布</button>
										<button id="recycleBtn" type="button" class="btn btn-link btn-sm pull-right btn-recycle">移至回收站</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<!-- 
	<div id="alertModal" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="alert alert-info" role="alert">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p>成功！</p>
			</div>
		</div>
	</div> -->

	<?php $fed->allJs(); ?>
	<?php $fed->addEditorJs(); ?>
</body>
</html>