<?php
// 首页
class IndexAction extends CommonAction {
    public function index(){
    	 //所有栏目
    	 $cate=$this->cate;
         $model_xw=M('xw');
    	//最新文章
    	$where=array(
    		'state'=>1
    	);
    	$newlist=$model_xw->where($where)->field('title,id')->limit(0,10)->order("time desc")->select();
    	$this->assign('newlist',$newlist);
    	$newlist2=$model_xw->where($where)->field('title,id')->limit(10,20)->order("time desc")->select();
    	$this->assign('newlist2',$newlist2);

        //最新整理书架
        $model_bookcase=M('Bookcase');
        $this->bookcase_new=$model_bookcase->limit(10)->order('sort asc,updatetime desc')->select();

    	//置顶文章
        $aids=M('xw_attr')->where("attr_id=1")->limit(2)->order('aid desc')->getField("aid",true);
    	$where=array(
    		'id'=>array('in',$aids),
    	);
    	$zdlist=M('xw')->table("tg_xw a")->where($where)->field('id,title')->limit(2)->order("id desc")->select();
    	$this->assign('zdlist',$zdlist);

        /*排行统计*/
        $this->rank();
        /*推荐滚动*/
        $this->recMarquee();
        /*书架导航*/
        $this->bookGuide();

        $this->display();
    }
    /*书架导航*/
    public function bookGuide(){
        $model_bookcase=M('Bookcase');
        $bookcase=$model_bookcase->order('sort asc,updatetime desc')->select();
        $this->assign('bookcase',$bookcase);
    }
    /*推荐滚动*/
    public function recMarquee(){
        $aids=M('xw_attr')->where("attr_id=2")->limit(15)->order('aid desc')->getField("aid",true);
        $where=array(
            'id'=>array('in',$aids),
        );
        $reclist=M('xw')->table("tg_xw a")->where($where)->field('id,title,pic1')->order("id desc")->select();
        $this->assign('reclist',$reclist);
    }
    /*排行统计*/
    public function rank(){
        $model_xw=M('xw');
        $model_ranking=M('ranking');

        /*总排行*/
        $all=$model_ranking->field("sum(hits) as num,aid")->limit(10)->group("aid")->order("num desc")->select();
        $aids=array();
        foreach($all as $v){$aids[]=$v['aid'];}
        $where=array('id'=>array('in',$aids));
        $order="FIND_IN_SET(id,'".implode(',', $aids)."')";

        $all_list=$model_xw->where($where)->field("id,title,time,pic1,content")->order($order)->select();
        foreach ($all_list as $key => $v) {
            $all_list[$key]['content']=msubstr(strip_tags($v['content']),0,50);
        }
        $this->assign('all_list',$all_list);

        /*周排行*/
        $all=$model_ranking->field("sum(hits) as num,aid")->limit(10)->where("week(date)=week(now())")->group("aid")->order("num desc")->select();
        $aids=array();
        foreach($all as $v){$aids[]=$v['aid'];}
        $where=array('id'=>array('in',$aids));
        $order="FIND_IN_SET(id,'".implode(',', $aids)."')";

        $week_list=$model_xw->where($where)->field("id,title,time,pic1,content")->order($order)->select();
        foreach ($week_list as $key => $v) {
            $week_list[$key]['content']=msubstr(strip_tags($v['content']),0,50);
        }
        $this->assign('week_list',$week_list);

        /*周排行*/
        $all=$model_ranking->field("sum(hits) as num,aid")->limit(10)->where("month(date)=month(now())")->group("aid")->order("num desc")->select();
        $aids=array();
        foreach($all as $v){$aids[]=$v['aid'];}
        $where=array('id'=>array('in',$aids));
        $order="FIND_IN_SET(id,'".implode(',', $aids)."')";

        $month_list=$model_xw->where($where)->field("id,title,time,pic1,content")->order($order)->select();
        foreach ($month_list as $key => $v) {
            $month_list[$key]['content']=msubstr(strip_tags($v['content']),0,50);
        }
        $this->assign('month_list',$week_list);

    }
}