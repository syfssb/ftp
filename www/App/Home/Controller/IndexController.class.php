<?php
namespace Home\Controller;
use Think\Controller;
				class IndexController  extends CommonController {
				public function index(){
				$this->display();
				}
				
				public function getInstno(){
				$instno = I("get.instno");
				echo json_encode(getInstnos($instno));
				}
				public function getGrate(){
				$instno = I("get.instno");
				$code = I("get.code");
				// trace($code,"===>>>","debug",true);
				echo json_encode(getGrates($instno,$code));
				}
				
				function http_curl($url,$type='get',$res='json',$arr=''){
				//获取imooc
				//1.初始化curl
				$ch = curl_init();
				// $url = 'http://www.baidu.com';
				//2.设置curl的参数
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				if($type='post'){
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
				}
				//3.采集
				$output = curl_exec($ch);
				//4.关闭
				curl_close($ch);
				// var_dump($output);
				if($res=='json'){
				if(curl_errno($ch)){
				return curl_error($ch);
				}else{
				return json_decode($output,true);
				}
				}
				}
				}