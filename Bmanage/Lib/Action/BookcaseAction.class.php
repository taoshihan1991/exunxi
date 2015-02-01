<?php
// 书单列表
class BookcaseAction extends CommonAction {
    public function index(){
    	$model_book=M('bookcase');
		import('ORG.Util.Page');// 导入分页类
		$count=$model_book->count();
		$Page = new Page($count,15);
		$show = $Page->show();
		$list =$model_book->limit($Page->firstRow.','.$Page->listRows)->order("sort asc,updatetime desc")->select();
		$this->assign('count',$count);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

	//添加书单
	public function add(){
		if(IS_POST){
			$data=array();
			$data['casename']=I('casename');
			$data['sort']=I('sort');
			$data['updatetime']=time();
			$model_book=M('bookcase');
			$res=$model_book->add($data);
			if($res){
				$this->success('操作成功',U('Bookcase/index'));
			}else{
				$this->error('操作失败');
			}
			exit;
		}
		$this->display();
	}
	//修改界面
	public function update(){
		$id=$_GET['id']+0;
		$model_book=M('bookcase');
		if(IS_POST){
			$data=array();
			$data['casename']=I('casename');
			$data['sort']=I('sort');
			$data['updatetime']=time();
			$model_book=M('bookcase');
			$res=$model_book->where("id={$id}")->save($data);
			if($res){
				$this->success('操作成功',U('Bookcase/index'));
			}else{
				$this->error('操作失败');
			}
			exit;
		}
		$this->info=$model_book->where("id={$id}")->find();
		$this->display();
	}
	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		$model_book=M('bookcase');
		if($model_book->where("id={$id}")->delete()){
			$this->success('操作成功',U('Bookcase/index'));
		}else{
			$this->error('操作失败');
		}
	}

}