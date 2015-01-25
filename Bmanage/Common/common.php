<?php
	//取消thinkphp自动引号转义
    if (get_magic_quotes_gpc()) {

        function stripslashes_deep($value)

        {

            $value = is_array($value) ?

                        array_map('stripslashes_deep', $value) :

                        stripslashes($value);

            return $value;

        }

        $_POST = array_map('stripslashes_deep', $_POST);

        $_GET = array_map('stripslashes_deep', $_GET);

        $_COOKIE = array_map('stripslashes_deep', $_COOKIE);

    }


	function sortCate($arr,$id,$lev=0){
		//静态变量
		$list=array();
		foreach($arr as $row){
			if($id==$row['topid']){
				$row['lev']=$lev;
				$list[]=$row;
				//递归
				$list=array_merge($list,sortCate($arr,$row['id'],$lev+1));
			}
		}
		return $list;
	}

	function byteFormat($bytes) {
		$sizetext = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
		return round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . $sizetext[$i];
	}

	//传父级，找子集 二维数组
function findSon($cate,$id){
	$arr=array();

	foreach($cate as $v){
	

		if($v['topid']==$id){
			$arr[]=$v;
			$arr=array_merge(findSon($cate,$v['id']),$arr);
		}
	}
	return $arr;
}


?>