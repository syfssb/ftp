<?php
namespace Home\Model;
use Think\Model;
class MemberlogModel {
	//获取会员修改日志列表
	function MemberlogList($data){
		$where = $data['where'];
		$sql = "select vrpchange_log_id,vrpchange_log_inst,vrpchange_log_time,vrpchange_log_username,vrpchange_log_type,vrpchange_log_ctf from `dh_vrpchange_log` left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno on instno.inst_no = dh_vrpchange_log.vrpchange_log_inst $where";
		
		$countsql = "select count(*) from `dh_vrpchange_log` left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno on instno.inst_no = dh_vrpchange_log.vrpchange_log_inst $where";
		
		$memberlog_list = pageList($countsql,$sql);
        return $memberlog_list;
	}
}