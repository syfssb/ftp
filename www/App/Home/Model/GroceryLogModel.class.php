<?php
namespace Home\Model;
use Think\Model;
class GroceryLogModel{
					/* 
				根据条件查询采购流水
				2016-6-28
				孙云峰
				*/
			public function getBuyList($data){
			$where="";

			if($data['bgiftlog_code']&&$data['bgiftlog_code']!='-1'){
				$where.=" and bgiftlog_code like '%".$data["bgiftlog_code"]."%'";
			}	
			if($data['bgiftlog_type']&&$data['bgiftlog_type']!='-1'){
				$where.=" and bgiftlog_type like '%".$data["bgiftlog_type"]."%'";
			}		
			if($data['bgiftlog_username']&&$data['bgiftlog_username']!='-1'){
				$where.=" and bgiftlog_username like '%".$data["bgiftlog_username"]."%'";
			}			
			if($data['gift_name']&&$data['gift_name']!='-1'){
				$where.=" and dh_gift.gift_name like '%".$data["gift_name"]."%'";
			}			
			if($data['begintime']&&$data['begintime']!='-1'){
				$where.=" and bgiftlog_time >='".$data["begintime"]." 00:00:00'";
			}	
			if($data['endtime']&&$data['endtime']!='-1'){
				$where.=" and bgiftlog_time <='".$data["endtime"]." 23:59:59'";
			}	
			$whereinst='';
			
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and  bgiftlog_inst="."'".$data["province"]."'";
				$instnow=$data["province"];
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = " where 1=1 and  bgiftlog_inst="."'".$data["city"]."'";
				$instnow=$data["city"];
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = " where 1=1 and  bgiftlog_inst="."'".$data["county"]."'";
				$instnow=$data["county"];
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = " where 1=1 and  bgiftlog_inst="."'".$data["instno"]."'";
				$instnow=$data["instno"];
			}
				 $selection=" dh_inst.inst_name,dh_gift.gift_name,bgiftlog_code,bgiftlog_price,bgiftlog_num,bgiftlog_type,bgiftlog_time,bgiftlog_username,bgiftlog_inst ";
					$sql=<<<SQL
					select $selection FROM `dh_bgiftlog`
					left join dh_inst on dh_bgiftlog.bgiftlog_inst=dh_inst.inst_no 
					left join `dh_gift` on dh_bgiftlog.bgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$countsql=<<<SQL
				select count(*) FROM `dh_bgiftlog`
					left join dh_inst on dh_bgiftlog.bgiftlog_inst=dh_inst.inst_no 
					left join `dh_gift` on dh_bgiftlog.bgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$getBuyList=pageList($countsql,$sql);
			return $getBuyList;

}
				/* 
				根据条件查询接受流水
				孙云峰
				2016-6-28
				*/
			public function getRvList($data){
				$where="";

			if($data['rvgiftlog_code']&&$data['rvgiftlog_code']!='-1'){
				$where.=" and rvgiftlog_code like '%".$data["rvgiftlog_code"]."%'";
			}
			if($data['rvgiftlog_type']&&$data['rvgiftlog_type']!='-1'){
				$where.=" and rvgiftlog_type like '%".$data["rvgiftlog_type"]."%'";
			}		
			if($data['gift_name']&&$data['gift_name']!='-1'){
				$where.=" and dh_gift.gift_name like '%".$data["gift_name"]."%'";
			}			
				
			if($data['begintime']&&$data['begintime']!='-1'){
				$where.=" and rvgiftlog_time >='".$data["begintime"]." 00:00:00'";
			}	
			if($data['endtime']&&$data['endtime']!='-1'){
				$where.=" and rvgiftlog_time <='".$data["endtime"]." 23:59:59'";
			}	
			$whereinst='';
			
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and  rvgiftlog_inst="."'".$data["province"]."'";
				$instnow=$data["province"];
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = " where 1=1 and  rvgiftlog_inst="."'".$data["city"]."'";
				$instnow=$data["city"];
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = " where 1=1 and  rvgiftlog_inst="."'".$data["county"]."'";
				$instnow=$data["county"];
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = " where 1=1 and  rvgiftlog_inst="."'".$data["instno"]."'";
				$instnow=$data["instno"];
			}
				 $selection=" dh_inst.inst_name,dh_gift.gift_name,rvgiftlog_code,rvgiftlog_num,rvgiftlog_type,rvgiftlog_time,rvgiftlog_inst,exgiftlog_inst ";
					$sql=<<<SQL
					select $selection FROM `dh_rvgiftlog`
					left join dh_inst on dh_rvgiftlog.rvgiftlog_inst=dh_inst.inst_no
					left join `dh_gift` on dh_rvgiftlog.rvgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$countsql=<<<SQL
				select count(*) FROM `dh_rvgiftlog`
					left join dh_inst on dh_rvgiftlog.rvgiftlog_inst=dh_inst.inst_no
					left join `dh_gift` on dh_rvgiftlog.rvgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$getBuyList=pageList($countsql,$sql);
			return $getBuyList;
			}
			
			public function getFaList($data){
				$where="";

			if($data['exgiftlog_code']&&$data['exgiftlog_code']!='-1'){
				$where.=" and exgiftlog_code like '%".$data["exgiftlog_code"]."%'";
			}	
			if($data['exgiftlog_type']&&$data['exgiftlog_type']!='-1'){
				$where.=" and exgiftlog_type like '%".$data["exgiftlog_type"]."%'";
			}		
			if($data['exgiftlog_username']&&$data['exgiftlog_username']!='-1'){
				$where.=" and exgiftlog_username like '%".$data["exgiftlog_username"]."%'";
			}			
			if($data['gift_name']&&$data['gift_name']!='-1'){
				$where.=" and dh_gift.gift_name like '%".$data["gift_name"]."%'";
			}			
			
			if($data['begintime']&&$data['begintime']!='-1'){
				$where.=" and exgiftlog_time >='".$data["begintime"]." 00:00:00'";
			}	
			if($data['endtime']&&$data['endtime']!='-1'){
				$where.=" and exgiftlog_time <='".$data["endtime"]." 23:59:59'";
			}	
			$whereinst='';
			
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and  exgiftlog_inst="."'".$data["province"]."'";
				$instnow=$data["province"];
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = " where 1=1 and  exgiftlog_inst="."'".$data["city"]."'";
				$instnow=$data["city"];
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = " where 1=1 and  exgiftlog_inst="."'".$data["county"]."'";
				$instnow=$data["county"];
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = " where 1=1 and  exgiftlog_inst="."'".$data["instno"]."'";
				$instnow=$data["instno"];
			}
				 $selection=" dh_inst.inst_name,dh_gift.gift_name,exgiftlog_code,exgiftlog_source,exgiftlog_rvinst,exgiftlog_num,exgiftlog_type,exgiftlog_time,exgiftlog_username ";
					$sql=<<<SQL
					select $selection FROM `dh_exgiftlog`
					left join dh_inst on dh_exgiftlog.exgiftlog_inst=dh_inst.inst_no  
					left join `dh_gift` on dh_exgiftlog.exgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$countsql=<<<SQL
				select count(*) FROM `dh_exgiftlog`
					left join dh_inst on dh_exgiftlog.exgiftlog_inst=dh_inst.inst_no  
					left join `dh_gift` on dh_exgiftlog.exgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$getBuyList=pageList($countsql,$sql);
			return $getBuyList;
			}
			
			public function getDeList($data){
					$where="";

			if($data['desgiftlog_code']&&$data['desgiftlog_code']!='-1'){
				$where.=" and desgiftlog_code like '%".$data["desgiftlog_code"]."%'";
			}			
		
			if($data['desgiftlog_type']&&$data['desgiftlog_type']!='-1'){
				$where.=" and desgiftlog_type like '%".$data["desgiftlog_type"]."%'";
			}		
			if($data['desgiftlog_username']&&$data['desgiftlog_username']!='-1'){
				$where.=" and desgiftlog_username like '%".$data["desgiftlog_username"]."%'";
			}			
			if($data['gift_name']&&$data['gift_name']!='-1'){
				$where.=" and dh_gift.gift_name like '%".$data["gift_name"]."%'";
			}			
			
			if($data['begintime']&&$data['begintime']!='-1'){
				$where.=" and desgiftlog_time >='".$data["begintime"]." 00:00:00'";
			}	
			if($data['endtime']&&$data['endtime']!='-1'){
				$where.=" and desgiftlog_time <='".$data["endtime"]." 23:59:59'";
			}	
			$whereinst='';
			
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and  desgiftlog_inst="."'".$data["province"]."'";
				$instnow=$data["province"];
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = " where 1=1 and  desgiftlog_inst="."'".$data["city"]."'";
				$instnow=$data["city"];
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = " where 1=1 and  desgiftlog_inst="."'".$data["county"]."'";
				$instnow=$data["county"];
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = " where 1=1 and  desgiftlog_inst="."'".$data["instno"]."'";
				$instnow=$data["instno"];
			}
				 $selection=" desgiftlog_id,dh_inst.inst_name,dh_gift.gift_name,desgiftlog_code,desgiftlog_source,desgiftlog_num,desgiftlog_type,desgiftlog_time,desgiftlog_username,desgiftlog_reason ";
					$sql=<<<SQL
					select $selection FROM `dh_desgiftlog`
					left join dh_inst on dh_desgiftlog.desgiftlog_inst=dh_inst.inst_no
					left join `dh_gift` on dh_desgiftlog.desgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$countsql=<<<SQL
				select count(*) FROM `dh_desgiftlog`
					left join dh_inst on dh_desgiftlog.desgiftlog_inst=dh_inst.inst_no
					left join `dh_gift` on dh_desgiftlog.desgiftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$getBuyList=pageList($countsql,$sql);
			return $getBuyList;
				
				
			}
	
			public function getExList($data){
			$where="";
		
			if($data['giftlog_type']&&$data['giftlog_type']!='-1'){
				$where.=" and giftlog_type like '%".$data["giftlog_type"]."%'";
			}	
			if($data['giftlog_ahead']&&$data['giftlog_ahead']!='-1'){
				$where.=" and giftlog_ahead like '%".$data["giftlog_ahead"]."%'";
			}	
			if($data['giftlog_sure']&&$data['giftlog_sure']!='-1'){
				$where.=" and giftlog_sure like '%".$data["giftlog_sure"]."%'";
			}	
			if($data['giftlog_vrp_ctf']&&$data['giftlog_vrp_ctf']!='-1'){
				$where.=" and giftlog_vrp_ctf like '%".$data["giftlog_vrp_ctf"]."%'";
			}		
			if($data['giftlog_source']&&$data['giftlog_source']!='-1'){
				$where.=" and giftlog_source like '%".$data["giftlog_source"]."%'";
			}	
			if($data['giftlog_username']&&$data['giftlog_username']!='-1'){
				$where.=" and giftlog_username like '%".$data["giftlog_username"]."%'";
			}			
			if($data['gift_name']&&$data['gift_name']!='-1'){
				$where.=" and dh_gift.gift_name like '%".$data["gift_name"]."%'";
			}			
			if($data['giftlog_code']&&$data['giftlog_code']!='-1'){
				$where.=" and giftlog_code like '%".$data["giftlog_code"]."%'";
			}	
			if($data['begintime']&&$data['begintime']!='-1'){
				$where.=" and giftlog_time >='".$data["begintime"]." 00:00:00'";
			}	
			if($data['endtime']&&$data['endtime']!='-1'){
				$where.=" and giftlog_time <='".$data["endtime"]." 23:59:59'";
			}	
			$whereinst='';
			
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and  giftlog_inst="."'".$data["province"]."'";
				$instnow=$data["province"];
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = " where 1=1 and  giftlog_inst="."'".$data["city"]."'";
				$instnow=$data["city"];
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = " where 1=1 and  giftlog_inst="."'".$data["county"]."'";
				$instnow=$data["county"];
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = " where 1=1 and  giftlog_inst="."'".$data["instno"]."'";
				$instnow=$data["instno"];
			}
				 $selection=" dh_giftlog.giftlog_id,dh_inst.inst_name,dh_gift.gift_name,giftlog_code,giftlog_source,giftlog_num,giftlog_type,giftlog_time,giftlog_username,giftlog_vrp_ctf,giftlog_percent,giftlog_ahead,giftlog_sure,giftlog_fen ";
					$sql=<<<SQL
					select $selection FROM `dh_giftlog`
					left join dh_inst on  dh_giftlog.giftlog_inst=dh_inst.inst_no 
					left join `dh_gift` on dh_giftlog.giftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
			$countsql=<<<SQL
				select count(*) FROM `dh_giftlog`
					left join dh_inst on  dh_giftlog.giftlog_inst=dh_inst.inst_no 
					left join `dh_gift` on dh_giftlog.giftlog_code = dh_gift.gift_code
					$whereinst $where 
