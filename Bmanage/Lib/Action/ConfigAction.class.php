<?php
// 配置类
class ConfigAction extends CommonAction {
    public function index(){
		$this->v=M('Setup')->where("id=1")->find();
		$this->display();
    }
    public function modify(){
		$data['name']=trim($_POST['name']);
		$data['title']=trim($_POST['title']);
		$data['keywords']=trim($_POST['key']);
		$data['descriptions']=htmlspecialchars(trim($_POST['ms']));
		$data['weburl']=trim($_POST['web']);
		if(M('Setup')->where("id=1")->save($data)){
			$this->error("网站设置成功！",U('index'));
			exit;
		}else{
			$this->error("修改失败，内容没有更改！",U('index'));
			exit;
		}
	}

	

	
}