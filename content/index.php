<?php include('common/config.php'); ?>
<?php include('db/db.class.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YorkZ</title>
	<?php $fed->addBaseCss(); ?>
</head>
<body>
	<?php 
		// 参数
		$categories = '';
		$pageIndex = 1;
		$archives = '';		//归档

		if($_GET){
			if(isset($_GET['categories'])){
				$categories = $_GET['categories'];
			}
			if(isset($_GET['page'])){
				$pageIndex = intval($_GET['page']);
			}
			if(isset($_GET['archives'])){
				$archives = $_GET['archives'];
			}
		}

		$db = new Db();
		$terms = $db->getTerms();
		// print_r($terms);
		// 归档中取每月的文章数
		$months = $db->getCountByMonth();

		// 取推荐阅读
		$recommend = $db->getRecommedPosts();

		$pageSize = 5;
		$start = 0;
		$total = 0;
		$totalPage = 1;
		// 取文章总数
		$total = $db->getPostCount($categories);
		echo "total--" . $total ."<br>";
		// 分页计算
		$start = ($pageIndex - 1) * $pageSize;
		$totalPage = ceil($total / $pageSize);
		echo "totalPage--" . $totalPage ."<br>";
		// 取文章
		$posts = $db->getPosts($start, $pageSize, $categories);

	?>
	<header class="header">
		<div class="inner">
			<div class="base-info-outer">
				<div class="base-info">
					<a href="/">
						<img src="../img/sun.jpg" alt="" class="logo-img">
					</a>
					<div class="author-info">
						<h1 class="author logo-name">YorkZ&nbsp;-&nbsp;专注前端开发和用户体验</h1>
						<h3 class="author author-job">前端工程师</h3>
						<div class="author author-location">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							上海 - 松江
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="outer">
			<div class="inner navbar">
				<ul class="nav nav-pills">
					<li>
						<a href="/yorkz/content/index.php">首页<span>(<?php echo $terms['all']; ?>)</span></a>
					</li>
					<?php foreach ($terms as $term):?>
					<?php if( $term['group'] == '0'){ ?>
					<li>
						<a href="/yorkz/content/index.php?categories=<?php echo $term['id'];?>"><?php echo $term['name']; ?><span>(<?php echo $term['count']; ?>)</span></a>
					</li>
					<?php } ?>
					<?php endforeach; ?>
				</ul>
				<div class="search-box">
					<a id="linkSearch" href="javascript:;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
					<form id="searchForm" action="" class="search-form form-hidden">
						<input type="text" id="formText">
					</form>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="wrap">
			<section class="main">
				<?php foreach($posts as $post): ?>
				<article class="article">
					<header class="article-header">
						<h1>
							<a href="/yorkz/content/post.php?id=<?php echo $post['id'];?>" class="article-title"><?php echo $post['title'];?></a>
						</h1>
						<div class="article-meta">
							<div class="article-date">
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
								<a href="/yorkz/content/index.php?archives=<?php echo $post['time'];?>">
									<time datetime="<?php echo $post['create_date'];?>"><?php echo $post['time'];?></time>
								</a>
							</div>
							<div class="article-category">
								<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
								<a class="article-category-link" href="/yorkz/content/index.php?categories=<?php echo $post['term'];?>">
									<?php echo $post['term_name'];?>
								</a>
							</div>
						</div>
					</header>
					<div class="article-body" itemprop="articleBody">
						<?php echo $post['content'];?>
					</div>
					<footer class="article-footer">
						<a href="#" class="article-share-link">
							<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
							分享
						</a>
						<a href="#" class="article-comment-link">
							<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
							评论
						</a>
						<ul class="article-tag-link">
							<li>
								<a href="#">Javascript</a>
							</li>
							<li>
								<a href="#">Html</a>
							</li>
							<li>
								<a href="#">前端</a>
							</li>
						</ul>
					</footer>
				</article>
				<?php endforeach; ?>
					
				<?php if($totalPage > 1){ ?>
				<nav>
					<ul class="pager">
						<?php 
							$url = '/yorkz/content/index.php?';
							if($categories){
								$url .= 'categories=' . $categories .'&';
							}
							if($archives){
								$url .= 'archives=' . $archives .'&';
							}
							$style = '';
							$pageUrl = $url . 'page=' . $pageIndex - 1;
							if($pageIndex == 1){
								$style = 'class="disabled"';
								$pageUrl = 'javascript:;';
							}
						?>
						<li <?php echo $style;?>>
							<a href="<?php echo $pageUrl;?>" class="prev">Prev</a>
						</li>

						<?php 
							for ($i = 1; $i <= $totalPage; $i++) {
								if($i < 5 || $i == $totalPage){
									$style = '';
									$pageUrl = $url . 'page=' . $i;
									if($i == $pageIndex){
										$style = ' class="current"';
										$pageUrl = 'javascript:;';
									}
						?>
						<li <?php echo $style;?>>
							<a href="<?php echo $pageUrl;?>"><?php echo $i;?></a>
						</li>
						<?php   
								}else if($i == 5){
						?>	
						<li>
							<span>...</span>
						</li>
						<?php	
								}
							} 
						?>
						<?php 
							$style = '';
							$pageUrl = $url . 'page=' . ($pageIndex + 1); //pageIndex是从0开始的
							if($pageIndex == $totalPage){
								$style = ' class="disabled"';
								$pageUrl = 'javascript:;';
							}
						?>
						<li <?php echo $style;?>>
							<a href="<?php echo $pageUrl;?>" class="next">Next</a>
						</li>
					</ul>
				</nav>
				<?php } ?>
			</section>
		</div>
		<aside class="sidebar">
			<!-- 推荐阅读 start -->
			<div class="widget">
				<h3 class="title">推荐阅读</h3>
				<ul class="side-nav">
					<?php foreach($recommend as $row): ?>
					<li>
						<a href=""><?php echo $row['title'];?></a>
						<span class="date"><?php echo $row['time'];?></span>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<!-- 推荐月底 end -->

			<!-- 分类列表 start -->
			<div class="widget">
				<h3 class="title">分类目录</h3>
				<ul class="side-nav">
					<?php foreach($terms as $term):
						$hasChild = $term['hasChild']; 
						$id = $term['id'];
					?>
					<?php if( $term['group'] == '0'){ ?>
					<li>
						<a href="/yorkz/content/index.php?categories=<?php echo $id;?>">
							<?php echo $term['name'];?>
							<span class="count">(<?php echo $term['count'];?>)</span>
						</a>
						<?php if($hasChild == "1"){?>
							<ul class="sub-nav">
								<?php foreach($terms as $term): 
									$group = $term['group'];
									if($id == $group){
								?>
								<li>
									<a href="/yorkz/content/index.php?categories=<?php echo $term['id'];?>">
										<?php echo $term['name'];?>
										<span>(<?php echo $term['count'];?>)</span>
									</a>
								</li>
								<?php } endforeach; ?>
							</ul>
						<?php }?>
					</li>
					<?php } ?>	
					<?php endforeach; ?>
				</ul>
			</div>
			<!-- 分类 end -->

			<!-- 归档 start -->
			<div class="widget">
				<h3 class="title">文章归档</h3>
				<ul class="side-nav">
					<?php foreach ($months as $month): ?>
					<li>
						<a href="/yorkz/content/index.php?archives=<?php echo $month['year'] .'-'. $month['month'];?>">
							<?php echo $month['year']; ?>年<?php echo $month['month']; ?>月<span class="count">(<?php echo $month['count']; ?>)</span>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<!-- 归档 end -->

			<!-- 标签 start -->
			<div class="widget">
				<h3 class="title">标签云</h3>
				<div class="tagcloud">
      				<a href="/tags/AJAX/" style="font-size: 11.43px;">AJAX</a><a href="/tags/API/" style="font-size: 10px;">API</a><a href="/tags/BUG/" style="font-size: 10px;">BUG</a><a href="/tags/Blog/" style="font-size: 10px;">Blog</a><a href="/tags/Bug/" style="font-size: 10px;">Bug</a><a href="/tags/CSS3/" style="font-size: 13.57px;">CSS3</a><a href="/tags/CSS进阶/" style="font-size: 16.43px;">CSS进阶</a><a href="/tags/EDM/" style="font-size: 10px;">EDM</a><a href="/tags/Ghost/" style="font-size: 10px;">Ghost</a><a href="/tags/Github/" style="font-size: 10px;">Github</a><a href="/tags/Github-Pages/" style="font-size: 10px;">Github Pages</a><a href="/tags/H5/" style="font-size: 10px;">H5</a><a href="/tags/HTML/" style="font-size: 10px;">HTML</a><a href="/tags/HTML5/" style="font-size: 14.29px;">HTML5</a><a href="/tags/IE/" style="font-size: 10.71px;">IE</a><a href="/tags/IE10/" style="font-size: 10px;">IE10</a><a href="/tags/IE6/" style="font-size: 12.14px;">IE6</a><a href="/tags/IOS/" style="font-size: 10px;">IOS</a><a href="/tags/IT技术/" style="font-size: 10.71px;">IT技术</a><a href="/tags/JS/" style="font-size: 10.71px;">JS</a><a href="/tags/JSON/" style="font-size: 10px;">JSON</a><a href="/tags/JS优化/" style="font-size: 10px;">JS优化</a><a href="/tags/Javascript/" style="font-size: 19.29px;">Javascript</a><a href="/tags/Node-js/" style="font-size: 10px;">Node.js</a><a href="/tags/Octopress/" style="font-size: 10px;">Octopress</a><a href="/tags/OpenShift/" style="font-size: 10px;">OpenShift</a><a href="/tags/PHP/" style="font-size: 11.43px;">PHP</a><a href="/tags/Performance-API/" style="font-size: 10px;">Performance API</a><a href="/tags/SEO/" style="font-size: 10px;">SEO</a><a href="/tags/Zepto-js/" style="font-size: 10px;">Zepto.js</a><a href="/tags/arayzou/" style="font-size: 17.86px;">arayzou</a><a href="/tags/browserSync/" style="font-size: 10px;">browserSync</a><a href="/tags/bxSlider/" style="font-size: 10px;">bxSlider</a><a href="/tags/callback/" style="font-size: 10.71px;">callback</a><a href="/tags/canvas/" style="font-size: 10px;">canvas</a><a href="/tags/chrome/" style="font-size: 10.71px;">chrome</a><a href="/tags/cookie/" style="font-size: 10px;">cookie</a><a href="/tags/css/" style="font-size: 17.14px;">css</a><a href="/tags/fiddler/" style="font-size: 10px;">fiddler</a><a href="/tags/git/" style="font-size: 10px;">git</a><a href="/tags/godaddy/" style="font-size: 10px;">godaddy</a><a href="/tags/gulp/" style="font-size: 10px;">gulp</a><a href="/tags/jQuery/" style="font-size: 10px;">jQuery</a><a href="/tags/javascript/" style="font-size: 10px;">javascript</a><a href="/tags/jquery/" style="font-size: 18.57px;">jquery</a><a href="/tags/jquery插件/" style="font-size: 12.14px;">jquery插件</a><a href="/tags/jquery进阶/" style="font-size: 15px;">jquery进阶</a><a href="/tags/localstorage/" style="font-size: 10px;">localstorage</a><a href="/tags/nodejs/" style="font-size: 10px;">nodejs</a><a href="/tags/sublime-text/" style="font-size: 10.71px;">sublime text</a><a href="/tags/table/" style="font-size: 10px;">table</a><a href="/tags/textarea/" style="font-size: 10px;">textarea</a><a href="/tags/webkit/" style="font-size: 10px;">webkit</a><a href="/tags/wordpress/" style="font-size: 15px;">wordpress</a><a href="/tags/代码/" style="font-size: 10.71px;">代码</a><a href="/tags/兼容性/" style="font-size: 15.71px;">兼容性</a><a href="/tags/前端/" style="font-size: 20px;">前端</a><a href="/tags/前端测试/" style="font-size: 10px;">前端测试</a><a href="/tags/叉/" style="font-size: 10px;">叉</a><a href="/tags/建站/" style="font-size: 13.57px;">建站</a><a href="/tags/微信/" style="font-size: 10px;">微信</a><a href="/tags/性能优化/" style="font-size: 10.71px;">性能优化</a><a href="/tags/插件/" style="font-size: 13.57px;">插件</a><a href="/tags/搜索自动提示/" style="font-size: 10px;">搜索自动提示</a><a href="/tags/滚动/" style="font-size: 10px;">滚动</a><a href="/tags/移动端/" style="font-size: 12.86px;">移动端</a><a href="/tags/网站性能/" style="font-size: 10px;">网站性能</a><a href="/tags/美女时钟/" style="font-size: 10px;">美女时钟</a><a href="/tags/美女时钟API/" style="font-size: 10px;">美女时钟API</a><a href="/tags/美女时钟代码/" style="font-size: 10px;">美女时钟代码</a><a href="/tags/解决问题/" style="font-size: 10.71px;">解决问题</a><a href="/tags/转码/" style="font-size: 10px;">转码</a>
				</div>
			</div>
			<!-- 标签 end -->
		</aside>
	</div>
	<footer class="footer">
		<div class="inner">
			<div class="footer-info">
				© 2015
				<a href="/" target="_blank">YorkZ</a>
			</div>
		</div>
	</footer>

	<?php $fed->addBaseJs(); ?>
</body>
</html>