<?php
namespace Home\Controller;
use Think\Controller;
				class GrateController extends CommonController{
				public function index(){
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
				$list=D('Grate')->getGrateList($data);
				$this->assign("list",$list['result']);
				$this->assign("page",$list['page']);
				$this->display();
				}
				
				public function modiview(){
				$id=I('get.id');
				$grate=I('get.grate');
				$name=I('get.name');
				$nowinst['user_inst']=session("dhuser.user_inst");
				$nowname=session("dhuser.user_name");
				$user=M("user");
				$userlist=$user
				->join("left join dh_inst on dh_user.user_inst=dh_inst.inst_no")
				->where($nowinst)
				->find();
				$inst_name=$userlist['inst_name']."->".$nowname;
				$this->assign("id",$id);
				$this->assign("modiuser",$inst_name);
				$this->assign("grate",$grate);
				$this->assign("name",$name);
				$this->display();
				
				}
				
				public function modi(){
				$result=D(Grate)->modify();
				if($result){
				$this->success("操作成功！",U("/Home/Grate/index"));
				}else{
				$this->error("操作失败！",U("/Home/Grate/index"));
				}
				
				}
				
				
				}