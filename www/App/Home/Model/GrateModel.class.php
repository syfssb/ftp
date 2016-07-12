<?php
		/*兑换率模型
		孙云峰
		2016-6-29 20:26
		*/
namespace Home\Model;
use Think\Model;
class GrateModel{
 public function getGrateList($data){
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
$selections=" gift_grate,dh_inst.inst_name,dh_gift_grates.inst_no ";
$sql=<<<SQL
		select $selections FROM `dh_gift_grates`
		left join dh_inst on dh_inst.inst_no = dh_gift_grates.inst_no
        left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno 
		on instno.inst_no = dh_gift_grates.inst_no $where 
SQL;
$countsql=<<<SQL
		select count(*) FROM `dh_gift_grates`
		left join dh_inst on dh_inst.inst_no = dh_gift_grates.inst_no
        left join (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1 left join dh_inst e2 on e1.inst_per=e2.inst_no left join dh_inst e3 on e2.inst_per=e3.inst_no) instno 
		on instno.inst_no = dh_gift_grates.inst_no $where 
SQL;

		$getGrateList=pageList($countsql,$sql);
		return $getGrateList;
 }


 public function modify(){//stopping
 	$grate=M("gift_grates");
 	$gratelog=M("grates_log");
 	$grate->startTrans();
 	$data['inst_no']=I("post.grates_log_inst");
 	$grate->gift_grate=I("post.grates_log_now");
 	$flag1=$grate->where($data)->save();
 	if($gratelog->create()){
 		$gratelog->grates_log_time=date("Y-m-d H:i:s");
 		$flag2=$gratelog->add();
 	}else{
 		$grate->rollback();
 		return false;
 	}

 	if($flag1&&$flag2){
 		$grate->commit();
 		return true;
 	}else{
 		$grate->rollback();
 		return false;
 	}


 }





}