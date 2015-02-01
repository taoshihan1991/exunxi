<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8,ie=7">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php echo ($field["title"]); ?>-<?php if(is_array($road)): foreach($road as $key=>$v): echo ($v["classname"]); ?>-<?php endforeach; endif; echo ($webtitle); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel='stylesheet' href='__STATIC__/css/style.css' type='text/css' media='all' />
<script type="text/javascript" src="__STATIC__/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="__STATIC__/js/js.js"></script>
</head>
<body>
	<!--头部-->
		<div class="new-header">
		<div class="head-box">
			<h1 class="logo"><a href="__ROOT__">书香社</a></h1>
			<ul class="nav">
				<?php if(is_array($nav)): foreach($nav as $key=>$v): ?><li>
					<a href="<?php echo U('List/index',array('cid'=>$v['id']));?>"><?php echo ($v["classname"]); ?></a>
				</li><?php endforeach; endif; ?>
				
			</ul>
			<div class="menu pull-right">
				<form method="get" class="dropdown search-form" action="">
					<input class="search-submit btn btn-success" type="submit" value="搜索">
					<input class="search-input" name="s" type="text" placeholder=" 输入你要搜索的内容" autofocus="" x-webkit-speech="">
			
				</form>
			</div>
		</div>
	</div>

	<!--//头部-->
	<!--主体-->
	<div class="container">
		<div class="content-wrap">
			<div class="content">
				<div class="article-header">
					<h1 class="article-title"><?php echo ($field["title"]); ?></h1>
					<div class="meta">
						<span class="muted"><i class="ico icon-time icon12"></i> <?php echo (date("Y-m-d",$field["time"])); ?></span>
						<span class="muted">
						<a href="http://www.book110.com/4138.html#comments">0评</a>/<?php echo ($field["hits"]); ?>阅</span>
					</div>
				</div>
				<div class="article-content">
					<p><img class="aligncenter size-full wp-image-4141" src="__ROOT__<?php echo ($field["pic1"]); ?>" alt="<?php echo ($field["title"]); ?>"></p>
					<?php echo ($field["content"]); ?>
					<p>转载请注明：<a href="__ROOT__">书香社</a> » <a href=""><?php echo ($field["title"]); ?></a></p>
				
					<div class="article-nav">
						<span class="article-nav-prev">上一篇 <a href="<?php echo U('View/index',array('id'=>$pre['id']));?>" rel="prev"><?php echo ($pre["title"]); ?></a></span>
						<span class="article-nav-next"><a href="<?php echo U('View/index',array('id'=>$next['id']));?>" rel="next"><?php echo ($next["title"]); ?></a> 下一篇</span>
					</div>
				</div>
				
				
			</div>
		</div>
		<div class="sidebar">
			<div class="widget widget_categories">
				<h3 class="widget_tit">书籍分类</h3>
				<ul>
					<li><a href="">书目推荐</a></li>
					<li><a href="">书目推荐</a></li>
					<li><a href="">书目推荐</a></li>
					<li><a href="">书目推荐</a></li>
				</ul>
			</div>

			<div class="widget widget_text">
				<h3 class="widget_tit">今日热门书单</h3>			
				<div class="textwidget"><iframe width="100%" height="305" frameborder="0" scrolling="no" src="http://app.wumii.com/ext/widget/hot?prefix=http%3A%2F%2Fwww.book110.com%2F&amp;num=12&amp;t=1"></iframe>
			</div>
			<div class="d_tag guide">
				<h3 class="widget_tit"><a class="btn btn-primary" href="/tags">更多</a>好书导航</h3>
				<div class="d_tags"><a href="http://www.book110.com/tag/%e5%90%8d%e4%ba%ba%e6%8e%a8%e8%8d%90%e7%9a%84%e4%b9%a6%e7%b1%8d">名人推荐的书籍 (48)</a><a href="http://www.book110.com/tag/%e7%95%85%e9%94%80%e4%b9%a6%e6%8e%92%e8%a1%8c%e6%a6%9c">畅销书排行榜 (41)</a><a href="http://www.book110.com/tag/2014%e5%b9%b4%e5%ba%a6%e5%a5%bd%e4%b9%a6">2014年度好书 (36)</a><a href="http://www.book110.com/tag/2014%e5%b9%b4%e5%ba%a6%e5%8d%81%e5%a4%a7%e5%a5%bd%e4%b9%a6">2014年度十大好书 (32)</a><a href="http://www.book110.com/tag/2013%e5%b9%b4%e5%ba%a6%e5%8d%81%e5%a4%a7%e5%a5%bd%e4%b9%a6">2013年度十大好书 (31)</a><a href="http://www.book110.com/tag/%e6%8e%a8%e8%8d%90%e5%87%a0%e6%9c%ac%e5%a5%bd%e4%b9%a6">推荐几本好书 (26)</a><a href="http://www.book110.com/tag/2013%e5%b9%b4%e5%ba%a6%e5%a5%bd%e4%b9%a6">2013年度好书 (23)</a><a href="http://www.book110.com/tag/%e5%a5%bd%e4%b9%a6%e6%8e%a8%e8%8d%90%e6%8e%92%e8%a1%8c%e6%a6%9c">好书推荐排行榜 (23)</a><a href="http://www.book110.com/tag/%e5%9b%be%e4%b9%a6%e6%8e%92%e8%a1%8c%e6%a6%9c">图书排行榜 (23)</a><a href="http://www.book110.com/tag/%e5%b9%b4%e5%ba%a6%e5%8d%81%e5%a4%a7%e5%a5%bd%e4%b9%a6">年度十大好书 (20)</a><a href="http://www.book110.com/tag/%e5%a4%96%e5%9b%bd%e6%96%87%e5%ad%a6">外国文学 (17)</a><a href="http://www.book110.com/tag/%e8%af%bb%e4%b9%a6%e6%96%b9%e6%b3%95">读书方法 (16)</a><a href="http://www.book110.com/tag/%e4%ba%9a%e9%a9%ac%e9%80%8a">亚马逊 (15)</a><a href="http://www.book110.com/tag/%e5%bc%80%e5%8d%b7%e7%95%85%e9%94%80%e4%b9%a6">开卷畅销书 (15)</a><a href="http://www.book110.com/tag/%e5%a5%bd%e4%b9%a6%e6%a6%9c">好书榜 (14)</a><a href="http://www.book110.com/tag/%e9%98%85%e8%af%bb">阅读 (14)</a><a href="http://www.book110.com/tag/%e6%96%b0%e6%b5%aa%e5%a5%bd%e4%b9%a6%e6%a6%9c">新浪好书榜 (13)</a><a href="http://www.book110.com/tag/%e5%80%bc%e5%be%97%e4%b8%80%e7%9c%8b%e7%9a%84%e5%a5%bd%e4%b9%a6">值得一看的好书 (12)</a><a href="http://www.book110.com/tag/%e5%9b%be%e4%b9%a6%e9%94%80%e5%94%ae%e6%8e%92%e8%a1%8c%e6%a6%9c">图书销售排行榜 (12)</a><a href="http://www.book110.com/tag/%e5%87%a4%e5%87%b0%e5%a5%bd%e4%b9%a6%e6%a6%9c">凤凰好书榜 (12)</a></div></div>
		</div>
		</div>
	</div>
	<!--//主体-->
		<!--友情链接-->
	<div class="IndexLink">
		<div class="moketitle">友情链接<a href="" rel="nofollow">more>></a></div>
		<ul>
		<?php if(is_array($link)): foreach($link as $key=>$v): ?><li><a href="<?php echo ($v["link"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>
	<!--//友情链接-->
	<!--底部-->
	<div class="footer">
		<div class="footer-inner">
			<div class="copyright pull-left">Copyright © 2015 <a href="">书香社</a> Powered by <a href="">tshgrw.cn</a></div>
			<div class="trackcode pull-right">
				<a href="">登录</a> |
				<a href="">关于书香社</a> |
				<a href="">RSS订阅</a> |
			</div>
		</div>
	</div>

	<!--//底部-->
</body>
</html>