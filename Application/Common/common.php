<?php
header("content-type:text/html;charset=utf-8");
	//传父级，找子集 二维数组
function findSon($cate,$id){
	$arr=array();
	$i=0;
	foreach($cate as $v){
		if($v['id']==$id && $i==0){
			$arr[]=$v;
		}

		if($v['topid']==$id){
			$arr[]=$v;
			$arr=array_merge(findSon($cate,$v['id']),$arr);
		}

		$i++;
	}
	return $arr;
}

//截取中文字符串
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr"))
        return mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}

function sortCate($arr,$id,$lev=0){
		//静态变量
		static $list=array();
		foreach($arr as $row){
			if($id==$row['topid']){
				$row['lev']=$lev;
				$list[]=$row;
				//递归
				sortCate($arr,$row['id'],$lev+1);
			}
		}
		return $list;
	}





//加密函数（异位或加密字符串type参数 0加密 1解密）
function enctyption($value,$type=0){
	$key=md5(C('ENCTYPTION_KEY'));
	if(!$type){
		//加密、
		return str_replace('=','',base64_encode($value^$key));
	}else{
		//解密
		$value=base64_decode($value);
		return $value^$key;
	}
}

//传子集，找父级 二维数组  （用于无限极面包屑导航）
function findParent($cate,$id){
	$arr=array();
	foreach($cate as $v){
		if($v['id']==$id){
			$arr[]=$v;
			$arr=array_merge(findParent($cate,$v['topid']),$arr);
		}
	}
	return $arr;
}

//二级栏目，传顶级，返回子集字符串
function findSonStr($cate,$top){
	$ids=array();
    	$ids[]=$top;
    	foreach ($cate as $v) {
    		
    		if($v['topid'] == $top){
    			$ids[]=$v['id'];
    		}
    	
    	}
    	$res=implode(',', $ids);
    	return $res;
}

//二级栏目，传子集，返回父集
function findPra($cate,$id){
		
    	foreach ($cate as $v) {
    		
    		if($v['id'] == $id){
    			$res=$v['topid'];
    		}
    	
    	}
    	$res=!empty($res) ? $res : $id;
    	return $res;
}

//随机密码生成
function get_password( $length = 8 ) 
{
    $str = substr(md5(time()), 0, $length);
    return $str;
}
function sendEmail($email,$content){
		include_once(APP_PATH."Lib/Phpmailer/class.phpmailer.php");
			$subject = "青果网会员邮件系统";   
			$smtp="smtp.qq.com";
			$username="tshwebsite@foxmail.com";
			$password="taoshihan1";
			$mail=new PHPMailer();
			$mail->Charset='UTF-8';
			$mail->SMTPAuth = true;
			$mail->Host=$smtp;
			$mail->IsSMTP();
			$mail->SMTPAuth=true;
			$mail->Username=$username;
			$mail->Password=$password;
			$mail->From=$username;
			$mail->FromName="青果网";
			$mail->Sender=$username;
			$mail->Subject =$subject;
			$mail->IsHTML(true);
			
			
			$mail->Body ='
<table cellpadding="0" cellspacing="0" width="700" align="center" style="font-family:Verdana,Arial;">
<tbody><tr>
<td style="background:#FF6600;line-height:30px;font-size:14px;font-weight:bold;color:#FFFFFF;">&nbsp; 青果网会员邮件系统</td>
</tr>
<tr>
<td style="border:#CCCCCC 1px solid;padding:20px 20px 20px 20px;line-height:180%;font-size:13px;">
'.$content.'<br><br>
青果网-分享清新音乐|散文|图片|编程技术<br>
我们都爱青果网，我们积极地搜集分享大到世界,小到身边的资讯文章，音乐，技术文档,给你带来清新感受的同时让你也愿意去分享
</td>
</tr>
<tr>
<td style="background:#333333;padding:10px;line-height:180%;font-size:12px;color:#FFFFFF;">请注意：此邮件系 <a href="http://www.tshgrw.cn/" target="_blank" style="color:#FFFFFF;">青果网</a> 自动发送，请勿直接回复。<br>如果此邮件不是您请求的，请忽略并删除！</td>
</tr>
</tbody></table>
			';
			
			$mail->AddAddress($email);
			//$mail->Send();
			//echo $mail->Body;exit();
			
			if(!$mail->Send())
			{
				return false;
			}
			else
			{
				return true;
			}

    }
?>