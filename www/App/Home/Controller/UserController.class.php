<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController{
	//用户信息查询
	public function index(){
		$user=D('user');
        $instlv = session('dhuser.inst_lv');
		$instno = session('dhuser.user_inst');
        if($instlv==1){
			if(I('post.instnoo')==-1){
				$data['user_inst']=array('like',"%%");
			}else{
				$data['user_inst']=array('like',"%".I('post.instnoo','')."%");
			}
            $data['user_name']=I('post.username');
            $userlist=$user->getList($data,$instno);
			$this->assign("userlist",$userlist['userlist']);
            $this->assign("page",$userlist['page']);
        }elseif($instlv==2){
            if(I('post.instnoo')==-1){
				$data['user_inst']=array('like',"%%");
			}else{
				$data['user_inst']=array('like',"%".I('post.instnoo','')."%");
			}
            $data['user_name']=I('post.username');
            $userlist=$user->getList($data,$instno);
            $this->assign("userlist",$userlist['userlist']);
			$this->assign("page",$userlist['page']);
        }else{
            if(I('post.instnoo')==-1){
				$data['user_inst']=array('like',"%%");
			}else{
				$data['user_inst']=array('like',"%".I('post.instnoo','')."%");
			}
            $data['user_name']=I('post.username');
            $userlist=$user->getList($data,$instno);
            $this->assign("userlist",$userlist['userlist']);
			$this->assign("page",$userlist['page']);
        }
		$this->display();
	}
	
	//用户添加页面
	public function userAdd(){
		$this->display();
	}
	
	//用户名验证
	public function getuname(){
		$username = I("get.username");
		$is_uname = M('user')->where("user_name='".$username."'")->select();
		echo json_encode($is_uname);
	}
	
	//用户添加
	public function user_Add(){
		$User = M('user');
		$data['user_inst'] = I('post.instnoo');
		$data['user_name'] = I('post.user_name');
		$data['user_pwd'] = md5(I('post.user_pwd'));
		$result = $User->add($data);
		if($result){
			$this->success("用户添加成功！",U("/Home/User/index"));
		}else{
			$this->error("用户添加失败！",U("/Home/User/index"));
		}
	}
	
	//用户修改页面
	public function userModify(){
		$userid = I('get.userid');
		$userinfo = M('user')->where("user_id='".$userid."'")->find();
		//echo "<pre>";print_r($userinfo);die;
		$this->assign("userinfo",$userinfo);
		$this->display();
	}
	
	//用户修改
	public function user_Modify(){
		$User = M('user');
		$userid = I('post.user_id');
		$data['user_name'] = I('post.user_name');
		$data['user_pwd'] = md5(I('post.user_pwd'));
		//echo "<pre>";print_r($data);die;
		$update = $User->where("user_id='".$userid."'")->save($data);
		if($update){
			$this->success("用户修改成功！",U("/Home/User/index"));
		}else{
			$this->error("用户修改失败！",U("/Home/User/index"));
		}
	}
	
	//用户删除
	public function user_del(){
		$User = M('user');
		$userid = I('get.userid');
		//echo "<pre>";print_r($userid);die;
		$del = $User->where("user_id='".$userid."'")->delete();
		if($del){
			$this->success("用户删除成功！",U("/Home/User/index"));
		}else{
			$this->error("用户删除失败！",U("/Home/User/index"));
		}
	}
}
