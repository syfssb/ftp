<?php
namespace Home\Model;
use Think\Model;
class GroceryModel{
				/* 
				根据条件查询库存 
				*/
			public function getGroceryList($data){
			// $whereinst="where 1=1";
			$where='';
			/*
			索引字段code
			*/
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
		
			
			/*
			索引字段inst
			*/
			if($data["province"]&&$data["province"]!="-1"){
				$whereinst = " where 1=1 and dh_inst_grocery.inst_no="."'".$data["province"]."'";
				$instnow=$data["province"];
			}
			 if($data["city"]&&$data["city"]!="-1"){
				$whereinst = "where 1=1 and dh_inst_grocery.inst_no="."'".$data["city"]."'";
				$instnow=$data["city"];
			}
			  if($data["county"]&&$data["county"]!="-1"){
				$whereinst = "where 1=1 and dh_inst_grocery.inst_no="."'".$data["county"]."'";
				$instnow=$data["county"];
			}
			if($data["instno"]&&$data["instno"]!="-1"){
				$whereinst = "where 1=1 and dh_inst_grocery.inst_no="."'".$data["instno"]."'";
				$instnow=$data["instno"];
			}
				 $selection=" dh_inst_grocery.id,dh_inst.inst_name,dh_gift.gift_name,inst_gift_code,inst_gift_grate,inst_gift_source,giftlog_type,inst_gift_num";
					$sql=<<<SQL
					select $selection FROM `dh_inst_grocery`
					left join `dh_gift` on dh_inst_grocery.inst_gift_code = dh_gift.gift_code
					left join dh_inst on dh_inst.inst_no=  dh_inst_grocery.inst_no
					$whereinst $where 
					order by dh_inst.inst_name,inst_gift_code
SQL;

			$countsql=<<<SQL
					select count(*) FROM `dh_inst_grocery`
					left join `dh_gift` on dh_inst_grocery.inst_gift_code = dh_gift.gift_code
					left join dh_inst on dh_inst.inst_no=  dh_inst_grocery.inst_no
					$whereinst $where 
SQL;
// trace($countsql,"++++++++++++++++++++++++++","SQL",TRUE);
			$getGroceryList=pageList($countsql,$sql);
			array_push($getGroceryList,$instnow);
			return $getGroceryList;

}
			/* 
				根据id查询库存 
				*/
			public function getListById($id){
				$grocery=M('inst_grocery');
				$list=$grocery
				->join(" join `dh_gift` on dh_inst_grocery.inst_gift_code = dh_gift.gift_code")
				->where($id)->find();
				return $list;
			}
			
			
			/* 
				根据id销毁库存 
				*/
			public function groceryDes($id){
				$grocery=M('inst_grocery');
				$deslog=M('desgiftlog');
				$grocery->inst_gift_num=intval(I('post.inst_gift_num'))-intval(I('post.desgiftlog_num'));
				$grocery->startTrans();
				$des=$grocery->where($id)->save();
			if($deslog->create()){
				$deslog->desgiftlog_reason="<br/>".str_replace(array("\r\n", "\r", "\n"), "<br/>", $deslog->desgiftlog_reason);
				$deslog->desgiftlog_time=date("Y-m-d H:i:s");
				$logre=$deslog->add();
			if($logre&&$des){
				$grocery->commit();
				return true;
			}else{
				$grocery->rollback();
				return false;
			}
			}else{
				$grocery->rollback();
				return false;
			}
				
			}
				
