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
					<dl class="tbox"><h2 class="title"><a href="" target="_blank">最新整理书架</a></h2>
						<dd class="light">
							<ul class="d2 ico2">
								<?php if(is_array($bookcase_new)): foreach($bookcase_new as $key=>$v): ?><li>
									<span class="line-title"><a href="<?php echo U('List/bookcase',array('caseid'=>$v['id']));?>" title="<?php echo ($v["casename"]); ?>"><?php echo ($v["casename"]); ?></a></span>
									<span class="rightdate"><?php echo (date("m-d",$v["updatetime"])); ?></span>
								</li><?php endforeach; endif; ?>					
											
							</ul>
						</dd>
					</dl>
				</div>
				<div class="grid-box-right">
					<span class="nr1"><a href="<?php echo U('View/index',array('id'=>$zdlist[0]['id']));?>"><?php echo ($zdlist[0]['title']); ?></a></span>
					<?php if(is_array($newlist)): foreach($newlist as $key=>$v): ?><span class="nr2"><a href='<?php echo U('View/index',array('id'=>$v['id']));?>'><?php echo ($v["title"]); ?></a></span><?php endforeach; endif; ?>
					
					<span class="nr1"><a href="<?php echo U('View/index',array('id'=>$zdlist[1]['id']));?>"><?php echo ($zdlist[1]['title']); ?></a></span>
					<?php if(is_array($newlist2)): foreach($newlist2 as $key=>$v): ?><span class="nr2"><a href='<?php echo U('View/index',array('id'=>$v['id']));?>'><?php echo ($v["title"]); ?></a></span><?php endforeach; endif; ?>
					
				</div>
				<div class="pic-box">
					<h2 class="title">
						<a href="" target="_blank">好书推荐</a>
					</h2>

							<div class="picMarquee-left">
								<div class="bd">
									<ul class="picList">
										<?php if(is_array($reclist)): foreach($reclist as $key=>$v): ?><li>
											<div class="pic"><a href="" target="_blank"><img src="<?php echo checkPic($v['pic1'],'small');?>"/></a></div>
											<div class="title"><a href="" target="_blank"><?php echo ($v["title"]); ?></a></div>
										</li><?php endforeach; endif; ?>
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
								<?php $i=0;?>
								<?php if(is_array($week_list)): foreach($week_list as $key=>$v): ?><li <?php if($i==0){?>class='eat-me'<?php }?>>
								<?php $i++;?>
									<h3>
										<a href="<?php echo U('View/index',array('id'=>$v['id']));?>" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a>
									</h3>
									<a href="<?php echo U('View/index',array('id'=>$v['id']));?>" target="_blank" class="thumb"><img src="<?php echo checkPic($v['pic1'],'small');?>" alt="<?php echo ($v["title"]); ?>"></a>
									<p><?php echo ($v["content"]); ?></p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date"><?php echo (date("Y-m-d",$v["time"])); ?></span><a href="<?php echo U('View/index',array('id'=>$v['id']));?>" target="_blank">去看看&gt;&gt;</a></span>
								</li><?php endforeach; endif; ?>
								

							</ul>
							<ul class="list-tweet">
								<?php $i=0;?>
								<?php if(is_array($month_list)): foreach($month_list as $key=>$v): ?><li <?php if($i==0){?>class='eat-me'<?php }?>>
								<?php $i++;?>
									<h3>
										<a href="<?php echo U('View/index',array('id'=>$v['id']));?>" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a>
									</h3>
									<a href="<?php echo U('View/index',array('id'=>$v['id']));?>" target="_blank" class="thumb"><img src="<?php echo checkPic($v['pic1'],'small');?>" alt="<?php echo ($v["title"]); ?>"></a>
									<p><?php echo ($v["content"]); ?></p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date"><?php echo (date("Y-m-d",$v["time"])); ?></span><a href="<?php echo U('View/index',array('id'=>$v['id']));?>" target="_blank">去看看&gt;&gt;</a></span>
								</li><?php endforeach; endif; ?>
							</ul>
							<ul class="list-tweet">
								<?php $i=0;?>
								<?php if(is_array($all_list)): foreach($all_list as $key=>$v): ?><li <?php if($i==0){?>class='eat-me'<?php }?>>
								<?php $i++;?>
									<h3>
										<a href="<?php echo U('View/index',array('id'=>$v['id']));?>" title="<?php echo ($v["title"]); ?>" target="_blank"><?php echo ($v["title"]); ?></a>
									</h3>
									<a href="<?php echo U('View/index',array('id'=>$v['id']));?>" target="_blank" class="thumb"><img src="<?php echo checkPic($v['pic1'],'small');?>" alt="<?php echo ($v["title"]); ?>"></a>
									<p><?php echo ($v["content"]); ?></p>
									<span class="tweet-detail-func cBlue">
            <span class="tweet-detail-date"><?php echo (date("Y-m-d",$v["time"])); ?></span><a href="<?php echo U('View/index',array('id'=>$v['id']));?>" target="_blank">去看看&gt;&gt;</a></span>
								</li><?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
					<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
				</div>
			</div>
			<!--//热区-->
			<!--好书导航-->
			<div class="daohang">
				<h2 class="title">书架导航</h2>
				<ul class="tags">
					<?php if(is_array($bookcase)): foreach($bookcase as $key=>$v): ?><li><a href="<?php echo U('List/bookcase',array('caseid'=>$v['id']));?>" class="btn-mini"><?php echo ($v["casename"]); ?></a></li><?php endforeach; endif; ?>
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