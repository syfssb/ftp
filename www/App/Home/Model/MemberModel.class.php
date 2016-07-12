<?php
namespace Home\Model;
use Think\Model;
class MemberModel {
	//获取会员信息列表
	function getVrpList($data){
		$where=$data['where'];
		if($data["city"]&&$data["city"]!="-1"){
			$where .= " and city=".$data["city"];
		}
		 if($data["county"]&&$data["county"]!="-1"){
			$where .= " and county=".$data["county"];
		}
		 if($data["instno"]&&$data["instno"]!="-1"){
			$where .= " and instno.inst_no=".$data["instno"];
		}
		$sql = "select dh_vrp.* FROM `dh_vrp` left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno on instno.inst_no = dh_vrp.vrp_inst $where";
		
		$countsql="select count(*) FROM `dh_vrp` left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno on instno.inst_no = dh_vrp.vrp_inst $where";
		
		$vrplist = pageList($countsql,$sql);
		return $vrplist;
	}
	
	//会员信息修改、生成日志
	function vrpModify($data1,$data2){
		$vrp = M('vrp');
		$vrpchange_log = M('vrpchange_log');
		$vrp_ctf = $data2['vrpchange_log_ctf'];
		$vrp->startTrans();
		$vrpmodify = $vrp->where("vrp_ctf='".$vrp_ctf."'")->save($data1);
		$vrpmodify_log = $vrpchange_log->add($data2);
		if($vrpmodify && $vrpmodify_log){
			$vrp->commit();
			return true;
		}else{
			$vrp->rollback();
			return false;
		}
	}
	
	//会员停用、生成日志
	function vrpDisable($data){
		$vrp = M('vrp');
		$vrpchange_log = M('vrpchange_log');
		$vrpdisable_ctf = $data['vrpchange_log_ctf'];
		$vrp_state['vrp_state'] = "停止";
		$data['vrpchange_log_time'] = date('Y-m-d H:i:s',time());
		$data['vrpchange_log_type'] = "停止";
		$data['vrpchange_log_state'] = "停止";
		$vrp->startTrans();
		$vrpdisable = $vrp->where("vrp_ctf='".$vrpdisable_ctf."'")->save($vrp_state);
		$vrpdisable_log = $vrpchange_log->add($data);
		if($vrpdisable && $vrpdisable_log){
			$vrp->commit();
			return true;
		}else{
			$vrp->rollback();
			return false;
		}
	}
	
	//会员停用、生成日志
	function vrpOpen($data){
		$vrp = M('vrp');
		$vrpchange_log = M('vrpchange_log');
		$vrpopen_ctf = $data['vrpchange_log_ctf'];
		$vrp_state['vrp_state'] = "开启";
		$data['vrpchange_log_time'] = date('Y-m-d H:i:s',time());
		$data['vrpchange_log_type'] = "开启";
		$data['vrpchange_log_state'] = "开启";
		$vrp->startTrans();
		$vrpopen = $vrp->where("vrp_ctf='".$vrpopen_ctf."'")->save($vrp_state);
		$vrpopen_log = $vrpchange_log->add($data);
		if($vrpopen && $vrpopen_log){
			$vrp->commit();
			return true;
		}else{
			$vrp->rollback();
			return false;
		}
	}
	
}