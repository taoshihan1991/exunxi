<?php
class WishAction extends CommonAction {
    public function index(){
    	$a=M('wish');
    	$list=$a->select();
    	
		import('ORG.Util.Page');// 导入分页类

			// 查询满足要求的总记录数 $map表示查询条件
			$count      = $a->count();
			$Page       = new Page($count,20);// 实例化分页类 传入总记录数  
			$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
			$list = $a->limit($Page->firstRow.','.$Page->listRows)->order("wid desc")->select();
		

		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

    /*
	 删除愿望
	*@return void
    */
	public function delwish(){
		$wid=intval($_GET['wid']);
		$res=M('wish')->where(array('wid'=>$wid))->delete();
		if($res){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
	}
}