			/* 
				根据id分发礼品
				2016-06-25
				*/
			public function groceryFen($id){
				$groceryA=M('inst_grocery');//库存类1
				$groceryB=M('inst_grocery');//库存类2
				$exgiftlog=M('exgiftlog');//分配日志类
				$rvgiftlog=M('rvgiftlog');//接收日志类
				//操作第一张表==库存表1
				$groceryA->inst_gift_num=intval(I('post.inst_gift_num'))-intval(I('post.exgiftlog_num'));
				$groceryA->startTrans();
				$groA=$groceryA->where($id)->save();//flag1
				//操作第二张表==库存表2
				//1.判断接受对象是否拥有该类礼品
				$arr['inst_no']=I('post.instnoo');//接受机构号
				$arr['inst_gift_code']=I('post.exgiftlog_code');//接受条形码
				$arr['giftlog_type']=I('post.exgiftlog_type');//接受礼品属性
				$arr['inst_gift_source']='上级机构分发';//接受来源
				$arr['_logic'] = 'AND';
			$Blist=$groceryB->where($arr)->select();
				$count=count($Blist);
			if($count==1){
				//2.接受方如果拥有
				$brr['id']=$Blist[0]['id'];
				$groceryB->inst_gift_num=intval($Blist[0]['inst_gift_num'])+intval(I('post.exgiftlog_num'));
				$groB=$groceryB->where($brr)->save();//flag2
			}else{
				//3.如果没有
			    $data['inst_no']=$arr['inst_no'];
			    $data['inst_gift_code']=$arr['inst_gift_code'];
			    $data['giftlog_type']=$arr['giftlog_type'];
			    $data['inst_gift_source']=$arr['inst_gift_source'];
			    $data['inst_gift_grate']=I('post.exgiftlog_grate');
			    $data['inst_gift_num']=I('post.exgiftlog_num');
				$groB=$groceryB->add($data);//flag2
			}
			//操作第三张表==分配日志
			if($exgiftlog->create()){
				$exgiftlog->exgiftlog_time=date("Y-m-d H:i:s");
				$exgiftlog->exgiftlog_rvinst=I('post.instnoo');
			$logex=$exgiftlog->add();//flag3
			}else{
				$groceryA->rollback();
				return false;
			}
			//操作第四张表==接受日志
			 $dataj['rvgiftlog_inst']=$arr['inst_no'];
			 $dataj['rvgiftlog_code']=$arr['inst_gift_code'];
			 $dataj['rvgiftlog_type']=$arr['giftlog_type'];
			 $dataj['rvgiftlog_grate']=I('post.exgiftlog_grate');
			 $dataj['rvgiftlog_num']=I('post.exgiftlog_num');
			 $dataj['exgiftlog_inst']=I('post.exgiftlog_inst');
			 $dataj['rvgiftlog_time']=date("Y-m-d H:i:s");
		     $logrv=$rvgiftlog->add($dataj);//flag4
			
			//事物判断提交
			if($logrv&&$logex&&$groB&&$groA){
				$groceryA->commit();
				return true;
			}else{
				$groceryA->rollback();
				return false;
			}
			}
				/* 
				根据id新增礼品
				2016-06-26
				*/
			public function	groceryAddH($id){
				$grocery=M('inst_grocery');
				$buylog=M('bgiftlog');
				$grocery->inst_gift_num=intval(I('post.inst_gift_num'))+intval(I('post.bgiftlog_num'));
				$grocery->startTrans();
				$gro=$grocery->where($id)->save();
			if($buylog->create()){
				$buylog->bgiftlog_time=date("Y-m-d H:i:s");
				$logb=$buylog->add();
			if($logb&&$gro){
				$grocery->commit();
				return true;
			}else{
				$grocery->rollback();
				return false;
			}
			}else{
				$grocery->rollback();
				return false;
			}}
			/* 
				新增礼品(新)
				2016-06-26
				*/
			public function groceryAddN(){
				//判断礼品表是否有该商品，如果没有则添加
				$flag=I('post.giftflag');
				// dump($flag);
				$grocery=M('inst_grocery');
				$grocery->startTrans();
			if($flag=="0"){
				$gift=M('gift');
				$datag['gift_code']=I("post.bgiftlog_code");
				$datag['gift_name']=I("post.gift_name");
				$flag1=$gift->add($datag);
			}else{
				$flag1=1;
			}
			
				// exit();
				//在库存表插入新数据
				// $arr['inst_no']=I('post.instnoo');//接受机构号
				// $arr['inst_gift_code']=I('post.exgiftlog_code');//接受条形码
				// $arr['giftlog_type']=I('post.exgiftlog_type');//接受礼品属性
				// $arr['inst_gift_source']='上级机构分发';//接受来源
				$data['inst_no']=I('post.bgiftlog_inst');
			    $data['inst_gift_code']=I('post.bgiftlog_code');
			    $data['giftlog_type']=I('post.bgiftlog_type');
			    $data['inst_gift_source']=I('post.inst_gift_source');
			    $data['inst_gift_grate']=I('post.bgiftlog_grate');
			    $data['inst_gift_num']=I('post.bgiftlog_num');
				$flag2=$grocery->add($data);//flag2
				//生成采购日志
				$buylog=M('bgiftlog');
				if($buylog->create()){
				$buylog->bgiftlog_time=date("Y-m-d H:i:s");
				$flag3=$buylog->add();
					}else{
				$grocery->rollback();
				return false;
					}
				if($flag1&&$flag2&&$flag3){
				$grocery->commit();
				return true;
				}else{
				$grocery->rollback();
				return false;
				}
				}
				
				
				
				
			
			
			
			
			
			
}