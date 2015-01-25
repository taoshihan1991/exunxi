<?php
// 后台公共类
class PublicAction extends Action {
    public function top(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }
	public function center(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }
	public function end(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }

	public function menu(){
		//验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
		$this->display();
    }


	//登陆
	public function login(){
		$this->display();
	}

	//验证码
	public function checkcode(){
		import("ORG.Util.Image");
		Image::buildImageVerify(1,1,"png");
	}

	//登陆验证
	public function check(){
		
		$zd_name=htmlspecialchars(trim($_POST['zd_name']));
		$zd_pass=htmlspecialchars(trim($_POST['zd_pass']));
		$code=trim($_POST['code']);
		if (empty($zd_name)) {
			$this->error('账号不能为空',U('login'));
			exit;
		}elseif(empty($zd_pass)){
			$this->error('密码不能为空',U('login'));
			exit;
		}elseif(empty($code)){
			$this->error('验证码不能为空',U('login'));
			exit;
		}elseif(md5($code) != $_SESSION['verify']){
			$this->error('验证码不正确',U('login'));
			exit;
		}

		$user=(M('Admin')->where("ad_name='{$zd_name}'")->find());
		if($user['ad_pass']&&$user['ad_pass']==$zd_pass){
			$_SESSION['admin']=array('id'=>$user['id'],'name'=>$user['ad_name'],'state'=>$user['state']);
			$this->success('登陆成功',U('Index/index'));
			exit;
		}else{
			$this->error('用户名或密码错误！',U('login'));
			exit;
		}
		
		
	}

	 public function clearCache($type=0,$path=NULL) {
		 //验证是否登陆
		if(empty($_SESSION['admin']['name'])){
			$this->error('您没有登陆或登陆已经失效',U('Public/login'));
			exit;
		}
       //前台页面
			  header("Content-type: text/html; charset=utf-8");
			  //清文件缓存
			  $dirs = array('Runtime/App');
			  @mkdir('Runtime',0777,true);
			  //清理缓存
			  foreach($dirs as $value) {
			   $this->rmdirr($value);
			  }
			 $this->error("缓存清理成功！",U('main'));  



    }

	 public function rmdirr($dirname) {
		  if (!file_exists($dirname)) {
		   return false;
		  }
		  if (is_file($dirname) || is_link($dirname)) {
		   return unlink($dirname);
		  }
		  $dir = dir($dirname);
		  if($dir){
		   while (false !== $entry = $dir->read()) {
			if ($entry == '.' || $entry == '..') {
			 continue;
			}
			//递归
			$this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
		   }
		  }
		  $dir->close();
		  return rmdir($dirname);
	 }

	//退出
	public function loginout(){
		$_SESSION['admin']=null;
		unset($_SESSION['admin']);
		$this->error('退出成功',U('Public/login'));
		exit;
	}


}