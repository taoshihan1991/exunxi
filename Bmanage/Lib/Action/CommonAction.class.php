<?php
// 前台公共类
class CommonAction extends Action {
     public function _initialize(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		
    }
}