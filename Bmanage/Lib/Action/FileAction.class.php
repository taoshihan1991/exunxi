<?php
// 关键词管理
class FileAction extends CommonAction {
    public function index(){
		$this->display();
    }

	//添加
	public function connect(){
		
         define("IN_ADMIN",1);//重要，定义一个常量，在插件的PHP入口文件中验证，防止非法访问。
         include APP_PATH.'Public/elfinder/php/connector.php';//包含elfinder自带php接口的入口文件
 
	}

	
	


	
}