<?php
// 属性
class AttrAction extends CommonAction {
    public function index(){
		$this->list=M('Attr')->select();

		$this->display();
    }

	//添加新闻
	public function add(){
	
		$this->display();
	}

	//添加操作
	public function insert(){
		
		if(empty($_POST['name'])){
			$this->error('属性必填','add');
		}
		$data['name']=$_POST['name'];
		$data['color']=$_POST['color'];
		
		if(M('Attr')->add($data)){
			$this->error('添加成功！',U('Attr/index'));
	
		}else{
			$this->error('添加失败！',U('Attr/index'));

		}
		
	}

	//修改界面
	public function update(){
		
		

		$id=$_GET['id']+0;
		$this->v=M('Attr')->where("id={$id}")->find();
		$this->display();
	}

	//修改操作
	public function modify(){
		$id=$_POST['id']+0;
		if(empty($_POST['name'])){
			$this->error('属性必填','add');
		}
		$data['name']=$_POST['name'];
		$data['color']=$_POST['color'];
		
		if(M('Attr')->where("id={$id}")->save($data)){
			$this->error('修改成功！');
	
		}else{
			$this->error('修改失败！');

		}

	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if(M('Attr')->where("id={$id}")->delete()){
			$this->error('删除成功！',U('Attr/index'));
			exit;
		}else{
			$this->error('删除失败！',U('Attr/index'));
			exit;
		}
	}

	//批量删除
	public function betchdel(){
		
		if(!IS_POST){
			$this->error('不要get提交！',U('Xw/index'));
			exit;
		}

		foreach($_POST['adid'] as $v){
			M('Xw')->where("id={$v}")->delete();
		}

		$this->error('文章批量删除成功！',U('Xw/index'));
		exit;
	}

	//ajax状态
	public function state(){
		$id=$this->_post('wid','intval');
		$state=$this->_post('state','intval');
		$state=$state ? 0 : 1;
		if(M('xw')->where(array('id'=>$id))->setField('state',$state)){
			if($state){
				echo 1;
			}else{
				echo 0;
			}
		}



	}


	//所属区域
	public function userclass(){
		$list=M('userclass')->select();
		$this->list=sortCate($list,0);

		$this->display();
	}



	


	
}