<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8,ie=7">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($webkey); ?>">
<meta name="description" content="<?php echo ($webdesc); ?>">
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
		<div class="home-page">
			<!--热区-->
			<div class="hot">
				<div class="grid-box-left">
					<dl class="tbox"><h2 class="title"><a href="" target="_blank">最新推荐书目</a></h2>
						<dd class="light">
							<ul class="d2 ico2">
													
								<li>
									<span class="line-title"><a href="http://www.book110.com/4075.html" title="一份任性的私人书单" target="_blank">一份任性的私人书单</a></span>
									<span class="rightdate">01-22</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4337.html" title="2015年创业者必读的八本书" target="_blank">2015年创业者必读的八本书</a></span>
									<span class="rightdate">01-20</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4312.html" title="8位专家学者的2014年阅读书单" target="_blank">8位专家学者的2014年阅读书单</a></span>
									<span class="rightdate">01-19</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4271.html" title="2015开年文学好书推荐" target="_blank">2015开年文学好书推荐</a></span>
									<span class="rightdate">01-19</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4264.html" title="腾讯科技编辑2014年收获最大的书" target="_blank">腾讯科技编辑2014年收获最大的书</a></span>
									<span class="rightdate">01-18</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4259.html" title="教育管理者应读的十本书" target="_blank">教育管理者应读的十本书</a></span>
									<span class="rightdate">01-17</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4200.html" title="中国教育报2014年度教师喜爱的100本书" target="_blank">中国教育报2014年度教师喜爱的100本书</a></span>
									<span class="rightdate">01-16</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4136.html" title="6本书，6门创业必修课，你准备好了吗？" target="_blank">6本书，6门创业必修课，你准备好了吗？</a></span>
									<span class="rightdate">01-11</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4188.html" title="2014，温暖人心的十本文学好书" target="_blank">2014，温暖人心的十本文学好书</a></span>
									<span class="rightdate">01-11</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4117.html" title="2015清华大学新闻传播专业基础书目100种" target="_blank">2015清华大学新闻传播专业基础书目100种</a></span>
									<span class="rightdate">01-10</span>
								</li>					
														
								<li>
									<span class="line-title"><a href="http://www.book110.com/4201.html" title="2014年度教师推荐的十大童书" target="_blank">2014年度教师推荐的十大童书</a></span>
									<span class="rightdate">01-09</span>
								</li>					
														
							</ul>
						</dd>
					</dl>
				</div>
				<div class="grid-box-right">
					<span class="nr1"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书大好书大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好大好书大好书书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr1"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
					<span class="nr2"><a href=''>2014年度十大好书</a></span>
				</div>
				<div class="pic-box">
					<h2 class="title">
						<a href="" target="_blank">好书推荐</a>
					</h2>

							<div class="picMarquee-left">
								<div class="bd">
									<ul class="picList">
										<li>
											<div class="pic"><a href="" target="_blank"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/zuihao.jpg&h=135&w=117&zc=1" /></a></div>
											<div class="title"><a href="" target="_blank">生命是一次偶遇：《你的第一本哲学书》</a></div>
										</li>
										<li>
											<div class="pic"><a href="" target="_blank"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/zuihao.jpg&h=135&w=117&zc=1" /></a></div>
											<div class="title"><a href="" target="_blank">生命是一次偶遇：《你的第一本哲学书》</a></div>
										</li>
										<li>
											<div class="pic"><a href="" target="_blank"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/zuihao.jpg&h=135&w=117&zc=1" /></a></div>
											<div class="title"><a href="" target="_blank">生命是一次偶遇：《你的第一本哲学书》</a></div>
										</li>
										<li>
											<div class="pic"><a href="" target="_blank"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/zuihao.jpg&h=135&w=117&zc=1" /></a></div>
											<div class="title"><a href="" target="_blank">生命是一次偶遇：《你的第一本哲学书》</a></div>
										</li>
										<li>
											<div class="pic"><a href="" target="_blank"><img src="http://www.book110.com/wp/wp-content/uploads/2014/10/zhexueshu.jpg" /></a></div>
											<div class="title"><a href="" target="_blank">生命是一次偶遇：《你的第一本哲学书》</a></div>
										</li>
									</ul>
								</div>
							</div>

				<script type="text/javascript">
				jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:5,interTime:50});
				</script>

				</div>
				<div class="area-sub">


					<div class="slideTxtBox">
						<div class="hd">
							<ul><li>本周排行</li><li>本月排行</li><li class="last">总排行</li></ul>
						</div>
						<div class="bd">
							<ul class="list-tweet">
								<li class="eat-me">
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>
								<li>
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>
								<li>
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>
								<li>
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>

							</ul>
							<ul class="list-tweet">
								<li class="eat-me">
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>
								<li>
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>
								<li>
									<h3>
										<a href="http://www.book110.com/4354.html" title="凤凰网2014年度十大好书" target="_blank">
											凤凰网2014年度十大好书				</a>
									</h3>
									<a href="" target="_blank" class="thumb"><img src="http://www.book110.com/wp/wp-content/themes/book110/timthumb.php?src=http://www.book110.com/wp/cache/2285a3e4f53547a.jpg&amp;h=110&amp;w=90&amp;zc=1" alt="凤凰网2014年度十大好书"></a>
									<p>[好书推荐排行榜]年年花相似，年年花不同。至此，与2014有关的好书单，大概也要告一段落。三分闲情，两分雅绪，...</p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date">2015-01-21</span><a href="" target="_blank">去看看&gt;&gt;</a></span>
								</li>
							</ul>
							<ul>
								
							</ul>
						</div>
					</div>
					<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
				</div>
			</div>
			<!--//热区-->
			<!--好书导航-->
			<div class="daohang">
				<h2 class="title">好书导航</h2>
				<ul class="tags">
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">名人推荐的书籍</a></li>
					<li><a href="" class="btn-mini">更多>></a></li>
				</ul>
			</div>
			<!--//好书导航-->
			<!--资讯列表-->
			<div>
				<div class="item">
					<dl class="tbox">
						<h2 class="title"><a href="">好书推荐排行榜</a></h2>
						<dd class="light">
							<ul class="ico2">
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="item">
					<dl class="tbox">
						<h2 class="title"><a href="">好书推荐排行榜</a></h2>
						<dd class="light">
							<ul class="ico2">
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="item">
					<dl class="tbox">
						<h2 class="title"><a href="">好书推荐排行榜</a></h2>
						<dd class="light">
							<ul class="ico2">
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="item last">
					<dl class="tbox">
						<h2 class="title"><a href="">好书推荐排行榜</a></h2>
						<dd class="light">
							<ul class="ico2">
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜图书排行榜</a>
								</li>
								<li>
									<a href="">2014年度十本最佳TMT图书排行榜</a>
								</li>
							</ul>
						</dd>
					</dl>
				</div>
				
			</div>
			<!--//资讯列表-->
		</div>
	</div>
	<!--//主体-->
		<!--友情链接-->
	<div class="IndexLink">
		<div class="moketitle">友情链接<a href="" rel="nofollow">more>></a></div>
		<ul>
			<li><a href="">管理学书籍</a></li>
			<li><a href="">酷读论坛</a></li>
			<li><a href="">微时光</a></li>
			<li><a href="">敲敲门</a></li>
			<li><a href="">同行者</a></li>
		</ul>
	</div>
	<!--//友情链接-->
	<!--底部-->
	<div class="footer">
		<div class="footer-inner">
			<div class="copyright pull-left">Copyright © 2015 <a href="">易迅息</a> Powered by <a href="">tshgrw.cn</a></div>
			<div class="trackcode pull-right">
				<a href="">登录</a> |
				<a href="">关于易迅息</a> |
				<a href="">RSS订阅</a> |
			</div>
		</div>
	</div>
	<!--//底部-->
</body>
</html>