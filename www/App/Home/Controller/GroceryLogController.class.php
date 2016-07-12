<?php
namespace Home\Controller;
use Think\Controller;
					/*
					日志查询
					2016-6-28
					孙云峰
					*/
					class GroceryLogController  extends CommonController {
					public function index(){//
					// $this->privateJs();
					$this->display();
					} 
					
					public function sumCheck(){
					$data=array();
					$data['giftlog_type']=I('get.giftlog_type','-1');
					$data['inst_gift_code']=I('get.inst_gift_code','-1');
					$data['gift_name']=I('get.gift_name','-1');
					$data['inst_gift_source']=I('get.inst_gift_source','-1');
					$data['begintime']=I('get.begintime','-1');
					$data['endtime']=I('get.endtime','-1');
					$data["province"]='-1';
					$data["city"] = I("get.citys");
					$data["county"] = I("get.countys");
					$data["instno"] = I("get.instno");
					$dhuser = session("dhuser");
					$user_lv=$dhuser['inst_lv'];
					if($user_lv==1){
					$data["province"]=$dhuser['user_inst'];
					}
					if($user_lv==2){
					$data["city"]=$dhuser['user_inst'];
					}
					if($user_lv==3){
					$data["county"]=$dhuser['user_inst'];
					}
					if($user_lv==4){
					$data["instno"]=$dhuser['user_inst'];
					}
					// dump($data["city"]);
					$grocerySuList=D("GroceryLog")->getSuList($data);
					$this->assign("page",$grocerySuList['page']);
					$this->assign("logList",$grocerySuList['result']);
					$this->display();
					}
					
					public function buyCheck(){
					$data=array();
					$data['bgiftlog_type']=I('get.bgiftlog_type','-1');
					$data['bgiftlog_username']=I('get.bgiftlog_username','-1');
					$data['gift_name']=I('get.gift_name','-1');
					$data['bgiftlog_code']=I('get.bgiftlog_code','-1');
					$data['begintime']=I('get.begintime','-1');
					$data['endtime']=I('get.endtime','-1');
					$data["province"]='-1';
					$data["city"] = I("get.citys");
					$data["county"] = I("get.countys");
					$data["instno"] = I("get.instno");
					$dhuser = session("dhuser");
					$user_lv=$dhuser['inst_lv'];
					if($user_lv==1){
					$data["province"]=$dhuser['user_inst'];
					}
					if($user_lv==2){
					$data["city"]=$dhuser['user_inst'];
					}
					if($user_lv==3){
					$data["county"]=$dhuser['user_inst'];
					}
					if($user_lv==4){
					$data["instno"]=$dhuser['user_inst'];
					}
					// dump($data["city"]);
					$groceryBuyList=D("GroceryLog")->getBuyList($data);
					$this->assign("page",$groceryBuyList['page']);
					$this->assign("logList",$groceryBuyList['result']);
					$this->display();
					
					}
					
					public function rvCheck(){
					$data=array();
					$data['rvgiftlog_type']=I('get.rvgiftlog_type','-1');
					$data['gift_name']=I('get.gift_name','-1');
					$data['rvgiftlog_code']=I('get.rvgiftlog_code','-1');
					$data['begintime']=I('get.begintime','-1');
					$data['endtime']=I('get.endtime','-1');
					$data["province"]='-1';
					$data["city"] = I("get.citys");
					$data["county"] = I("get.countys");
					$data["instno"] = I("get.instno");
					$dhuser = session("dhuser");
					$user_lv=$dhuser['inst_lv'];
					if($user_lv==1){
					$data["province"]=$dhuser['user_inst'];
					}
					if($user_lv==2){
					$data["city"]=$dhuser['user_inst'];
					}
					if($user_lv==3){
					$data["county"]=$dhuser['user_inst'];
					}
					if($user_lv==4){
					$data["instno"]=$dhuser['user_inst'];
					}
					// dump($data["city"]);
					$groceryRvList=D("GroceryLog")->getRvList($data);
					$this->assign("page",$groceryRvList['page']);
					$this->assign("logList",$groceryRvList['result']);
					$this->display();
					
					}
					
					public function faCheck(){
					$data=array();
					$data['exgiftlog_type']=I('get.exgiftlog_type','-1');
					$data['gift_name']=I('get.gift_name','-1');
					$data['exgiftlog_code']=I('get.exgiftlog_code','-1');
					$data['exgiftlog_username']=I('get.exgiftlog_username','-1');
					$data['begintime']=I('get.begintime','-1');
					$data['endtime']=I('get.endtime','-1');
					$data["province"]='-1';
					$data["city"] = I("get.citys");
					$data["county"] = I("get.countys");
					$data["instno"] = I("get.instno");
					$dhuser = session("dhuser");
					$user_lv=$dhuser['inst_lv'];
					if($user_lv==1){
					$data["province"]=$dhuser['user_inst'];
					}
					if($user_lv==2){
					$data["city"]=$dhuser['user_inst'];
					}
					if($user_lv==3){
					$data["county"]=$dhuser['user_inst'];
					}
					if($user_lv==4){
					$data["instno"]=$dhuser['user_inst'];
					}
					// dump($data["city"]);
					$groceryFaList=D("GroceryLog")->getFaList($data);
					$this->assign("page",$groceryFaList['page']);
					$this->assign("logList",$groceryFaList['result']);
					$this->display();
					
					}
					
					public function desCheck(){
					$data=array();
					$data['desgiftlog_type']=I('get.desgiftlog_type','-1');
					$data['desgiftlog_username']=I('get.desgiftlog_username','-1');
					$data['gift_name']=I('get.gift_name','-1');
					$data['desgiftlog_code']=I('get.desgiftlog_code','-1');
					$data['begintime']=I('get.begintime','-1');
					$data['endtime']=I('get.endtime','-1');
					$data["province"]='-1';
					$data["city"] = I("get.citys");
					$data["county"] = I("get.countys");
					$data["instno"] = I("get.instno");
					$dhuser = session("dhuser");
					$user_lv=$dhuser['inst_lv'];
					if($user_lv==1){
					$data["province"]=$dhuser['user_inst'];
					}
					if($user_lv==2){
					$data["city"]=$dhuser['user_inst'];
					}
					if($user_lv==3){
					$data["county"]=$dhuser['user_inst'];
					}
					if($user_lv==4){
					$data["instno"]=$dhuser['user_inst'];
					}
					// dump($data["city"]);
					$groceryDeList=D("GroceryLog")->getDeList($data);
					$this->assign("page",$groceryDeList['page']);
					$this->assign("logList",$groceryDeList['result']);
					$this->display();
					}
					
					public function Reasons(){//显示销库原因
					$id['desgiftlog_id']=I("get.id");
					$reason=M('desgiftlog')->where($id)->find();
					$this->assign("reason",$reason['desgiftlog_reason']);
					$this->display();
					}
					public function exCheck(){
					$data=array();
					$data['giftlog_type']=I('get.giftlog_type','-1');
					$data['giftlog_code']=I('get.giftlog_code','-1');
					$data['giftlog_username']=I('get.giftlog_username','-1');
					$data['gift_name']=I('get.gift_name','-1');
					$data['giftlog_source']=I('get.giftlog_source','-1');
					$data['giftlog_vrp_ctf']=I('get.giftlog_vrp_ctf','-1');
					$data['giftlog_ahead']=I('get.giftlog_ahead','-1');
					$data['giftlog_sure']=I('get.giftlog_sure','-1');
					$data['begintime']=I('get.begintime','-1');
					$data['endtime']=I('get.endtime','-1');
					$data["province"]='-1';
					$data["city"] = I("get.citys");
					$data["county"] = I("get.countys");
					$data["instno"] = I("get.instno");
					$dhuser = session("dhuser");
					$user_lv=$dhuser['inst_lv'];
					if($user_lv==1){
					$data["province"]=$dhuser['user_inst'];
					}
					if($user_lv==2){
					$data["city"]=$dhuser['user_inst'];
					}
					if($user_lv==3){
					$data["county"]=$dhuser['user_inst'];
					}
					if($user_lv==4){
					$data["instno"]=$dhuser['user_inst'];
					}
					// dump($data["city"]);
					$groceryExList=D("GroceryLog")->getExList($data);
					$this->assign("page",$groceryExList['page']);
					$this->assign("logList",$groceryExList['result']);
					$this->display();
					}
					
					public function showEx(){
					$id['giftlog_id']=I("get.id");
					$data['giftlog_vrp_ctf']=I("get.ctf");
					$data['giftlog_time']=I("get.time");
					// dump($data);
					// $data['giftlog_id']=I("get.id");
					$grocerySList=D("GroceryLog")->getSingleList($id);
					$groceryAList=D("GroceryLog")->getAlist($data);
					$this->assign("List",$grocerySList);
					$this->assign("ListA",$groceryAList);
					$this->display();
					
					}
					
					
					
					}