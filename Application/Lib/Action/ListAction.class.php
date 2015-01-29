<?php
// 列表类
class ListAction extends CommonAction {
    public function index(){
    	
    	$cid=$this->cid;
    	$this->road=findParent($this->cate,$cid);

    	$a=M('Xw');
		import('ORG.Util.Page');// 导入分页类
		// 查询满足要求的总记录数 $map表示查询条件
		$sonstr=findSonStr($this->cate,$cid);
		$where=array(
			'classid'=>array('in',$sonstr),
			'del'=>0,
    		'state'=>1
		);
		$pagesize=2;
		$field=array(
			'a.id','a.title','a.pic1','a.hits','a.content','a.classid','a.hits','a.time','a.tag','b.classname'
		);



			$count      = $a->cache(true,3600*24,'file')->where($where)->count();
			$Page       = new Page($count,$pagesize);// 实例化分页类 传入总记录数  		 
			$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
			$list = M('xw')->table("tg_xw a")->join('tg_xwclass b on a.classid=b.id ')->cache(true,3600*24,'file')->where($where)->field($field)->limit($Page->firstRow.','.$Page->listRows)->order("a.time desc")->select();
			
			//tag标签
			foreach ($list as $key => $v) {
	    		$list[$key]['content']=msubstr(trim(strip_tags($v['content'])),0,100);
	  			$tagarr=explode('，', $v['tag']);
	  			//print_r($tagarr);
    			$list[$key]['tag']=$tagarr;
    		}
    	


			$this->assign('list',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
		$this->display();
		
	}

}