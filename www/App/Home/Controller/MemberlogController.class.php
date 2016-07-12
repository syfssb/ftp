<?php
namespace Home\Controller;
use Think\Controller;
class MemberlogController extends CommonController{
	//会员修改日志查询页面
	public function index(){
		
		$data['where'] = "where 1=1";
		
		$data['where'].=" and vrpchange_log_inst like '%".I('post.memberlog_inst','')."%'";
		
        $data['where'].=" and vrpchange_log_type like '%".I('post.memberlog_type','')."%'";
		
		$data['where'].=" and vrpchange_log_ctf like '%".I('post.memberlog_ctf','')."%'";
		
		$user_lv = session("dhuser.inst_lv");
		if($user_lv==2){
			$city=session('dhuser.user_inst');
			$data['where'].=" and city=".$city;
		}
		if($user_lv==3){
			$county=session('dhuser.user_inst');
			$data['where'].=" and county=".$county;
		}
		if($user_lv==4){
			$instno=session('dhuser.user_inst');
			$data['where'].=" and instno.inst_no=".$instno;
		}
		
		$memberlog_list = D('Memberlog')->MemberlogList($data);
		
		$this->assign('memberlog_list',$memberlog_list['result']);
		$this->assign('page',$memberlog_list['page']);
		$this->display();
	}
	
	//会员修改日志详情页面
	public function MemberlogDetail(){
		$vrpchange_log_id = I("get.vrpchange_log_id");
		$memberlog_detail = M('vrpchange_log')->where("vrpchange_log_id='".$vrpchange_log_id."'")->find();
		$this->assign('memberlog_detail',$memberlog_detail);
		$this->display();
	}
}
