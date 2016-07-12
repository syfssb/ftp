<?php
namespace Home\Controller;
use Think\Controller;
			class ExController extends CommonController{
			public function index(){
			// $giftname['gift_name']=array('like',"%".I('get.gift_name','')."%");
			
			$ctf=I("post.vrp_ctf");
			if($ctf!=""){
			$listFirst=D(Ex)->getFirst($ctf);
			$this->assign("vrplist",$listFirst);
			}
			$this->privateJs();
			$this->display();
			}
			/*
			兑换礼品展示
			*/
			public function duiShow(){
			
			$ctf=I("get.ctf");
			$fen=I("get.fen");
			$name=I("get.name");
			$GiftList=D(Ex)->getGiftListA($fen);
			$this->assign("ctf",$ctf);
			$this->assign("fen",$fen);
			$this->assign("name",$name);
			$this->assign("list",$GiftList['data']);
			$this->assign("nowgrate",$GiftList['grate']);
			$this->privateJs();
			$this->display();
			
			}
			
			public function duiAction(){
			$graocrydata=I('post.graocrydata');
			$gracelog=I("post.gracelog");
			// dump($graocrydata);
			// dump($gracelog);
			$result=D(Ex)->doneDui($graocrydata,$gracelog);
			if($result){
			$this->success("操作成功!!","/Home/Ex/index");
			}else{
			$this->error("操作失败!!","/Home/Ex/index");
			}
			
			}
			
			/**
			* 提前兑换初始化页面
			* @author 孙云峰 2016-7-4
			*/
			public function ahead_Ex(){
			$ctf=I("post.vrp_ctf");
			if($ctf!=""){
			$listFirst=D(Ex)->getAheadFirst($ctf);
			$this->assign("vrplist",$listFirst);
			}
			$this->privateJs();
			$this->display();
			
			}
			/**
			 * 提前兑换商品页面
			 * @author [孙云峰 2016-7-4
			 */
			public function aheadShow(){
			$ctf=I("post.ctf");
			$name=I("post.name");
			$sql=I("post.sql");
			// dump($ctf);
			$fen=100000000;
			$GiftList=D(Ex)->getHGiftListA();
			$time=date("Y-m-d H:i:s");
			$sql=str_replace("giftlog_time",$time,$sql);
			// dump($sql);
			$this->assign("ctf",$ctf);
			$this->assign("sql",$sql);
			$this->assign("fen",$fen);
			$this->assign("time",$time);
			$this->assign("name",$name);
			$this->assign("list",$GiftList['data']);
			$this->assign("nowgrate",$GiftList['grate']);
			$this->privateJs();
			$this->display();
			}

			/**
			 * ajax获取所有的业务类别
			 * @author 孙云峰 2016-7-4
			 * @return [json] [业务类别信息]
			 */
			public function getActive(){
				$list=get_actives();
				echo json_encode($list);

			}
			/**
			 * ajax获取所有的业务类别根据名称
			 * @author 孙云峰 2016-7-11
			 * @return [json] [业务类别信息]
			 */
		     public function getActiveByname()
			{
				$name=I('get.activename','');
				$list=get_activesByName($name);
				echo json_encode($list);
			}
			/**
			 * 提前兑换处理
			 * @author 孙云峰 2016-7-4 19:04
			 */
			public function duiHAction(){
			$graocrydata=I('post.graocrydata');
			$gracelog=I("post.gracelog");
			$aheadlog=I("post.aheadlog");
			$result=D(Ex)->doneADui($graocrydata,$gracelog,$aheadlog);
			if($result){
			$this->success("操作成功!!","/Home/Ex/ahead_Ex");
			}else{
			$this->error("操作失败!!","/Home/Ex/ahead_Ex");
			}
			}
			
			
			
			
			
			}