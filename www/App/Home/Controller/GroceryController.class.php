<?php
namespace Home\Controller;
use Think\Controller;
							class GroceryController extends CommonController {
							/* 
							库存初始化页面 
							孙云峰
							*/
							public function index(){
							$data=array();
							$data['giftlog_type']=I('get.giftlog_type','-1');
							$data['inst_gift_source']=I('get.inst_gift_source','-1');
							$data['gift_name']=I('get.gift_name','-1');
							$data['inst_gift_code']=I('get.inst_gift_code','-1');
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
							$grocery=D("Grocery")->getGroceryList($data);
							$this->assign("grocerylist",$grocery['result']);
							$this->assign("page",$grocery['page']);
							$this->assign("instselect",$grocery[0]);
							$this->display();
							}
							
							/* 
							库存销库页面
							孙云峰
							*/
							public function destroyview(){
							
							$id['id']=I('get.id');
							$groceryList=D(Grocery)->getListById($id);
							$this->assign("groceryList",$groceryList);
							$this->privateJs();
							// dump($groceryList);
							$this->display();
							}
							/* 
							库存销库处理
							孙云峰
							*/
							public function destroyAction(){
							
							$id['id']=I("post.id");
							// dump(I('post.desgiftlog_num'));
							
							$groceryDes=D(Grocery)->groceryDes($id);
							if($groceryDes){
							$this->success("操作成功！",U("/Home/Grocery/index"));
							}else{
							$this->error("操作失败！",U("/Home/Grocery/index"));
							}
							}
							/* 
							分发页面
							孙云峰
							*/
							public function fenview(){
							$id['id']=I('get.id');
							$groceryList=D(Grocery)->getListById($id);
							$this->assign("groceryList",$groceryList);
							$this->privateJs();
							$this->display();
							}
							/* 
							分发处理
							孙云峰===================================
							*/
							public function fenAction(){
							$id['id']=I("post.id");
							$groceryFens=D(Grocery)->groceryFen($id);
							if($groceryFens){
							$this->success("操作成功！",U("/Home/Grocery/index"));
							}else{
							$this->error("操作失败！",U("/Home/Grocery/index"));
							}
							
							}
							/* 
							礼品新增页面（已拥有该种商品）
							孙云峰===================================
							*/
							public function addHview(){
							$id['id']=I('get.id');
							$groceryList=D(Grocery)->getListById($id);
							$this->assign("groceryList",$groceryList);
							$this->privateJs();
							$this->display();
							}
							/* 
							礼品新增处理（已拥有该种商品）
							孙云峰===================================
							*/
							public function addHAction(){
							$id['id']=I("post.id");
							$groceryAddHa=D(Grocery)->groceryAddH($id);
							if($groceryAddHa){
							$this->success("操作成功！",U("/Home/Grocery/index"));
							}else{
							$this->error("操作失败！",U("/Home/Grocery/index"));
							}
							}
							/* 
							礼品新增页面（没有该种商品）
							孙云峰===================================
							*/
							public function addNview(){
							$this->privateJs();
							$this->display();
							}
							/* 
							ajax查询礼品
							孙云峰===================================
							*/
							public function getGift(){
							// $instno = I("get.instno");
							$code = I("get.code");
							echo json_encode(getGifts($code));
							}
							
							public function getGiftInst(){
							$instno = I("get.instno");
							$code = I("get.code");
							echo json_encode(getGiftsInst($instno,$code));
							}
							
							/* 
							礼品新增处理（新商品）
							孙云峰===================================
							*/
							public function addNAction(){
							$groceryAddNa=D(Grocery)->groceryAddN();
							if($groceryAddNa){
							$this->success("操作成功！",U("/Home/Grocery/index"));
							}else{
							$this->error("操作失败！",U("/Home/Grocery/index"));
							}
							
							
							}
							
							
							
							
							
							
							}