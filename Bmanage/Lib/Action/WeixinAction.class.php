<?php
// 微信类
class WeixinAction extends Action {
	
	//关键词回复
    public function index(){
		$a=M('Weixin');
		import('ORG.Util.Page');// 导入分页类
		// 查询满足要求的总记录数 $map表示查询条件
		$count      = $a->where("state=1")->count();
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数  
		$show       = $Page->show();// 分页显示输出
		 // 进行分页数据查询
		$list = $a->limit($Page->firstRow.','.$Page->listRows)->field("title,id,state,keywords")->order("id desc")->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

	//关注回复
    public function gzreplay(){
		$this->v=M('Weixin')->where("state=0")->find();
		$this->display();
    }

	//修改操作
	public function gzmodify(){

		$id=$_POST['id']+0;
		$data['content']=trim($_POST['content']);
		$data['title']=trim($_POST['title']);
		$data['pic1']=trim($_POST['pic1']);
		$data['url']=trim($_POST['url']);
		if(M('Weixin')->where("id={$id}")->save($data)){
			$this->error("微信关注回复修改成功！",U('Weixin/gzreplay',array('id'=>$id)));
			exit;
		}else{
			$this->error("微信关注回复内容没有更改！",U('Weixin/gzreplay',array('id'=>$id)));
			exit;
		}
	}

	


	//修改界面
    public function update(){
		$id=$_GET['id']+0;
		
		$this->v=M('Weixin')->where("id={$id}")->find();
		$this->display();
	}

	

	//修改界面
    public function add(){
		$this->display();
	}

	//修改操作
	public function insert(){
		if(empty($_POST['keywords'])){
			$this->error('关键词必填',U('add'));
			exit;
		}
		$data['title']=trim($_POST['title']);
		$data['content']=trim($_POST['content']);
		$data['pic1']=trim($_POST['pic1']);
		$data['url']=trim($_POST['url']);
		$data['title']=trim($_POST['title']);
		$data['keywords']=trim($_POST['keywords']);
		$data['state']=$_POST['state']+0;
		
		if(M('Weixin')->add($data)){
			$this->error("微信自动回复增加成功",U('add'));
			exit;
		}else{
			$this->error("微信自动回复增加失败",U('add'));
			exit;
		}
		
	}

	//修改操作
	public function modify(){
		$id=$_POST['id']+0;
		$data['keywords']=trim($_POST['keywords']);
		$data['content']=trim($_POST['content']);
		$data['title']=trim($_POST['title']);
		$data['pic1']=trim($_POST['pic1']);
		$data['url']=trim($_POST['url']);
		$data['state']=$_POST['state']+0;
		if(M('Weixin')->where("id={$id}")->save($data)){
			$this->error("微信关键词回复修改成功！",U('Weixin/update',array('id'=>$id)));
			exit;
		}else{
			$this->error("微信关键词回复内容没有更改！",U('Weixin/update',array('id'=>$id)));
			exit;
		}
	}

	//删除操作
	public function del(){
		$id=$_GET['id']+0;
		if(M('Weixin')->where("id={$id}")->delete()){
			$this->error("微信关键词回复删除成功！",U('index'));
			exit;
		}else{
			$this->error("微信关键词回复删除失败！",U('index'));
			exit;
		}

	}


//微信消息
    public function message(){
		$a=M('weixin_message');
		import('ORG.Util.Page');// 导入分页类
		// 查询满足要求的总记录数 $map表示查询条件
		$count      = $a->count();
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数  
		$show       = $Page->show();// 分页显示输出
			 // 进行分页数据查询
		$list = $a->limit($Page->firstRow.','.$Page->listRows)->order("time desc")->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
    }

//删除操作
	public function delmessage(){
		$id=$_GET['id']+0;
		if(M('weixin_message')->where("id={$id}")->delete()){
			$this->error("操作成功！",U('message'));
			exit;
		}else{
			$this->error("操作失败！");
			exit;
		}

	}




	
}