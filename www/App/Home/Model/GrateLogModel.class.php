<?php
		/*兑换率日志模型
		孙云峰
		2016-6-30 11:49
		*/
namespace Home\Model;
use Think\Model;
class GrateLogModel{
				public function getGrateLogList($data){
				$where="where 1=1";
				if($data["city"]&&$data["city"]!="-1"){
				$where .= " and city=".$data["city"];
				}
				if($data["county"]&&$data["county"]!="-1"){
				$where .= " and county=".$data["county"];
				}
				if($data["instno"]&&$data["instno"]!="-1"){
				$where .= " and instno.inst_no=".$data["instno"];
				}
				
				if($data['begintime']&&$data['begintime']!='-1'){
				$where.=" and grates_log_time >='".$data["begintime"]." 00:00:00'";
				}	
				if($data['endtime']&&$data['endtime']!='-1'){
				$where.=" and grates_log_time <='".$data["endtime"]." 23:59:59'";
				}	
				$selections=" grates_log_inst,dh_inst.inst_name,grates_log_time,grates_log_username,grates_log_past,grates_log_now  ";
$sql=<<<SQL
		select $selections FROM `dh_grates_log`
		left join dh_inst on dh_grates_log.grates_log_inst= dh_inst.inst_no 
        left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno 
		on dh_grates_log.grates_log_inst=instno.inst_no  $where 
SQL;
$countsql=<<<SQL
			select count(*) FROM `dh_grates_log`
		left join dh_inst on dh_grates_log.grates_log_inst= dh_inst.inst_no 
        left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno 
		on dh_grates_log.grates_log_inst=instno.inst_no  $where 
SQL;

		$getGrateList=pageList($countsql,$sql);
		return $getGrateList;
		}
		
		
		
		}