SQL;
// dump($sql);
					$getBuyList=pageList($countsql,$sql);
					
					return $getBuyList;
					
				
			}
 			/*
 			根据id查询兑换流水详情
 			*/
			public function getSingleList($id){
				$Dui=M("giftlog");
				$list=$Dui->where($id)->find();
				return $list;
			}
				/*
 			根据id查询提前兑换分表流水详情
 			*/
			public function getAlist($data){
				$ADui=M("ahead_giftlog ");
				$Alist=$ADui
				->join("dh_actives on dh_actives.actives_id=dh_ahead_giftlog.actives_id")
				->where($data)->select();
				// dump($Alist);
				return $Alist;
			}

	    	/*
 			统计查询
 			*/
			public function getSuList($data){
				$where ="";
				$BeginDate=date('Y-m-01', strtotime(date("Y-m-d"))); //得到当前月份第一天
				$Eend=date('Y-m-d', strtotime("$BeginDate +1 month -1 day"));//得到当前月份最后一天
				// 查询默认查询当前月份
				$btime ="  and dh_bgiftlog.bgiftlog_time >='".$BeginDate." 00:00:00'  and dh_bgiftlog.bgiftlog_time <='".$Eend." 23:59:59'";
				$rtime =" and  dh_rvgiftlog.rvgiftlog_time >='".$BeginDate." 00:00:00'  and  dh_rvgiftlog.rvgiftlog_time <='".$Eend." 23:59:59'";
				$extime =" and  dh_exgiftlog.exgiftlog_time>='".$BeginDate." 00:00:00'  and  dh_exgiftlog.exgiftlog_time<='".$Eend." 23:59:59'";
				$destime =" and dh_desgiftlog.desgiftlog_time>='".$BeginDate." 00:00:00'  and dh_desgiftlog.desgiftlog_time<='".$Eend." 23:59:59'";
				$duitime =" and dh_giftlog.giftlog_time>='".$BeginDate." 00:00:00'  and dh_giftlog.giftlog_time<='".$Eend." 23:59:59' ";
				
			if($data['inst_gift_code']&&$data['inst_gift_code']!='-1'){
				$where.=" and inst_gift_code like '%".$data["inst_gift_code"]."%'";
			}	
			if($data['giftlog_type']&&$data['giftlog_type']!='-1'){
				$where.=" and giftlog_type like '%".$data["giftlog_type"]."%'";
			}	
			
			if($data['inst_gift_source']&&$data['inst_gift_source']!='-1'){
				$where.=" and inst_gift_source like '%".$data["inst_gift_source"]."%'";
			}	
					
			if($data['gift_name']&&$data['gift_name']!='-1'){
				$where.=" and dh_gift.gift_name like '%".$data["gift_name"]."%'";
			}			
			
			if($data['begintime']&&$data['begintime']!='-1'){
				$btime=" ";
				$rtime=" ";
				$extime=" ";
				$destime=" ";
				$duitime=" ";
				$btime.="  and dh_bgiftlog.bgiftlog_time >='".$data["begintime"]." 00:00:00' ";
				$rtime.=" and  dh_rvgiftlog.rvgiftlog_time >='".$data["begintime"]." 00:00:00' ";
				$extime.=" and  dh_exgiftlog.exgiftlog_time>='".$data["begintime"]." 00:00:00' ";
				$destime.=" and dh_desgiftlog.desgiftlog_time>='".$data["begintime"]." 00:00:00' ";
				$duitime.=" and dh_giftlog.giftlog_time>='".$data["begintime"]." 00:00:00' ";
			}	
			if($data['endtime']&&$data['endtime']!='-1'){
				$btime=" ";
				$rtime=" ";
				$extime=" ";
				$destime=" ";
				$duitime=" ";
				$btime.=" and dh_bgiftlog.bgiftlog_time <='".$data["endtime"]." 23:59:59'";
				$rtime.=" and  dh_rvgiftlog.rvgiftlog_time <='".$data["endtime"]." 23:59:59'";
				$extime.=" and  dh_exgiftlog.exgiftlog_time<='".$data["endtime"]." 23:59:59'";
				$destime.=" and dh_desgiftlog.desgiftlog_time<='".$data["endtime"]." 23:59:59'";
				$duitime.=" and dh_giftlog.giftlog_time<='".$data["endtime"]." 23:59:59' ";
			}	
			$whereinst='';
			
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and  dh_inst_grocery.inst_no="."'".$data["province"]."'";
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = " where 1=1 and  dh_inst_grocery.inst_no="."'".$data["city"]."'";
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = " where 1=1 and  dh_inst_grocery.inst_no="."'".$data["county"]."'";
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = " where 1=1 and  dh_inst_grocery.inst_no="."'".$data["instno"]."'";
			}
				/* 以机构库存表为主表
					外链接
				#采购表  	dh_bgiftlog
				#接收表		dh_rvgiftlog
				#分发表		dh_exgiftlog
				#销库表		dh_desgiftlog
				#兑换表		dh_giftlog
				#机构表		dh_inst
				#礼品表		dh_gift

				*/
				$sql=<<<SQL
					select inst_name,inst_no,gift_name,inst_gift_code,inst_gift_source,giftlog_type,
		SUM(CASE alldata.type WHEN 'dui' THEN num ELSE 0 END ) duinum,
		SUM(CASE alldata.type WHEN 'buy' THEN num ELSE 0 END ) buynum,
		SUM(CASE alldata.type WHEN 'rsv' THEN num ELSE 0 END ) resnum,
		SUM(CASE alldata.type WHEN 'ex' THEN num ELSE 0 END ) exnum, 
		SUM(CASE alldata.type WHEN 'des' THEN num ELSE 0 END ) desnum 
		from
		(select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
		ifnull(dh_giftlog.giftlog_num,0) num,ifnull("dui",0) type
		from  dh_inst_grocery
		left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
		left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
		left join  dh_giftlog	on  
		dh_inst_grocery.inst_gift_code=dh_giftlog.giftlog_code  
		and   dh_inst_grocery.inst_no=dh_giftlog.giftlog_inst     
		and   dh_inst_grocery.inst_gift_source=dh_giftlog.giftlog_source     
		and   dh_inst_grocery.giftlog_type=dh_giftlog.giftlog_type
		$whereinst $where $duitime
		Union All
		select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
		ifnull(dh_bgiftlog.bgiftlog_num,0) num,ifnull("buy",0) type
		from  dh_inst_grocery
		left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
		left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
		left join dh_bgiftlog	on  
		dh_inst_grocery.inst_gift_code=dh_bgiftlog.bgiftlog_code  
		and   dh_inst_grocery.inst_no=dh_bgiftlog.bgiftlog_inst     
		and   dh_inst_grocery.giftlog_type=dh_bgiftlog.bgiftlog_type
		$whereinst $where $btime
		Union All
		select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
		ifnull(dh_rvgiftlog.rvgiftlog_num,0) num,ifnull("rsv",0) type
		from  dh_inst_grocery
		left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
		left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
		left join dh_rvgiftlog	on  
		dh_inst_grocery.inst_gift_code=dh_rvgiftlog.rvgiftlog_code  
		and   dh_inst_grocery.inst_no=dh_rvgiftlog.rvgiftlog_inst     
		and   dh_inst_grocery.giftlog_type=dh_rvgiftlog.rvgiftlog_type
		$whereinst $where $rtime
		Union All
		select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
		ifnull(dh_exgiftlog.exgiftlog_num,0) num,ifnull("ex",0) type
		from  dh_inst_grocery
		left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
		left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
		left join  dh_exgiftlog	on  
		dh_inst_grocery.inst_gift_code=dh_exgiftlog.exgiftlog_code  
		and   dh_inst_grocery.inst_no=dh_exgiftlog.exgiftlog_inst     
		and   dh_inst_grocery.inst_gift_source=dh_exgiftlog.exgiftlog_source     
		and   dh_inst_grocery.giftlog_type=dh_exgiftlog.exgiftlog_type
		$whereinst $where $extime
		Union All
		select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
		ifnull(dh_desgiftlog.desgiftlog_num,0) num,ifnull("des",0) type
		from  dh_inst_grocery
		left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
		left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
		left join dh_desgiftlog	on  
		dh_inst_grocery.inst_gift_code=dh_desgiftlog.desgiftlog_code  
		and   dh_inst_grocery.inst_no=dh_desgiftlog.desgiftlog_inst     
		and   dh_inst_grocery.inst_gift_source=dh_desgiftlog.desgiftlog_source     
		and   dh_inst_grocery.giftlog_type=dh_desgiftlog.desgiftlog_type
		$whereinst $where $destime
		) alldata
		group by inst_no,inst_gift_code,inst_gift_source,giftlog_type
