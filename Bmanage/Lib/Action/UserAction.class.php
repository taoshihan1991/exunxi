<?php
// 会员管理
class UserAction extends CommonAction {
    public function index(){
	
			$a=M('User');
			import('ORG.Util.Page');// 导入分页类
			// 查询满足要求的总记录数 $map表示查询条件
			$count      = $a->count();
			$Page       = new Page($count,20);// 实例化分页类 传入总记录数  
			$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
			$list = $a->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

				
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }



	//添加
	public function add(){

		$list=M('userclass')->select();
		$this->list=sortCate($list,0);


		$this->user=M('User')->select();
		$this->display();
	}

	//添加操作
	public function insert(){

		if(empty($_POST['username'])){
			$this->error('用户名必填',U('add'));
		}
		if(empty($_POST['password'])){
			$this->error('密码必填',U('add'));
		}
		$data=array(
			'username'=>$this->_post('username'),
			'password'=>$this->_post('password','md5'),
			'level'=>$this->_post('level','intval'),
			'truename'=>$this->_post('truename'),
			'address'=>$this->_post('address'),
			'classid'=>$this->_post('classid'),
			'shenfen'=>$this->_post('shenfen'),
			'time'=>time()
		);
		if(M('User')->add($data)){
			$this->error('添加成功！',U('User/index'));
			exit;
		}else{
			$this->error('添加失败！',U('User/index'));
			exit;
		}
		
	}

	//修改界面
	public function update(){

		$list=M('userclass')->select();
		$this->list=sortCate($list,0);



		$id=$_GET['id']+0;
		$this->v=M('User')->where("id={$id}")->find();

		$this->display();
	}

	//修改操作
	public function modify(){
		$id=$this->_post('id','intval');
		$data=array(
			'id'=>$id,
			'username'=>$this->_post('username'),
			'level'=>$this->_post('level','intval'),
			'tel'=>$this->_post('tel'),
			'shenfen'=>$this->_post('shenfen'),
			'truename'=>$this->_post('truename'),
			'address'=>$this->_post('address'),
			'classid'=>$this->_post('classid'),
			'time'=>time()
		);
		

		if(M('User')->save($data)){
			$this->error('修改成功！',U('User/update',array('id'=>$id)));
			exit;
		}else{

			$this->error('修改失败！',U('User/update',array('id'=>$id)));
			exit;
		}

	}

	//修改界面
	public function lock(){
		$id=$this->_post('id','intval');
		$lock=$this->_post('lock','intval');
		$lock=$lock ? 0 : 1;
		if(M('User')->where(array('id'=>$id))->setField('lock',$lock)){
			if($lock){
				$res=array('lock'=>$lock,'status'=>1);
				echo json_encode($res);
			}else{
				$res=array('lock'=>$lock,'status'=>0);
				echo json_encode($res);
			}
		}else{
			echo 0;
		}
		
	}

	
	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if(M('User')->where("id={$id}")->delete()){
			$this->error('会员删除成功！',U('User/index'));
			exit;
		}else{
			$this->error('会员删除失败！',U('User/index'));
			exit;
		}
	}

	//重置密码
	public function reset(){
		$id=$_GET['id']+0;
		if(M('User')->where("id={$id}")->setField('password',md5('123456'))){
			$this->error('密码重置：123456！',U('User/index'));
			exit;
		}else{
			$this->error('密码重置：123456！',U('User/index'));
			exit;
		}
	}

	//用户区域列表
	public function userclass(){
		$list=M('userclass')->select();
		$this->list=sortCate($list,0);

		$this->display();
	}

	//添加用户区域
	public function adduserclass(){
		$list=M('userclass')->select();
		$this->list=sortCate($list,0);

		$this->display();
	}
	//用户区域
	public function insertuserclass(){

		if(M('userclass')->add($_POST)){
			$this->success('添加成功',U('userclass'));
		}else{
			$this->error('添加失败');
		}
	}

	//修改用户区域
	public function updateuserclass(){

		$id=$_GET['id']+0;
		$this->nowClass=M("userclass")->where("id={$id}")->find();

		$userclass=M("userclass")->order("id asc")->select();
		$userclass=sortCate($userclass,0);
		$this->assign("userclass",$userclass);


		$this->display();
	}
	//修改操作用户区域
	public function modifyuserclass(){

		$id=$_POST['id']+0;

		$data['name']=trim($_POST['name']);
		$data['topid']=$_POST['topid']+0;

		//上级分类不能是他自身
		if($id==$data['topid']){
			$this->error('上级分类不能是自身');
			exit;
		}
		//提交过来的pid不能是当前id的子孙类
		$cate_list=M("userclass")->field("id,topid")->select();
		$cate=sortCate($cate_list,$id);
		foreach($cate as $v){
			if($v['id']==$data['topid']){
				$this->error('上级分类不能是当前分类的子孙分类');
				exit;
			}
		}

		if(M('userclass')->where("id={$id}")->save($data)){
			$this->error("类别修改成功！",U('userclass'));
			exit;
		}else{
			$this->error("类别没有修改！");
			exit;
		}


	}
	//消费记录
	public function consume(){
		$a=M('consume');
		$field=array(
			'a.*','b.truename'	
		);
		import('ORG.Util.Page');// 导入分页类
		// 查询满足要求的总记录数 $map表示查询条件
		$count      = $a->count();
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数  
		$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
		$list=$a->table("tg_consume a")->join('tg_user b on a.uid=b.id ')->limit($Page->firstRow.','.$Page->listRows)->field($field)->order("a.id desc")->select();

		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	//删除操作
	public function delconsume(){
		$id=$_GET['id']+0;
		if(M('consume')->where("id={$id}")->delete()){
			$this->error('删除成功！',U('consume'));
			exit;
		}else{
			$this->error('删除失败！');
			exit;
		}
	}



	
}