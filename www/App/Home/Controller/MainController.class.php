<?php
namespace Home\Controller;
use Think\Controller;
		class MainController extends CommonController{
		public function index(){
		
		// $dhuser=session('dhuser');
		// I("get.username");
		// $this->assign("userName",$dhuser['user_name']);
		$this->display();
		}
		}
