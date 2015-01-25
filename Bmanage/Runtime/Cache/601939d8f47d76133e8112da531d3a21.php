<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>跳转页面</title>
	<style type="text/css">
	#box{
		width: 500px;
		height: 170px;
		margin: 0 auto;
		border:1px solid #4fb4de;
		margin-top: 130px;
		font-family: "Microsoft Yahei";
		text-align: center;
	}
	#box .box_out{
		border:1px solid #f0ffff;		
	}
	#box .title{
		text-align: center;
		height: 30px;
		background:#4fb4de;
		color: #fff;
		line-height: 30px;
	}
	#box .content{
		text-align: center;
		margin-top:40px;
		font-size: 20px;
		color: #333;
	}
	#box .content .right{
		color: green;
		font-size: 25px;
		font-weight: bold;
		padding-right:5px;
	}
	#box .content .error{
		color:red;
		font-size: 25px;
		font-weight: bold;
		padding-right: 5px;
	}
	#box .jump{
		margin-top: 30px;

	}
	#box .jump a{
		color: #182c37;
		font-size: 14px;
	}
	</style>
</head>
<body>
<div id="box">
	<div class="box_out">
		<div class="title">信息提示</div>
		<div class="content">
			<?php if($message){?>
			<span class="right">:)</span>
			<?php }?>
			<?php if($error){?>
			<span class="error">:(</span>
			<?php }?>
			<?php echo($message); ?>
			<?php echo($error); ?>

		</div>
		<div  class="jump"><a id="href" href="<?php echo($jumpUrl); ?>">偶不想等待(～﹃～)~zZ，点击立即跳转，自动跳转还剩<b id="wait">7</b>秒</a></div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>