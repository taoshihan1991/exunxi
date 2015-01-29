<?php
// 前台公共类
class CommonAction extends Action {
     public $cate;
     public $cid;
     public $id;
     public function _initialize(){

     	//网站标题等
     
     $web=F('web'); 
      if(!$cate){
          $web=M('setup')->where("id=1")->find();
         F('web',$web); 
      }
     	$this->webtitle=$web['title'];
     	$this->webkey=$web['keywords'];
     	$this->webdesc=$web['descriptions'];
      $this->webnotice=$web['notice'];

     	//文章栏目
      $this->cid=I('get.cid');
      $this->id=I('get.id');
     	$field=array(
     		'id','classname','topid'
     	);
     	
      $cate=F('cate'); 
      if(!$cate){
         $cate=M('xwclass')->field($field)->select();
         F('cate',$cate); 
      }
     	$this->cate=$cate;

      if($id){
              $cid=M('xw')->where("id={$id}")->getField('classid');
              $this->cid=$cid;
      }
      $currentClassid=findPra($cate,isset($cid) ? intval($cid) : '');

  
      $nav=array();
     	for($i=0;$i<count($cate);$i++){
               if($cate[$i]['topid']==0){
                    if($cate[$i]['id']==$currentClassid){
                         $nav[$i]['cur']=1;
  
                    }else{
                         $nav[$i]['cur']=0;
                    }
                    $nav[$i]['classname']=$cate[$i]['classname'];
                     $nav[$i]['id']=$cate[$i]['id'];
               }
     		
     		
     	}
     	$this->nav=$nav;

     	$this->channel=!empty($this->cid) ? M('xwclass')->where("id={$this->cid}")->find() : '';






          //友情链接
          $link=F('link');
          if(!$link){
            $this->link=M('link')->field('id,title,link')->select();
            F('link',$link); 
          }
          



    }

	 
}