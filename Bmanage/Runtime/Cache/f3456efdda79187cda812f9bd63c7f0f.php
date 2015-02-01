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

<title></title>
</head>
<body>
<div class="pd-20">
  <form class="Huiform" id="loginform" action="<?php echo U('Xw/add');?>" method="post">
    <table class="table table-border table-bordered table-bg">
      <thead>
        <tr>
          <th colspan="2">添加文章</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="text-r" width="30%">标题：</th>
          <td><input name="title" id="title" class="input-text" type="text" autocomplete="off" placeholder="" tabindex="3" datatype="*" nullmsg="请输入标题！" errormsg="请输入标题！"> 
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">外链：</th>
          <td><input name="link" id="link" class="input-text" type="text" autocomplete="off" > 
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">属性：</th>
          <td>
          <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><input name="attr[]" type="checkbox" value="<<?php echo ($v["id"]); ?>>"/>&nbsp;&nbsp; <?php echo ($v["name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">图片：</th>
          <td>
            <span id="picdr" style="padding-right:2px;">
            <input type="text" id="url1" value="" name="pic1" class="input-text"/> <input type="button" id="image1" value="选择图片" class="btn btn-primary"/>（网络图片 + 本地上传）</span>
          </td>
        </tr>
        <tr>
          <th class="text-r">分类：</th>
          <td>
            <select  name="topid">
            <?php if(is_array($xwClass)): foreach($xwClass as $key=>$v): ?><option value='<?php echo ($v["id"]); ?>'><?php echo str_repeat('&nbsp;&nbsp;├&nbsp;', $v['lev']); echo ($v["classname"]); ?></option><?php endforeach; endif; ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">点击数：</th>
          <td>
            <input name="hits" id="hits" class="input-text" type="text" autocomplete="off" > 
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">tag标签：</th>
          <td>
            <input name="tag" id="tag" class="input-text" type="text" autocomplete="off" > （以中文逗号","分割）
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">所属书架：</th>
          <td>
           <select  name="caseid[]" multiple="multiple" style="width:200px;">
            <?php if(is_array($bookcase)): foreach($bookcase as $key=>$v): ?><option value='<?php echo ($v["id"]); ?>'><?php echo ($v["casename"]); ?></option><?php endforeach; endif; ?>
          </td>
        </tr>
        <tr>
          <th class="text-r" width="30%">内容：</th>
          <td>
            <textarea id="elm1" name="content" rows="20" cols="5"  style="width:98%"></textarea>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <button type="submit" class="btn btn-success radius" id="admin-password-save"><i class="icon-ok"></i> 确定</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

<script type="text/javascript" src="__STATIC__/js/Validform_v5.3.2_min.js"></script> 


<script type="text/javascript">
$(".Huiform").Validform(); 
</script>



<!--kindeditor-->
<link rel="stylesheet" href="__STATIC__/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__STATIC__/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="__STATIC__/kindeditor/lang/zh_CN.js"></script>
<script>
      var editor;
      KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
          allowFileManager : true
        });

        K('#submit').click(function(e) {
          var str=editor.html();
          $('#content').html(str);
        });

        K('#image1').click(function() {
          editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
              imageUrl : K('#url1').val(),
              clickFn : function(url, title, width, height, border, align) {
                K('#url1').val(url);
                editor.hideDialog();
              }
            });
          });
        });
        
      });
    </script>
<!--kindeditor-->
</body>
</html>