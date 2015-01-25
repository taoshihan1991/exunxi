<?php
// 关键词管理
class AdminAction extends CommonAction {
    public function index(){

		$a=M('Admin');
		import('ORG.Util.Page');// 导入分页类
		// 查询满足要求的总记录数 $map表示查询条件
		$count      = $a->where("state>{$_SESSION['admin']['state']}")->count();
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数  
		$show       = $Page->show();// 分页显示输出
		 // 进行分页数据查询
		$list = $a->limit($Page->firstRow.','.$Page->listRows)->where("state>{$_SESSION['admin']['state']}")->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

	public function add(){
		$this->display();
	}

	public function insert(){
		$data['ad_name']=$_POST['ad_name'];
		$data['ad_pass']=$_POST['ad_pass'];
		$data['state']=$_POST['state']+0;
		$data['time']=time();
		if(M('Admin')->add($data)){
			$this->error('增加管理员成功！',U('Admin/index'));
			exit;
		}else{
			$this->error('增加管理员修改！',U('Admin/index'));
			exit;
		}
	}


	
	//修改界面
	public function update(){
		$id=$_GET['id']+0;
		$this->v=M('Admin')->where("id={$id}")->find();
		$this->display();
	}

	//修改操作
	public function modify(){

		
		if(empty($_POST['ad_pass'])||empty($_POST['ad_name'])){
			$this->error('选项必填',U('index'));
			exit;
		}
		$id=$_POST['id']+0;
		$data['ad_pass']=$_POST['ad_pass'];
		$data['ad_name']=$_POST['ad_name'];
		$data['state']=$_POST['state']+0;
		$data['time']=time();
		if(M('Admin')->where("id={$id}")->save($data)){
			$this->error('管理员修改成功！',U('Admin/index'));
			exit;
		}else{
			$this->error('管理员修改失败！',U('Admin/index'));
			exit;
		}

	}

	//修改密码界面
	public function passupdate(){
		$this->display();
	}

	//修改密码操作
	public function passmodify(){
		if(empty($_POST['ad_pass'])){
			$this->error('新密码必填',U('index'));
			exit;
		}
		$id=$_SESSION['admin']['id'];

		$aa=M('Admin')->where("id={$id}")->getField("ad_pass");
		if($aa!=$_POST['ad_pass_old']){
			$this->error('原密码错误',U('Admin/index'));
			exit;
		}


		$data['ad_pass']=$_POST['ad_pass'];
		$data['time']=time();
		if(M('Admin')->where("id={$id}")->save($data)){
			$this->error('修改密码成功！',U('Admin/index'));
			exit;
		}else{
			$this->error('修改密码修改！',U('Admin/index'));
			exit;
		}
	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if($_SESSION['admin']['state']!=0){
			$this->error("对不起，您没有权限！",U('Admin/index'));
			exit;	
		}
		if(M('Admin')->where("id={$id}")->delete()){
			$this->error("管理员删除成功！",U('Admin/index'));
			exit;
		}else{
			$this->error("管理员失败！",U('Admin/index'));
			exit;
		}

	}

	



	


	
}