SQL;
// dump($sql);
			$countsql=<<<SQL
				select count(*) FROM `dh_inst_grocery`
					left join `dh_gift` on dh_inst_grocery.inst_gift_code = dh_gift.gift_code
					left join dh_inst on dh_inst.inst_no=  dh_inst_grocery.inst_no
					$whereinst $where 
SQL;
				// $getBuyList=M()->query($sql);
				$getBuyList=pageList($countsql,$sql);
					// dump($getBuyList);
					return $getBuyList;


			}
	
	
	
	
}






// select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
// 	ifnull(dh_giftlog.giftlog_num,0) num,ifnull("dui",0) type
// 	from  dh_inst_grocery
// 	left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
// 	left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
	
	
// 	left join  dh_giftlog	on  
// 	  dh_inst_grocery.inst_gift_code=dh_giftlog.giftlog_code  
// 	and   dh_inst_grocery.inst_no=dh_giftlog.giftlog_inst     
// 	and   dh_inst_grocery.inst_gift_source=dh_giftlog.giftlog_source     
// 	and   dh_inst_grocery.giftlog_type=dh_giftlog.giftlog_type
// 	 and dh_giftlog.giftlog_time>='2016-07-01 00:00:00'  and dh_giftlog.giftlog_time<='2016-07-31 23:59:59' 
// 	 where 1=1 and  dh_inst_grocery.inst_no='34015430'  

