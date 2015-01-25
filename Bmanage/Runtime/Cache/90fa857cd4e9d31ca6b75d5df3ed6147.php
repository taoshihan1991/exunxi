<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>分类管理</title>
</head>
<body>
<nav class="Hui-breadcrumb"><i class="icon-home"></i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 分类管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20 text-c">
  <form class="Huiform" id="addClass" action="<?php echo U('Xwclass/addClass');?>" method="post">
    上级栏目：
    <select class="select" id="sel_Sub" name="topid" onchange="SetSubID(this);">

      <option value="0">顶级分类</option>
      <?php if(is_array($xwClass)): foreach($xwClass as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo str_repeat('&nbsp;&nbsp;├&nbsp;', $v['lev']); echo ($v["classname"]); ?></option><?php endforeach; endif; ?>
     
    </select>
    <input name="classname" class="input-text" style="width:250px" type="text" value="" placeholder="输入分类" id="artice-class-val"><button type="button" class="btn btn-success" id=""  onClick="addClass.submit();"><i class="icon-plus"></i> 添加</button>
  </form>
  <div class="artice-class-list cl mt-20">
    <table class="table table-border table-bordered table-hover table-bg">
      <thead>
        <tr class="text-c">
          <th width="25"><input type="checkbox" name="" value=""></th>
          <th width="80">ID</th>
          <th width="80">排序</th>
          <th>分类名称</th>
          <th width="70">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($xwClass)): foreach($xwClass as $key=>$v): ?><tr class="text-c">
          <td><input type="checkbox" name="" value=""></td>
          <td><?php echo ($v["id"]); ?></td>
          <td><?php echo ($v["xh"]); ?></td>
          <td class="text-l"><?php echo str_repeat('&nbsp;&nbsp;├&nbsp;', $v['lev']); echo ($v["classname"]); ?></td>
          <td class="f-14"><a title="编辑" href="javascript:;" onclick="artice_class_edit('1','620','400','分类编辑','<?php echo U('Xwclass/update',array('id'=>$v['id']));?>')" style="text-decoration:none"><i class="icon-edit"></i></a> <a title="删除" href="<?php echo U('Xwclass/del',array('id'=>$v['id']));?>" class="ml-5" style="text-decoration:none"><i class="icon-trash"></i></a></td>
        </tr><?php endforeach; endif; ?>
        
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/layer/layer.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/H-ui.js"></script> 
<script type="text/javascript" src="__STATIC__/js/H-ui.admin.js"></script>
</body>
</html>