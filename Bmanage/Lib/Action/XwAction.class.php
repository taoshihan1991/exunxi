<?php
// 新闻类别无限极分类
class XwAction extends CommonAction {
    public function index(){
    	$a=M('xw');

		import('ORG.Util.Page');// 导入分页类
		$field=array(
			'a.id','a.title','a.state','a.time','b.classname','c.username'
		);
		$where=array(
			'del'=>array('neq',1)
		);
			// 查询满足要求的总记录数 $map表示查询条件
			$count      = $a->table("tg_xw a")->join('tg_xwclass b on a.classid=b.id ')->join('tg_user c on c.id=a.uid ')->where($where)->count();
			$Page       = new Page($count,20);// 实例化分页类 传入总记录数  
			$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
			$list = $a->table("tg_xw a")->join('tg_xwclass b on a.classid=b.id ')->join('tg_user c on c.id=a.uid ')->limit($Page->firstRow.','.$Page->listRows)->field($field)->where($where)->order("a.id desc")->select();
		

		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

	//添加新闻
	public function add(){

		$xwClass=M("Xwclass")->order("xh desc,id desc")->select();
		$list=sortCate($xwClass,0);
		$this->assign("xwClass",$list);


		$this->attr=M('Attr')->select();
	
		
		$this->display();
	}

	//添加操作
	public function insert(){
		$data['title']=$_POST['title'];
		$data['pic1']=$_POST['pic1'];
		$data['classid']=$_POST['topid'];
		$data['content']=$_POST['content'];
		$data['hits']=$_POST['hits']+0;
		$data['tag']=$_POST['tag'];
		$data['link']=$_POST['link'];
		$data['state']=1;
		$data['time']=time();

		if($aid=M('xw')->add($data)){
			$this->success('添加文章成功！',U('Xw/index'));
			if(isset($_POST['attr'])){
				$attr=array();
				//$sql='INSERT INTO `'.C('DB_PREFIX').'xw_attr`(aid,attr_id) VALUES ('..')';
				foreach($_POST['attr'] as $v){
					$attr[]=array('aid'=>$aid,'attr_id'=>$v);
				}
				M('xw_attr')->addAll($attr);
				
			}
		}else{
			$this->error('添加文章失败！',U('Xw/index'));

		}
		
	
		
	}

	//修改界面
	public function update(){
		
		$this->attr=M('Attr')->select();


		

		//所属分类
		$xwClass=M("Xwclass")->order("xh desc,id desc")->select();
		$xwClass=sortCate($xwClass,0);
		$this->assign("xwClass",$xwClass);




		$id=$_GET['id']+0;
		$this->shuxing=M('xw_attr')->where("aid={$id}")->select();
		$this->v=M('Xw')->where("id={$id}")->find();
		$this->display();
	}

	//修改操作
	public function modify(){
		$id=$_POST['id']+0;
		if(empty($_POST['title'])){
			$this->error('文章标题必填',U('Xw/update',array('id'=>$id)));
			exit;
		}
		$data['state']=$_POST['state'];
		$data['title']=$_POST['title'];
		$data['pic1']=$_POST['pic1'];
		$data['classid']=$_POST['topid'];
		$data['link']=$_POST['link'];
		$data['content']=$_POST['content'];
		$data['hits']=$_POST['hits'];
		$data['tag']=$_POST['tag'];
		$data['time']=time();

		M('xw_attr')->where("aid={$id}")->delete();
		if(M('Xw')->where("id={$id}")->save($data)){
			if(isset($_POST['attr'])){
				
				$attr=array();
				foreach($_POST['attr'] as $v){
					$attr[]=array('aid'=>$id,'attr_id'=>$v);
				}
				M('xw_attr')->addAll($attr);
				
				
			}
			$this->error('文章修改成功！',U('Xw/update',array('id'=>$id)));
			exit;
		}else{
			$this->error('文章内容没有修改！',U('Xw/update',array('id'=>$id)));
			exit;
		}

	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if(M('Xw')->where("id={$id}")->delete()){
			$this->error('文章删除成功！',U('Xw/index'));
			exit;
		}else{
			$this->error('文章删除失败！',U('Xw/index'));
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