<?php
namespace Home\Controller;
use Think\Controller;
						class ActiveController extends CommonController{
						/**index 
						* @author 孙云峰 
						*/
						public function index(){
						// $actives_name['actives_name']=I("get.actives_name");
						$actives_name['actives_name']=array('like',"%".I("get.actives_name","")."%");
						$count=M("actives")->where($actives_name)->count();
						$pageSize = 5;
						$page = new \Think\Page($count , $pageSize);
						$page->setConfig('first','首页');
						$page->setConfig('prev','上一页');
						$page->setConfig('next','下一页');
						$page->setConfig('last','尾页');
						$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pageSize.' 条/页 共 %TOTAL_ROW% 条)');
						$list=M("actives")->where($actives_name)->limit($page->firstRow.','.$page->listRows)->select();
						$this->assign("list",$list);
						$this->assign("page",$page->show());
						$this->display();
						
						
						}
						
						public function addActive(){
						$this->privateJs();
						$this->display();
						}
						
						public function addDoActive(){
						$data['actives_name']=I("post.actives_name");
						$active=M("actives");
						$add=$active->add($data);
						if($add){
						$this->success("操作成功！","/Home/Active/index");
						}else{
						$this->error("操作失败！","/Home/Active/index");
						}
						// $this->display();
						}
						
						public function getAname(){
						$name['actives_name']=I("get.name");
						echo json_encode(getAnames($name));
						
						}
						
						public function ModiActive(){
						$id["actives_id"]=I("get.id");
						$active=M("actives");
						$list=$active->where($id)->find();
						$this->privateJs();
						$this->assign("list",$list);
						$this->display();
						}
						
						public function MoDoActive(){
						// $data['actives_id']=I('post.actives_id');
						// $data['actives_name']=I("post.actives_name");
						$active=M("actives");
						if($active->create()){
						$modi=$active->save();
						if($modi){
						$this->success("操作成功！","/Home/Active/index");	
						}else{
						$this->error("操作失败！","/Home/Active/index");
						
						}
						}else{
						$this->error("操作失败！","/Home/Active/index");
						}
						}
						
						public function desActive(){
						$data['actives_id']=I("get.id");
						$active=M("actives");
						$del=$active->where($data)->delete();
						if($del){
						$this->success("操作成功！","/Home/Active/index");	
						}else{
						$this->error("操作失败！","/Home/Active/index");
						
						}
						
						
						}
						
						
						
						
						}