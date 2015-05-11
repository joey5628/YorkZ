<?php include('common/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YorkZ</title>
	<?php $fed->addBaseCss(); ?>
</head>
<body>
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
				<!-- <a href="/">
					<img src="../img/sun.jpg" alt="" class="logo-img">
					<h1 class="logo-name">YorkZ&nbsp;-&nbsp;专注前端开发和用户体验</h1>
					<h3 class="author-job">前端工程师</h3>
					<div class="author-location">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						上海 - 松江
					</div>
				</a> -->
				<!-- <a href="/">
					<img src="../img/sun.jpg" alt="" class="logo-img">
				
					<h1 class="logo-name">YorkZ&nbsp;-</h1>
					<h1 class="logo-description">专注前端开发和用户体验</h1>
					<br>
					<h2 class="author-name">岸林风</h2><br>
					<h3 class="author-job">前端工程师</h3><br>
					<div class="author-location">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						上海 - 松江
					</div>
				</a> -->
				<!-- <div class="base-info">
					<a href="/">
						<h1 class="logo-name">YorkZ&nbsp;-</h1>
						<h1 class="logo-description">专注前端开发和用户体验</h1>
					</a>
					<h2 class="author-name">岸林风</h2>
					<h3 class="author-job">前端工程师</h3>
					<div class="author-location">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						上海 - 松江
					</div>
				</div> -->
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
			</section>
		</div>
		<aside class="sidebar">
			<!-- 打算移到头部
			<div class="profile">
				<div class="base-info">
					<img src="../img/sun.jpg" alt="" class="logo-img">
					<h2 class="author-name">岸林风</h2>
					<h3 class="author-job">前端工程师</h3>
					<div class="author-location">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						上海 - 松江
					</div>
				</div>
				<div class="article-info">
					
				</div>
				<div class="contact-info"></div>
			</div>
			 -->
			<!-- 推荐阅读 start -->
			<div class="widget">
				<h3 class="title">推荐阅读</h3>
				<ul class="side-nav">
					<li>
						<a href="">前端开发中合理选用图片格式</a>
						<span class="date">2015/03/19</span>
					</li>
					<li>
						<a href="">自动化构建（二）：基于Gulp的代码部署环境</a>
						<span class="date">2015/03/19</span>
					</li>
					<li>
						<a href="">自动化构建（一）：团队开发中更好的控制代码质量和风格</a>
						<span class="date">2015/03/19</span>
					</li>
				</ul>
			</div>
			<!-- 推荐月底 end -->

			<!-- 分类列表 start -->
			<div class="widget">
				<h3 class="title">分类目录</h3>
				<ul class="side-nav">
					<li>
						<a href="">
							前端开发
							<span class="count">(20)</span>
						</a>
						<ul class="sub-nav">
							<li>
								<a href="">
									CSS
									<span>(5)</span>
								</a>
							</li>
							<li>
								<a href="">
									JavaScript
									<span>(5)</span>
								</a>
							</li>
							<li>
								<a href="">
									Html
									<span>(5)</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="">
							移动端开发
							<span class="count">(20)</span>
						</a>
					</li>
					<li>
						<a href="">
							GIT
							<span class="count">(20)</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- 分类 end -->

			<!-- 归档 start -->
			<div class="widget">
				<h3 class="title">文章归档</h3>
				<ul class="side-nav">
					<li><a href="">2015年5月<span class="count">(0)</span></a></li>
					<li><a href="">2015年4月<span class="count">(19)</span></a></li>
					<li><a href="">2015年3月<span class="count">(88)</span></a></li>
					<li><a href="">2015年2月<span class="count">(8)</span></a></li>
					<li><a href="">2015年1月<span class="count">(5)</span></a></li>
					<li><a href="">2014年12月<span class="count">(1)</span></a></li>
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
	<?php $fed->addBaseJs(); ?>
</body>
</html>