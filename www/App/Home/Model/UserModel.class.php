<?php
namespace Home\Model;
use Think\Model;
class UserModel {
	function getList($data,$instno){
		$arr = array();
	    foreach($data as $key=>$val){
	        if($val==null||$val==""){
	            continue;
	        }
	        $arr[$key]= $val;
	    }
	    $arr['_logic'] = 'AND';
	    $user=M('user');
        $usercount = $user->join("dh_inst on dh_inst.inst_no=dh_user.user_inst AND dh_inst.inst_per={$instno}")->field('user_id,user_inst,user_name')->where($arr)->select();
		$count=count($usercount);
		$pageSize = 10;
		$page = new \Think\Page($count , $pageSize);
		$page->setConfig('first','首页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('last','尾页');
		$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pageSize.' 条/页 共 %TOTAL_ROW% 条)');
            
	    $userlist = $user->join("dh_inst on dh_inst.inst_no=dh_user.user_inst AND dh_inst.inst_per={$instno}")->field('user_id,user_inst,user_name')->where($arr)->limit($page->firstRow,$page->listRows)->select();
        return  array('userlist'=>$userlist,'page'=>$page->show());
	}
}