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
		<div class="outer">
			<div class="inner navbar">
				<ul class="nav nav-pills">
					<li>
						<a href="">首页<span>(20)</span></a>
					</li>
					<li>
						<a href="">前端开发<span>(10)</span></a>
					</li>
					<li>
						<a href="">移动端开发<span>(8)</span></a>
					</li>
					<li>
						<a href="">GIT<span>(2)</span></a>
					</li>
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
				<?php for($i = 0; $i < 10; $i++): ?>
				<article class="article">
					<header class="article-header">
						<h1>
							<a href="#" class="article-title">overflow-scrolling属性让IOS设备的滚动更流畅</a>
						</h1>
						<div class="article-meta">
							<div class="article-date">
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
								<a href="#"><time datetime="2015-04-21T08:20:17.000Z" itemprop="datePublished">2015-04-21</time></a>
							</div>
							<div class="article-category">
								<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
								<a class="article-category-link" href="/categories/移动端开发/">移动端开发</a>
							</div>
						</div>
					</header>
					<div class="article-body" itemprop="articleBody">
			        	<p>IOS系统的惯性滑动效果非常赞，但是一般我们对div加overflow-y:auto;后是不会出这个效果的，滑动的时候会感觉很生涩。</p>
						<p>这时候如果想要我们自己的div有IOS独有的惯性滑动效果，可以有两个选择，一个就是用iscroll插件来模拟，不过现在有个更简单的方法，加个IOS独有的属性：</p>
						<!-- <pre>
							<code class="hljs css">
								<span class="hljs-rule"><span class="hljs-attribute">-webkit-overflow-scrolling</span>:<span class="hljs-value"> touch</span></span>;
							</code>
						</pre> -->
						<p>
							<a href="https://developer.mozilla.org/en-US/docs/Web/CSS/-webkit-overflow-scrolling" target="_blank" rel="external">https://developer.mozilla.org/en-US/docs/Web/CSS/-webkit-overflow-scrolling</a>
							 可以查到此属性的具体文档，属性可以直接对body加或者对需要滑动的div加都可以。
						</p>
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
							<!-- <li>
								<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
							</li> -->
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
				<?php endfor?>
				<!-- <nav class="pager">
					<a href="#" class="extend prev">Prev</a>
					<a href="#" class="page-number">1</a>
					<span class="page-number current">2</span>
					<a href="#" class="page-number">3</a>
					<a href="#" class="page-number">4</a>
					<span class="space">...</span>
					<a href="#" class="page-number">10</a>
					<a href="#" class="extend prev">Next</a>
				</nav> -->
				<nav>
					<ul class="pager">
						<li>
							<a href="#" class="prev">Prev</a>
						</li>
						<li>
							<a href="">1</a>
						</li>
						<li class="current">
							<a href="">2</a>
						</li>
						<li>
							<a href="">3</a>
						</li>
						<li>
							<a href="">4</a>
						</li>
						<li>
							<span>...</span>
						</li>
						<li>
							<a href="">30</a>
						</li>
						<li>
							<a href="" class="next">Next</a>
						</li>
					</ul>
				</nav>
			</section>
		</div>
		<aside class="sidebar">
			sidebar
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