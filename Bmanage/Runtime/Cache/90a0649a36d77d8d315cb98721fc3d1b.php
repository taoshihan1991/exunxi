<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
﻿<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link href="__STATIC__/css/H-ui.css" rel="stylesheet" type="text/css" />
<link href="__STATIC__/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="__STATIC__/font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<script type="text/javascript" src="__STATIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/js/H-ui.admin.js"></script>

<title>资讯列表</title>
</head>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 书架管理 <span class="c-gray en">&gt;</span> 书架列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>

  <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a class="btn btn-primary radius" href="<?php echo U('Bookcase/add');?>"><i class="icon-plus"></i> 添加书架</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
  <table class="table table-border table-bordered table-bg table-hover table-sort">
    <thead>
      <tr class="text-c">
        <th width="80">ID</th>
        <th width="100">书架名称</th>
        <th width="150">更新时间</th>
        <th width="70">操作</th>
      </tr>
    </thead>
    <tbody>
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
        <td><?php echo ($v["id"]); ?></td>
        <td><?php echo ($v["casename"]); ?></td>
        <td><?php echo (date("Y-m-d H:i:s",$v["updatetime"])); ?></td>
        <td class="f-14 artice-manage"><a style="text-decoration:none" class="ml-5" href="<?php echo U('Bookcase/update',array('id'=>$v['id']));?>" title="编辑"><i class="icon-edit"></i></a> &nbsp;&nbsp;<a style="text-decoration:none" class="ml-5" href="<?php echo U('Bookcase/del',array('id'=>$v['id']));?>" title="删除"><i class="icon-trash"></i></a></td>
      </tr><?php endforeach; endif; ?>
    </tbody>
  </table>
  <div id="pageNav" class="pageNav"><?php echo ($page); ?></div>
</div>
</body>
</html>