// Union All



// 	 select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
// 	ifnull(dh_bgiftlog.bgiftlog_num,0) num,ifnull("buy",0) type
// 	from  dh_inst_grocery
// 	left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
// 	left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
// 	left join dh_bgiftlog	on  
// 	  dh_inst_grocery.inst_gift_code=dh_bgiftlog.bgiftlog_code  
// 	and   dh_inst_grocery.inst_no=dh_bgiftlog.bgiftlog_inst     
// 	and   dh_inst_grocery.giftlog_type=dh_bgiftlog.bgiftlog_type
// 	  and dh_bgiftlog.bgiftlog_time >='2016-07-01 00:00:00'  and dh_bgiftlog.bgiftlog_time <='2016-07-31 23:59:59'
// 	   where 1=1 and  dh_inst_grocery.inst_no='34015430' 
// Union All
// 	select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
// 	ifnull(dh_rvgiftlog.rvgiftlog_num,0) num,ifnull("rsv",0) type
// 	from  dh_inst_grocery
// 	left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
// 	left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
	  
// 	  left join dh_rvgiftlog	on  
// 	  dh_inst_grocery.inst_gift_code=dh_rvgiftlog.rvgiftlog_code  
// 	and   dh_inst_grocery.inst_no=dh_rvgiftlog.rvgiftlog_inst     
// 	and   dh_inst_grocery.giftlog_type=dh_rvgiftlog.rvgiftlog_type
// 	 and  dh_rvgiftlog.rvgiftlog_time >='2016-07-01 00:00:00'  and  dh_rvgiftlog.rvgiftlog_time <='2016-07-31 23:59:59'
// where 1=1 and  dh_inst_grocery.inst_no='34015430'
	 
