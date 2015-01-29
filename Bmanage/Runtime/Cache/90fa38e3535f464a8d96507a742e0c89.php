<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link href="__STATIC__/css/H-ui.css" rel="stylesheet" type="text/css" />
<link href="__STATIC__/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="__STATIC__/js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>书香社后台登录</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form action="<?php echo U('Public/check');?>" method="post">
      <div class="formRow user">
        <input id="" name="zd_name" type="text" placeholder="账户" class="input_text input-big">
      </div>
      <div class="formRow password">
        <input id="" name="zd_pass" type="password" placeholder="密码" class="input_text input-big">
      </div>
      <div class="formRow yzm">
        <input class="input_text input-big" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;" name="code" />
        <img src="<?php echo U('Public/checkcode');?>"> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      <div class="formRow">
        <label for="online">
          <input type="checkbox" name="online" id="online" value="">
          使我保持登录状态</label>
      </div>
      <div class="formRow">
        <input name="" type="submit" class="btn radius btn-success btn-big" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
        <input name="" type="reset" class="btn radius btn-default btn-big" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
      </div>
    </form>
  </div>
</div>
<div class="footer">书香社 V1.0</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/H-ui.js"></script>
</body>
</html>