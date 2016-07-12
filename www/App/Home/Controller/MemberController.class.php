<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends CommonController{
	//会员信息查询页面
	public function index(){
		$vrpctf = trim(I('post.mb_ctf'));
		$data['where'] = "where 1=1";
		$data['where'].=empty($vrpctf)?"":" and vrp_ctf='".I('post.mb_ctf')."'";
        $data['where'].=" and vrp_phone like '%".I('post.mb_phone','')."%'";
		$data['where'].=" and vrp_name like '%".I('post.mb_name','')."%'";
		$data['where'].=" and vrp_lv like '%".I('post.mb_lv','')."%'";
		$data['where'].=" and vrp_type like '%".I('post.mb_type','')."%'";
		$data['where'].=" and vrp_xstate like '%".I('post.mb_xstate','')."%'";
		$data["city"] = I("post.citys");
		$data["county"] = I("post.countys");
		$data["instno"] = I("post.instno");
		$user_lv = session("dhuser.inst_lv");
		if($user_lv==2){
			$data["city"]=session('dhuser.user_inst');
		}
		if($user_lv==3){
			$data["county"]=session('dhuser.user_inst');
		}
		if($user_lv==4){
			$data["instno"]=session('dhuser.user_inst');
		}
		$vrplist=D('Member')->getVrpList($data);
		$this->assign("vrplist",$vrplist['result']);
		$this->assign("page",$vrplist['page']);
		$this->display();
	}
	
	//导出会员信息
	public function exportvrpinfo(){//print_r(I('post.'));
		$data['where'] = "where 1=1";
		$data['where'].=" and vrp_ctf like '%".I('post.mb_ctf','')."%'";
        $data['where'].=" and vrp_phone like '%".I('post.mb_phone','')."%'";
		$data['where'].=" and vrp_name like '%".I('post.mb_name','')."%'";
		$data['where'].=" and vrp_lv like '%".I('post.mb_lv','')."%'";
		$data['where'].=" and vrp_type like '%".I('post.mb_type','')."%'";
		$data['where'].=" and vrp_xstate like '%".I('post.mb_xstate','')."%'";
		$data["city"] = I("post.citys");
		$data["county"] = I("post.countys");
		$data["instno"] = I("post.instno");
		$user_lv = session("dhuser.inst_lv");
		if($user_lv==2){
			$data["city"]=session('dhuser.user_inst');
		}
		if($user_lv==3){
			$data["county"]=session('dhuser.user_inst');
		}
		if($user_lv==4){
			$data["instno"]=session('dhuser.user_inst');
		}
		
		$vrplist=D('Member')->getVrpList($data);
		$str_title = "姓名,身份证号,所属网点,电话,客户级别,地址,客户属性,信用状态,会员状态";
		$titles = explode(",",$str_title);
		$statistic = $vrplist['result'];
		$filename="会员信息";
		local_excel_export($titles,$statistic,$filename);
	}
	
	//会员详情页面
	public function vrpDetail(){
		$vrp_ctf = I("get.vrp_ctf");
		$vrpdetails = M('vrp')->field('vrp_name,vrp_inst,vrp_phone,vrp_lv,vrp_address,vrp_type,vrp_xstate,vrp_state')->where("vrp_ctf='".$vrp_ctf."'")->find();
		$this->assign("vrpdetails",$vrpdetails);
		$this->display();
	}
	
	//会员信息修改页面
	public function vrpModify(){
		$vrp_ctf = I("get.vrp_ctf");
		$vrpinfo = M('vrp')->field('vrp_ctf,vrp_phone,vrp_lv,vrp_address,vrp_type')->where("vrp_ctf='".$vrp_ctf."'")->find();
		$this->assign("vrpinfo",$vrpinfo);
		$this->display();
	}
	
	//会员信息修改
	public function vrp_Modify(){
		$Member = D('Member');
		$vrp_phone = I('post.vrp_phone');
        $data1['vrp_phone'] = I('post.mb_phone');
		$data1['vrp_lv'] = I('post.mb_lv');
		$data1['vrp_address'] = I('post.mb_address');
		$data1['vrp_type'] = I('post.mb_type');
		$data2["vrpchange_log_inst"]=session('dhuser.user_inst');
		$data2["vrpchange_log_username"]=session('dhuser.user_name');
		$data2['vrpchange_log_ctf'] = I("post.vrp_ctf");
		$data2['vrpchange_log_time'] = date('Y-m-d H:i:s',time());
		$data2['vrpchange_log_type'] = "普通修改";
		if($vrp_phone==$data1['vrp_phone']){
			$data2['vrpchange_log_phone'] = $data1['vrp_phone'];
		}else{
			$data2['vrpchange_log_phone'] = $vrp_phone."->".$data1['vrp_phone'];
		}
		$data2['vrpchange_log_address'] = $data1['vrp_address'];
		$data2['vrpchange_log_lv'] = $data1['vrp_lv'];
		$data2['vrpchange_log_vrptype'] = $data1['vrp_type'];
		$res = $Member->vrpModify($data1,$data2);
		if($res){
			$this->success("修改成功！",U("/Home/Member/index"));
		}else{
			$this->error("修改失败！",U("/HomeMember/index"));
		}
	}
	
	//身份证号验证
	public function getidnum(){
		$IDnum = I("get.IDnum");
		$is_IDnum = M('vrp')->where("vrp_ctf='".$IDnum."'")->select();
		echo json_encode($is_IDnum);
	}
	
	//会员新增页面
	public function vrpAdd(){
		$userinst=session('dhuser.user_inst');
		$this->assign('userinst',$userinst);
		$this->display();
	}
	
	//会员新增
	public function vrp_Add(){//echo "233";die;
		$vrp = M('vrp');
		$data['vrp_inst'] = I('post.mb_inst');
		$data['vrp_name'] = I('post.mb_name');
		$data['vrp_ctf'] = I('post.mb_ctf');
		$data['vrp_phone'] = I('post.mb_phone');
		$data['vrp_lv'] = I('post.mb_lv');
		$data['vrp_address'] = I('post.mb_address');
		$data['vrp_type'] = I('post.mb_type');
		$data['vrp_xstate'] = I('post.mb_xstate');
		$data['vrp_state'] = I('post.mb_state');
		$result = $vrp->add($data);
		if($result){
			$this->success("会员添加成功！",U("/Home/Member/index"));
		}else{
			$this->error("会员添加失败！",U("/Home/Member/index"));
		}
	}
	
	//会员停用页面
	public function vrpDisable(){
		$vrpdisable_ctf = I('get.vrp_ctf');
		$this->assign('vrpdisable_ctf',$vrpdisable_ctf);
		$this->display();
	}
	
	//会员停用
	public function vrp_Disable(){
		$Member = D('Member');
		$data["vrpchange_log_inst"]=session('dhuser.user_inst');
		$data["vrpchange_log_username"]=session('dhuser.user_name');
		$data['vrpchange_log_ctf'] = I("post.vrpdisable_ctf");
        $data['vrpchange_log_reason'] = I('post.disable_reason');
		$res = $Member->vrpDisable($data);
		if($res){
			$this->success("会员停用成功！",U("/Home/Member/index"));
		}else{
			$this->error("会员停用失败！",U("/Home/Member/index"));
		}
	}
	
	//会员开启页面
	public function vrpOpen(){
		$vrpopen_ctf = I('get.vrp_ctf');
		$this->assign('vrpopen_ctf',$vrpopen_ctf);
		$this->display();
	}
	
	//会员开启
	public function vrp_Open(){
		$Member = D('Member');
		$data["vrpchange_log_inst"]=session('dhuser.user_inst');
		$data["vrpchange_log_username"]=session('dhuser.user_name');
		$data['vrpchange_log_ctf'] = I("post.vrpopen_ctf");
        $data['vrpchange_log_reason'] = I('post.open_reason');
		$res = $Member->vrpOpen($data);
		if($res){
			$this->success("会员开启成功！",U("/Home/Member/index"));
		}else{
			$this->error("会员开启失败！",U("/Home/Member/index"));
		}
	}
}