// Union All
// 	select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
// 	ifnull(dh_exgiftlog.exgiftlog_num,0) num,ifnull("ex",0) type
// 	from  dh_inst_grocery
// 	left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
// 	left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
// 	left join  dh_exgiftlog	on  
// 	  dh_inst_grocery.inst_gift_code=dh_exgiftlog.exgiftlog_code  
// 	and   dh_inst_grocery.inst_no=dh_exgiftlog.exgiftlog_inst     
// 	and   dh_inst_grocery.inst_gift_source=dh_exgiftlog.exgiftlog_source     
// 	and   dh_inst_grocery.giftlog_type=dh_exgiftlog.exgiftlog_type
// 	 and  dh_exgiftlog.exgiftlog_time>='2016-07-01 00:00:00'  and  dh_exgiftlog.exgiftlog_time<='2016-07-31 23:59:59'
// 	 where 1=1 and  dh_inst_grocery.inst_no='34015430'
// Union All

// 	select dh_inst.inst_name,dh_gift.gift_name,dh_inst_grocery.inst_no,dh_inst_grocery.inst_gift_code,dh_inst_grocery.inst_gift_source,dh_inst_grocery.giftlog_type,
// 	ifnull(dh_desgiftlog.desgiftlog_num,0) num,ifnull("des",0) type
// 	from  dh_inst_grocery
// 	left join dh_gift 		on  dh_inst_grocery.inst_gift_code=dh_gift.gift_code
// 	left join dh_inst 		on  dh_inst_grocery.inst_no=dh_inst.inst_no
	
	
	
// 	left join dh_desgiftlog	on  
// 	  dh_inst_grocery.inst_gift_code=dh_desgiftlog.desgiftlog_code  
// 	and   dh_inst_grocery.inst_no=dh_desgiftlog.desgiftlog_inst     
// 	and   dh_inst_grocery.inst_gift_source=dh_desgiftlog.desgiftlog_source     
// 	and   dh_inst_grocery.giftlog_type=dh_desgiftlog.desgiftlog_type
// 	 and dh_desgiftlog.desgiftlog_time>='2016-07-01 00:00:00'  and dh_desgiftlog.desgiftlog_time<='2016-07-31 23:59:59'
// 	  where 1=1 and  dh_inst_grocery.inst_no='34015430'






