<?php include('common/config.php'); ?>
<?php include('db/selectTerm.php'); ?>
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
		$type = 'all';
		$result = null;
		$pageSize = 5;	//每页显示多少条数据
		$pageIndex = 1;		//当前页 从1开始
		$totalPage = 1;		//总页数
		$total = 0;			//总数据
		$start = 0;


		if($_GET){
			if(isset($_GET['type'])){
				$type = $_GET['type'];
			}
			if(isset($_GET['page'])){
				$pageIndex = intval($_GET['page']);
			}
		}

		$numObj = array(
			'all'=>0,
			'publish'=>0,
			'draft'=>0,
			'recycle'=>0
		);
		//获取各种类型文章数
		try{
			$db = getDBConnect();
			$sql = "select status, count(id) from posts group by status";
			$numResult = $db->query($sql);
			$allNum = 0;
			foreach ($numResult as $row) {
				$num = $row['count(id)'];
				if($type == $row['status']){
					$total = $num;
				}
				$numObj[$row['status']] = $num;
				$allNum += $num;
			}	
			$numObj['all'] = $allNum;
			if($type == 'all'){
				$total = $allNum;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}

		//分页计算
		$totalPage = ceil($total / $pageSize);
		$start = ($pageIndex - 1) * $pageSize;

		//获取数据
		try{
			$sql = "select p.*, t.term_name from posts p inner join term t on p.term=t.id where p.status!='recycle' order by p.id desc limit $start,$pageSize;";
			if($type != 'all'){	
				$sql = "select p.*, t.term_name from posts p inner join term t on p.term=t.id where p.status='$type' order by p.id desc limit $start,$pageSize;";
			}
			$db = getDBConnect();
			$result = $db->query($sql);
			
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
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>管理文章
				</h3>
				<ol class="breadcrumb">
					<?php 
						$tabObj = array(
							'all'=>array('', 'editpost.php?type=all', '全部', $numObj['all']),
							'publish'=>array('', 'editpost.php?type=publish', '已发布', $numObj['publish']),
							'draft'=>array('', 'editpost.php?type=draft', '草稿', $numObj['draft']),
							'recycle'=>array('', 'editpost.php?type=recycle', '回收站', $numObj['recycle'])
						);
						$tabObj[$type][0] = ' class="active"';
						foreach ($tabObj as $tab): ?>

						<li <?php echo $tab[0]; ?>><a href="<?php echo $tab[1]; ?>"><?php echo $tab[2]; ?><span class="badge"><?php echo $tab[3]; ?></span></a></li>
					<?php endforeach; ?>
				</ol>
				<div class="tablenav form-inline">
					<div class="form-group">
						<select name="postClass" id="postClass">
							<option value="0">查看所有分类目录</option>
							<?php
								$termResult = getTerms();
								foreach ($termResult as $row) {
									echo "<option value=". $row['id'] .">". $row['term_name'] ."</option>";
								}
							?>
						</select>
						<select name="postTime" id="postTime">
							<option value="201503">显示所有日期</option>
							<option value="201503">2015年三月</option>
							<option value="201502">2015年二月</option>
							<option value="201501">2015年一月</option>
							<option value="201412">2014年十二月</option>
						</select>
						<button id="postQuery" type="button" class="btn btn-primary btn-sm">应用</button>
					</div>
					<div class="form-group pull-right">
						<div class="input-group">
					     	<input type="text" class="form-control input-sm" placeholder="搜索">								      
					      	<span class="input-group-btn">
					      		<button class="btn btn-default btn-sm" type="button">搜索</button>
					      	</span>
				      	</div>
					</div>
				</div>
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr class="active">
							<th>标题</th>
							<th>是否公开</th>
							<th>分类目录</th>
							<th>标签</th>
							<th>评论数</th>
							<th>日期</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($result as $row):  ?>
						<tr data-id="<?php echo $row['id']; ?>">
							<td>
								<strong>
									<a href="#"><?php echo $row['title'] ?></a>
								</strong><?php if($row['status'] == 'draft'){ echo ' - 草稿';} ?>
								<div class="row-actions">
									<a href="#">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;
									<?php 
										if($row['status'] == 'publish'){
											if($row['display'] == 1){
												echo '<a href="javascript:;">设为私密</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
											}else{
												echo '<a href="javascript:;">设为公开</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
											}
										}
									?>
									<?php if($type != 'recycle'){ ?>
									<a class="btn-recycle" href="javascript:;">移至回收站</a>&nbsp;&nbsp;|&nbsp;&nbsp;
									<?php }else{ ?>
									<a class="btn-recycle" href="javascript:;">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;
									<?php } ?>
									<a href="#">预览</a>
								</div>
							</td>
							<td>
								<?php if($row['display']){
									echo "公开";
								}else{
									echo "私密";
								} ?>
							</td>
							<td>
								<?php echo $row['term_name'];?>
							</td>
							<td>
								<?php echo $row['tag'];?>
							</td>
							<td>
								<span class="badge"><?php echo $row['comment_count']; ?></span>
							</td>
							<td>
								<?php echo $row['modified'];?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php if($totalPage > 1){ ?>
				<nav class="page-nav">
					<ul class="pagination">
						<?php 
							if($totalPage > 1){
								$style = '';
								$pageUrl = 'editpost.php?type=' . $type . '&page=' . $pageIndex - 1; //pageIndex是从0开始的
								if($pageIndex == 1){
									$style = ' class="disabled"';
									$pageUrl = 'javascript:;';
								}
						?>
						<li <?php echo $style;?>>
							<a href="<?php echo $pageUrl;?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<?php } ?>
	
        				<?php 
        					for($i = 1; $i <= $totalPage; $i++){
        						$style = '';
        						$pageUrl = 'editpost.php?type=' . $type . '&page=' . $i;
        						if($i == $pageIndex){
        							$style = ' class="active"';
        							$pageUrl = 'javascript:;';
        						}
        				?> 
    					<li <?php echo $style;?>>
    						<a href="<?php echo $pageUrl;?>"><?php echo $i;?></a>
    					</li>
        				<?php } ?>

						<?php 
							if($totalPage > 1){
								$style = '';
								$pageUrl = 'editpost.php?type=' . $type . '&page=' . ($pageIndex + 1); //pageIndex是从0开始的
								if($pageIndex == $totalPage){
									$style = ' class="disabled"';
									$pageUrl = 'javascript:;';
								}
						?>
						<li <?php echo $style;?>>
							<a href="<?php echo $pageUrl;?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
						<?php } ?>
					</ul>
				</nav>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php $fed->allJs(); ?>
</body>
</html>