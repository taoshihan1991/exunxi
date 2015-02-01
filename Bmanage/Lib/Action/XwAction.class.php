<?php
// 文章控制器
class XwAction extends CommonAction {
    public function index(){
    	$a=M('xw');
		import('ORG.Util.Page');// 导入分页类
		$field=array(
			'a.id','a.title','a.state','a.time','b.classname'
		);

			// 查询满足要求的总记录数 $map表示查询条件
			$count      = $a->table("tg_xw a")->count();
			$Page       = new Page($count,20);// 实例化分页类 传入总记录数  
			$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
			$list = $a->table("tg_xw a")->join('tg_xwclass b on a.classid=b.id ')->limit($Page->firstRow.','.$Page->listRows)->field($field)->order("a.id desc")->select();
		

		$this->assign('count',$count);
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

	//添加新闻
	public function add(){
		if(IS_POST){
			$data=array();
			$data['title']=$_POST['title'];
			$data['pic1']=$_POST['pic1'];
			$data['classid']=$_POST['topid'];
			$data['content']=$_POST['content'];
			$data['hits']=$_POST['hits']+0;
			$data['tag']=$_POST['tag'];
			$data['link']=$_POST['link'];
			$data['state']=1;
			$data['time']=time();
			$data['caseid']=$_POST['caseid'] ? serialize($_POST['caseid']) : '';
			if($aid=M('xw')->add($data)){
				//添加到书架表
				if(is_array($_POST['caseid'])){
					$model_bookcase=M('bookcase');
					foreach ($_POST['caseid'] as $k => $v) {
						$aids=$model_bookcase->where("id=$v")->getField('aids');
						$aid_arr=unserialize($aids);
						$aid_arr[]=$aid;
						$temp=array('aids'=>serialize($aid_arr),'updatetime'=>time());
						$model_bookcase->where("id=$v")->save($temp);
					}
				}
				if(isset($_POST['attr'])){
					$attr=array();
					foreach($_POST['attr'] as $v){
						$attr[]=array('aid'=>$aid,'attr_id'=>$v);
					}
					M('xw_attr')->addAll($attr);
				}
				$this->success('操作成功！',U('Xw/index'));
			}else{
				$this->error('操作失败！',U('Xw/index'));

			}
			exit;
		}
		$xwClass=M("Xwclass")->order("xh desc,id desc")->select();
		$list=sortCate($xwClass,0);
		$this->assign("xwClass",$list);
		$this->attr=M('Attr')->select();
		$this->bookcase=M("Bookcase")->order("sort asc,id desc")->select();
		$this->display();
	}
	//修改界面
	public function update(){
		$id=$_GET['id']+0;
		if(IS_POST){
			$data=array();
			$data['title']=$_POST['title'];
			$data['pic1']=$_POST['pic1'];
			$data['classid']=$_POST['topid'];
			$data['content']=$_POST['content'];
			$data['hits']=$_POST['hits']+0;
			$data['tag']=$_POST['tag'];
			$data['link']=$_POST['link'];
			$data['state']=1;
			$data['time']=time();
			$data['caseid']=$_POST['caseid'] ? serialize($_POST['caseid']) : '';
			if(M('xw')->where("id={$id}")->save($data)){
				//添加到书架表
				if(is_array($_POST['caseid'])){
					$model_bookcase=M('bookcase');
					foreach ($_POST['caseid'] as $k => $v) {
						$aids=$model_bookcase->where("id=$v")->getField('aids');
						$aid_arr=unserialize($aids);
						foreach($aid_arr as $m_k=>$m_v){
							if($m_v==$id) unset($aid_arr[$m_k]);
						}
						$aid_arr[]=$id;
						$temp=array('aids'=>serialize($aid_arr),'updatetime'=>time());
						$model_bookcase->where("id=$v")->save($temp);
					}
				}
				if(isset($_POST['attr'])){
					M('xw_attr')->where("aid={$id}")->delete();
					$attr=array();
					foreach($_POST['attr'] as $v){
						$attr[]=array('aid'=>$id,'attr_id'=>$v);
					}
					M('xw_attr')->addAll($attr);
				}
				$this->success('操作成功！',U('Xw/index'));
			}else{
				$this->error('操作失败！',U('Xw/index'));

			}
			exit;
		}
		$this->attr=M('Attr')->select();
		//所属分类
		$xwClass=M("Xwclass")->order("xh desc,id desc")->select();
		$xwClass=sortCate($xwClass,0);
		$this->assign("xwClass",$xwClass);

		$this->bookcase=M("Bookcase")->order("sort asc,id desc")->select();

		$this->shuxing=M('xw_attr')->where("aid={$id}")->select();
		$this->info=M('Xw')->where("id={$id}")->find();
		$this->display();
	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if(M('Xw')->where("id={$id}")->delete()){
			$this->success('操作成功！',U('Xw/index'));
			exit;
		}else{
			$this->error('操作失败！',U('Xw/index'));
			exit;
		}
	}

	//批量删除
	public function betchdel(){
		
		if(!IS_POST){
			$this->error('不要get提交！',U('Xw/index'));
			exit;
		}

		foreach($_POST['ids'] as $v){
			M('Xw')->where("id={$v}")->delete();
		}

		$this->success('文章批量删除成功！',U('Xw/index'));
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

	


	
}