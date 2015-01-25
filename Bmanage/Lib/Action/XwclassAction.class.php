<?php
// 新闻类别无限极分类
class XwclassAction extends CommonAction {
    public function index(){
		$xwClass=M("Xwclass")->order("xh desc,id desc")->select();
		$list=sortCate($xwClass,0);
		//dump($list);
		$this->assign("xwClass",$list);
	
		$this->display();
    }

	//添加分类
	public function addClass(){
		if(empty($_POST['classname'])){ 
			$this->error("类别名称不能为空！",U('index'));
			exit;
		}

		$data['classname']=trim($_POST['classname']);
		$data['topid']=$_POST['topid']+0;
		$data['xh']=$_POST['xh']+0;
		if(M("Xwclass")->add($data)){
			$this->success("类别添加成功！",U('index'));
			exit;
		}else{
			$this->error("类别添加失败！",U('index'));
			exit;
		}
	}

	//修改界面
	public function update(){
		
		$id=$_GET['id']+0;
		$this->nowClass=M("Xwclass")->where("id={$id}")->find();

		$xwClass=M("Xwclass")->order("xh desc,id desc")->select();
		$list=sortCate($xwClass,0);
		$this->assign("xwClass",$list);
		$this->display();
	}

	//修改操作
	public function modify(){
		//print_r($_POST);
		
		$id=$_POST['id']+0;
		$data['classname']=trim($_POST['classname']);
		$data['topid']=$_POST['topid']+0;
		$data['xh']=$_POST['xh']+0;

		//上级分类不能是他自身
		if($id==$data['topid']){
			$this->error('上级分类不能是自身',U('Xwclass/update',array('id'=>$id)));
			exit;
		}
		//提交过来的pid不能是当前id的子孙类
		$cate_list=M("Xwclass")->field("id,topid")->select();
		$cate=sortCate($cate_list,$id);
		foreach($cate as $v){
			if($v['id']==$data['topid']){
				$this->error('上级分类不能是当前分类的子孙分类',U('Xwclass/update',array('id'=>$id)));
				exit;
			}
		}


		
	
		if(M('Xwclass')->where("id={$id}")->save($data)){
			$this->error("类别修改成功！",U('index'));
			exit;
		}else{
			$this->error("类别没有修改！",U('Xwclass/update',array('id'=>$id)));
			exit;
		}
	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		$cate_list=M("Xwclass")->select();
		$cate=sortCate($cate_list,$id);

		
		if(M('Xwclass')->where("id={$id}")->delete()){
			foreach($cate as $v){
				M('Xwclass')->where("id={$v['id']}")->delete();
			}
			$this->success("类别删除成功！",U('index'));
			exit;
		}else{
			$this->error("类别删除失败！",U('index'));
			exit;
		}
	}


	
}