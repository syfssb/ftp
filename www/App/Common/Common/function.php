<?php
	/* 
    公共接口
	孙云峰
	2016-6-24
	*/

//报表导出接口
function local_excel_export($header, $data_array, $filename = "") {
	$filename = $filename . date("Ymd") . ".csv";
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=$filename");
	header("Cache-Control: no-cache, no-store, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: 0");
    $output = fopen("php://output", "w");
        fwrite($output,chr(0xEF).chr(0xBB).chr(0xBF));
    //写表头
    fputcsv($output, $header);
    //写数据
    foreach ($data_array as $row) {
    	foreach($row as $key => $val){
    		 $row[$key]=$val."\t";
    	}
    	fputcsv($output, $row);
    }
    fclose($output);
    exit(0);
} 


		//获取机构号信息
function getInstnos($instno){
	$where = "inst_lv=2";
	if($instno){
		$where = " inst_per = ".$instno;
	}
	$instnos = M("inst")->where($where)->select();
	// trace($instnos,"==================================","DEBUG",TRUE);
	return $instnos;
}
   //获取机构号礼品兑换率
	function getGrates($instno,$code){
		// $where="1=1";
	if($instno&&$code){
		$sql=<<<SQL
			SELECT inst_gift_grate 
			from `dh_inst_grocery`
			where inst_no=$instno and inst_gift_code=$code
			limit 0,1
SQL;
// trace($sql,"==================================","DEBUG",TRUE);
			$result=M()->query($sql);
			return $result;
			}else{
				return false;
			}
	}
	// 获取礼品属性
	function getGifts($code){
				if($code){
		$sql=<<<SQL
			SELECT gift_name 
			from `dh_gift`
			where  gift_code=$code
			limit 0,1
SQL;
			$result=M()->query($sql);
			return $result;
			}else{
				return false;
			}	
		}
			// 获取该机构是否有自主采购这种礼品
			function getGiftsInst($instno,$code){
					if($instno&&$code){
		$sql=<<<SQL
			SELECT inst_gift_grate 
			from `dh_inst_grocery`
			where inst_no=$instno and inst_gift_code=$code and inst_gift_source="自主采购"
			limit 0,1
SQL;
			$result=M()->query($sql);
			return $result;
			}else{
				return false;
			}
			}

		//分页接口
	function pageList($countsql,$sql){
		$m=new \Think\Model();//$m=M();
		$count=$m->query($countsql);
		$count=$count[0]['count(*)'];
		 $pageSize = 10;
        $page = new \Think\Page($count , $pageSize);
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pageSize.' 条/页 共 %TOTAL_ROW% 条)');
		$sql.=' limit '.$page->firstRow.','.$page->listRows;
		$result=$m->query($sql);
		return array("result"=>$result,"page"=>$page->show());
	}

	// 根据名称查询业务类型
	function getAnames($name){
	$actives=M('actives');
	$list=$actives->where($name)->select();
	return $list;
	}

	function get_actives(){
		$actives=M('actives');
	$list=$actives->select();
	return $list;
	}
	/**
	 * 根据名字查询业务
	 * @param  [string] $name [业务名称]
	 * @return [array]       [业务类别]
	 */
	function get_activesByName($name)
	{
		$where['actives_name']= array('like',"%".$name."%" );
			$actives=M('actives');
	$list=$actives->where($where)->select();
	return $list;
	}


