<?php
		/*兑换模型
		孙云峰
		2016-6-30 15:10
		*/
namespace Home\Model;
use Think\Model;
                class ExModel{
                public function getFirst($ctf){
                //查询该客户上上级别是否与本机构所在市一样
                $upper=session('upper');
                $sqlvrp=<<<SQL
                SELECT dh_vrp.*,instno.cityname FROM dh_vrp 
                LEFT  JOIN dh_inst ON dh_vrp.vrp_inst=dh_inst.inst_no 
                LEFT JOIN (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1
                LEFT JOIN dh_inst e2 ON e1.inst_per=e2.inst_no 
                LEFT JOIN dh_inst e3 ON e2.inst_per=e3.inst_no 
                HAVING city IS NOT NULL) instno 
                ON instno.inst_no=dh_vrp.vrp_inst
                WHERE vrp_ctf ="$ctf" AND instno.city="$upper"
SQL;
                $vrplist=M()->query($sqlvrp);
                
                $err=D(Ex)->judeVrp($vrplist);
                if($err){
                $vrplist['err']= $err['err'];
                }
                //查询未对账积分，调用接口查询该客户剩余积分
                // $Fen=getRemoteData($ctf);==============================================================================
                $Fen="555";
                $vrplist['fen']=$Fen;
                return $vrplist;
                
                }
                /**
                * 判断是否是否有权利兑换礼品
                * @param  [type] $vrplist [description]
                * @return [type]          [description]
                */
                public function judeVrp($vrplist){
                
                if(count($vrplist)==0){//
                $errstate['err']="该客户非本市会员或尚未注册会员！";
                return $errstate;
                }
                if($vrplist[0]['vrp_xstate']=='黑名单用户'){//
                $errstate['err']= "该客户为黑名单用户！";
                return $errstate;
                }
                if($vrplist[0]['vrp_state']=='停止'){//
                $errstate['err']= "该客户已停用！";
                return $errstate;
                }
                }
                
                //查询该机构兑换率，相乘该机构所有礼品兑换所需积分，得到所有兑换积分<=该会员剩余积分的礼品
                public function getGiftListA($fen){
                $instwhere['inst_no']=session("dhuser.user_inst");
                $grate=M("gift_grates")->where($instwhere)->find();
                // dump($grate);
                $grate=$grate['gift_grate'];
                $giftlist['grate']= $grate;
                $fen=floor($fen/$grate);
                $inst=$instwhere['inst_no'];
                
                $sql=<<<SQL
                select dh_inst_grocery.*,(inst_gift_grate*$grate) as fenDisc,dh_gift.gift_name  from dh_inst_grocery
                left join dh_gift  on dh_inst_grocery.inst_gift_code=dh_gift.gift_code
                where inst_no="$inst"  and  inst_gift_grate<=$fen and dh_inst_grocery.inst_gift_num>0
SQL;
                $giftlist['data']=M()->query($sql);
                // dump($giftlist);
                return $giftlist;
                
                }

                        /**
                         * 兑换处理
                         * @author 孙云峰  2016-7-3
                         * @param  [string] $graocrydata [所有提交来的机构库存信息]
                         * @param  [string] $gracelog    [所有提交来的兑换日志信息]
                         * @return [boolean]              [数据库操作结果]
                         */
                          public function doneDui($graocrydata,$gracelog){
                          $graocrydata=substr($graocrydata,0,strlen($graocrydata)-1); 
                          $gracelog=substr($gracelog,0,strlen($gracelog)-1); 
                          $sqlgrocery="replace into `dh_inst_grocery`(id,inst_no,inst_gift_code,inst_gift_grate,inst_gift_source,giftlog_type,inst_gift_num) values". $graocrydata;
                          
                          $sqllog="replace into `dh_giftlog`(giftlog_code,giftlog_num,giftlog_type,giftlog_source,giftlog_time,giftlog_vrp_ctf,giftlog_percent,giftlog_inst,giftlog_ahead,giftlog_sure,giftlog_username,giftlog_fen) values". $gracelog;
                          // dump($sqllog);
						  // exit();
                          $m=M();
                          $m->startTrans();
                          $flag1=$m->execute($sqlgrocery);
                          $flag2=$m->execute($sqllog);
                          if($flag1&&flag2){
                            $m->commit();
                            return true;    
                          }else{
                            $m->rollback(); 
                            return false;   
                          }

                          
                          }

                          /**
                           * 得到该会员的信息
                           * @author 孙云峰  2016-7-4
                           * @param  [string] $ctf [身份证]
                           * @return [array]      [会员信息]
                           */
                          public function getAheadFirst($ctf){
                             $upper=session('upper');
                $sqlvrp=<<<SQL
                SELECT dh_vrp.*,instno.cityname FROM dh_vrp 
                LEFT  JOIN dh_inst ON dh_vrp.vrp_inst=dh_inst.inst_no 
                LEFT JOIN (SELECT e1.inst_no,e1.inst_name,e2.inst_no county,e2.inst_name countyname,e3.inst_no city,e3.inst_name cityname FROM `dh_inst` e1
                LEFT JOIN dh_inst e2 ON e1.inst_per=e2.inst_no 
                LEFT JOIN dh_inst e3 ON e2.inst_per=e3.inst_no 
                HAVING city IS NOT NULL) instno 
                ON instno.inst_no=dh_vrp.vrp_inst
                WHERE vrp_ctf ="$ctf" AND instno.city="$upper"
SQL;
                          $vrplist=M()->query($sqlvrp);
                          
                          $err=D(Ex)->judeVrp($vrplist);
                          if($err){
                          $vrplist['err']= $err['err'];
                          }
                          
                          return $vrplist;
                          
                          
                          
                          }

                             /**
                             * 提前兑换礼品信息
                             * @author 孙云峰  2016-7-4
                             * @return [Array] [礼品信息]
                             */
                             public function getHGiftListA(){
                             $instwhere['inst_no']=session("dhuser.user_inst");
                             $grate=M("gift_grates")->where($instwhere)->find();
                             // dump($grate);
                             $grate=$grate['gift_grate'];
                             $giftlist['grate']= $grate;
                             $inst=$instwhere['inst_no'];
                
                                $sql=<<<SQL
                select dh_inst_grocery.*,(inst_gift_grate*$grate) as fenDisc,dh_gift.gift_name  from dh_inst_grocery
                left join dh_gift  on dh_inst_grocery.inst_gift_code=dh_gift.gift_code
                where inst_no="$inst"  and dh_inst_grocery.inst_gift_num>0
SQL;
                          $giftlist['data']=M()->query($sql);
                          // dump($giftlist);
                          return $giftlist;
                          
                          
                          }

                          /**
                           * 提前兑换数据处理
                           * @param  [string] $graocrydata [库存表信息]
                           * @param  [string] $gracelog    [兑换流水信息]
                           * @param  [string] $aheadlog    [提前兑换表信息]
                           * @return [boolean]             [数据库操作结果]
                           */
                          public function doneADui($graocrydata,$gracelog,$aheadlog){
                          $graocrydata=substr($graocrydata,0,strlen($graocrydata)-1); 
                          $gracelog=substr($gracelog,0,strlen($gracelog)-1); 

                          $sqlgrocery="replace into `dh_inst_grocery`(id,inst_no,inst_gift_code,inst_gift_grate,inst_gift_source,giftlog_type,inst_gift_num) values". $graocrydata;
                          
                          $sqllog="replace into `dh_giftlog`(giftlog_code,giftlog_num,giftlog_type,giftlog_source,giftlog_time,giftlog_vrp_ctf,giftlog_percent,giftlog_inst,giftlog_ahead,giftlog_sure,giftlog_username,giftlog_fen) values". $gracelog;
                          $sqlahead="replace into `dh_ahead_giftlog`(giftlog_vrp_ctf,itemcode,actives_id,tphone,bphone,zflag,giftlog_time) values".$aheadlog;
                          // dump($sqllog);
                          $m=M();
                          $m->startTrans();
                          $flag1=$m->execute($sqlgrocery);
                          $flag2=$m->execute($sqllog);
                          $flag3=$m->execute($sqlahead);
                          if($flag1&&flag2&&flag3){
                            $m->commit();
                            return true;    
                          }else{
                            $m->rollback(); 
                            return false;   
                          }

                          }
                          
                }