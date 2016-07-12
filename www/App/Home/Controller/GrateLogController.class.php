<?php
namespace Home\Controller;
use Think\Controller;
			class GrateLogController extends CommonController{
			public function index(){
			$data['begintime']=I('get.begintime','-1');
			$data['endtime']=I('get.endtime','-1');
			$data["city"] = I("get.citys");
			$data["county"] = I("get.countys");
			$data["instno"] = I("get.instno");
			$lv = session("dhuser.inst_lv");
			$instno = session("dhuser.user_inst");
			if($lv==2){
			$data["city"]=$instno;
			}else if($lv==3){
			$data["county"]=$instno;
			}else if($lv==4){
			$data["instno"]=$instno;
			}
			$list=D('GrateLog')->getGrateLogList($data);
			$this->assign("List",$list['result']);
			$this->assign("page",$list['page']);
			$this->display();
			}
			
			
			
			
			}