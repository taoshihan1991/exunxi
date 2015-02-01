<?php
// 文章类
class ViewAction extends CommonAction {
    public function index(){
    	$id=$this->id;

        /*统计代码*/
        $date=date("Y-m-d",time());
        $model_ranking=M('ranking');
        $ranking=$model_ranking->where("aid={$id} and date='{$date}'")->find();
        if(!$ranking){
            $data=array(
                'aid'=>$id,
                'date'=>$date
            );
            $model_ranking->add($data);
        }else{
            $data=array(
                'hits'=>$ranking['hits']+1,
                'date'=>$date
            );
            $model_ranking->where("aid={$id} and date='{$date}'")->save($data);
        }
        

    	M('xw')->where("id={$id}")->setInc('hits',1);
    	$field=M('xw')->where("id={$id}")->find();

        $field['link'] and redirect($field['link']);
        
    	$this->field=$field;
    	$this->road=findParent($this->cate,$field['classid']);

    
    	$this->pre=M('xw')->where("id < {$field['id']} and classid={$field['classid']}")->order('id desc')->limit(1)->find();


    	$this->next=M('xw')->where("id > {$field['id']} and classid={$field['classid']}")->order('id desc')->limit(1)->find();


    	//标签
    	$this->tagarr=explode('，',$field['tag']);

        //评论
        $comment_list=M('comment')->where("aid={$id}")->order('time asc')->select();
        $this->assign('comment_list',$comment_list);

		$this->display();
		
	}
    public function insertcomment(){
        $res=array(
            'msg'=>'非法提交',
            'status'=>0
            );
        if(!IS_AJAX) {
            echo json_encode($res);
            exit();
        }
        $aid=intval($_POST['aid']);
        if(!$aid) {
            echo json_encode($res);
            exit;
        }
        $content=htmlspecialchars($_POST['content']);
        if(!$content){
            $res['msg']='评论内容没有填写';
            echo json_encode($res);
            exit;
        } 
        $name=htmlspecialchars($_POST['name']);
        if(!$name){
            $res['msg']='您的昵称没有填写';
            echo json_encode($res);
            exit;
        } 
        $data=array(
            'aid'=>$aid,
            'name'=>$name,
            'content'=>$content,
            'time'=>time()
        );
        if(M('comment')->add($data)){
            $res['msg']='感谢您的评论';
            $res['status']=1;
            echo json_encode($res);
            exit;
        }else{
            $res['msg']='评论出错了，检查一下吧';
            echo json_encode($res);
            exit;
        }
    }
    //ajax异步支持反对
    public function ajaxagree(){
         $res=array(
            'msg'=>'非法提交',
            'status'=>0
            );
        if(!IS_AJAX) {
            echo json_encode($res);
            exit();
        }
        $id=intval($_POST['id']);
        $act=$_POST['act'];
        if(!$id){
            echo json_encode($res);
            exit();
        }
        if($_COOKIE['agree'.$id]){
            $res=array(
            'msg'=>'您已经表明态度啦',
            'status'=>0
            );
            echo json_encode($res);
            exit();
        }
        if($act=='disagree'){
            $field="disagreen";
        }else{
            $field='agree';
        }

        if(M('comment')->where("id={$id}")->setInc($field)){
            $res=array(
                'msg'=>'您的反馈已经收到啦',
                'status'=>1
            );
            setcookie('agree'.$id,1,time()+24*3600);
            echo json_encode($res);
        }else{
            $res=array(
                'msg'=>'为什么粗错了呢?',
                'status'=>0
            );
            echo json_encode($res);
        }

    }
	
}