<?php
namespace Home\Model;
use Think\Model;
class LoginModel{
	function userexist($data){
		$user = M(user);
		$isExist = $user->join("dh_inst on dh_inst.inst_no=dh_user.user_inst")->where($data)->find();
		//trace($isExist,"=====.....====","debug",true);
		return $isExist;
	}
}