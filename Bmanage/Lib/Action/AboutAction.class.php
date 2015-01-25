<?php
// 单页类
class AboutAction extends CommonAction {
    public function index(){
		import('ORG.Util.Page');// 导入分页类
		$count      =M('About')->count();// 查询满足要求的总记录数 $map表示查询条件
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数 
		
		$show       = $Page->show();// 分页显示输出
		 // 进行分页数据查询
		$list = M('About')->limit($Page->firstRow.','.$Page->listRows)->order("id asc")->select();
		$this->assign('about',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出


		$this->display();
    }
	//修改界面
    public function update(){
		$id=$_GET['id']+0;
		
		$this->v=M('About')->where("id={$id}")->find();
		$this->display();
	}

	//修改操作
	public function modify(){
		$id=$_POST['id']+0;
		$data['title']=trim($_POST['title']);
		$data['content']=trim($_POST['content']);
		$data['link']=trim($_POST['link']);
		
		if(M('About')->where("id={$id}")->save($data)){
			$this->error("栏目修改成功！",U('about/update',array('id'=>$id)));
			exit;
		}else{
			$this->error("栏目内容没有更改！",U('about/update',array('id'=>$id)));
			exit;
		}
	}

	//修改界面
    public function add(){
		$this->display();
	}

	//修改操作
	public function insert(){
		if(empty($_POST['title'])){
			$this->error('单页名称必填',U('add'));
			exit;
		}
		$data['title']=trim($_POST['title']);
		$data['content']=trim($_POST['content']);
		$data['link']=trim($_POST['link']);
		
		if(M('About')->add($data)){
			$this->error("单页添加成功！",U('about/index'));
			exit;
		}else{
			$this->error("单页添加失败！",U('about/index'));
			exit;
		}
		
	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if(M('About')->where("id={$id}")->delete()){
			$this->error("单页删除成功！",U('about/index'));
			exit;
		}else{
			$this->error("单页删除失败！",U('about/index'));
			exit;
		}

	}




	
}