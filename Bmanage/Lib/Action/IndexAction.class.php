<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
		$this->display();
    }

	public function welcome(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		//欢迎页面
		$ip=get_client_ip();
		$admin = $_SESSION['admin']['name'];
		$info = array(
				'操作系统'=>PHP_OS,
				'运行环境'=>$_SERVER["SERVER_SOFTWARE"],
				'PHP运行方式'=>php_sapi_name(),
				'当前登录管理员'=>"用户名:{$admin}&nbsp;&nbsp;&nbsp;&nbsp;登录IP:{$ip}&nbsp;&nbsp;",
				'上传附件限制'=>ini_get('upload_max_filesize'),
				'执行时间限制'=>ini_get('max_execution_time').'秒',
				'服务器时间'=>date("Y年n月j日 H:i:s"),
				'北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
				'服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
				'剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
				'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
				'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
				'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
				);
		$this->assign('info',$info);
		$this->display();
	}
}