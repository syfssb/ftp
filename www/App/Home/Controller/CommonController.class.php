<?php
namespace Home\Controller;
use Think\Controller;
				class CommonController extends Controller{
				public function __construct(){
				parent::__construct();
				$dhuser = session("dhuser");
				// dump(session('dhuser'));
				if(!$dhuser){
				$this->redirect("/Home/Login/index");
				}else{
				
				if($dhuser['inst_lv']==4){//如果网点登录，查询该网点的所属市
				$instno=$dhuser['user_inst'];
				$sqlpp=<<<SQL
				SELECT inst_per FROM dh_inst WHERE inst_no IN
				(SELECT inst_per FROM dh_inst WHERE inst_no=$instno )
SQL;
				$upper=M()->query($sqlpp);
				session("upper",$upper[0]['inst_per']);
				$this->assign("upper",$upper[0]['inst_per']);
				
				}
				
				
				$this->assign("instno",$dhuser['user_inst']);
				$this->assign("instlv",$dhuser['inst_lv']);
				$this->assign("userName",$dhuser['user_name']);
				}}
			
				
				
				protected function privateJs(){
				$path = "/Public/".MODULE_NAME.'/js/'.CONTROLLER_NAME.'/'.ACTION_NAME.".js";
				$this->assign("path",$path);
				}
				
				
				}