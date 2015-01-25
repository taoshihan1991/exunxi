<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link type="text/css" rel="stylesheet" href="__STATIC__/css/H-ui.css"/>
<link type="text/css" rel="stylesheet" href="__STATIC__/css/H-ui.admin.css"/>
<link type="text/css" rel="stylesheet" href="__STATIC__/font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="pd-20" style="padding-top:20px;">
  <p class="f-20 text-success">欢迎使用青果网 <span class="f-14">V1.0</span>后台管理系统！</p>

  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">服务器信息</th>
      </tr>
    </thead>
    <tbody>
      <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
        <th width="200"><?php echo ($k); ?></th>
        <td><span id="lbServerName"><?php echo ($v); ?></span></td>
      </tr><?php endforeach; endif; ?>
      
    </tbody>
  </table>
</div>
<footer>
    本后台系统由<a href="http://www.tshgrw.cn/" target="_blank" title="青果网">青果网</a>提供技术支持</p>
</footer>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
</body>
</html>