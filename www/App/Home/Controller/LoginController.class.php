<?php
namespace Home\Controller;
use Think\Controller;
			class LoginController extends Controller{
			function index(){
			layout(false);
			$this->display();
			}
			public function login(){
			
			
			$data["user_name"] = I("username");
			
			$data["user_pwd"] = md5(I("password"));
			trace($data,"========================","DEBUG",TRUE);
			$isExist = D(Login)->userexist($data);
			if($isExist){
			session("dhuser",$isExist);
			$this->success("登陆成功",U("/Home/Main/index"));
			}else{
			$this->error("用户名或密码错误",U("/Home/Login/index"));
			}
			}
			public function outLogin(){
			
			session(null);
			$this->redirect("/Home/Login/index");
			}
			}
			
