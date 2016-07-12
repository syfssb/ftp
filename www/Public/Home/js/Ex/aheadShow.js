													/**
													* 孙云峰
													* 2016-7-4
													* 兑换页面前台处理
													*/
													
													var Znumber = /^\+?[1-9][0-9]*$/;//正整数
													$(function(){
													
													//提交按钮
													$("input[name='sub']").click(function(){
													$("*").blur();
													var flag=true;
													var font=$("form font[name='error']");
													var countinput=$("input[name='num[]']").length;
													if(countinput==0){
													alert("您还没选择礼品！");
													return false;
													}
													font.each(function(){//遍历所有后缀警告的font,查看是否有值
													if($(this).text()==""||$(this).text()==null||$(this).text()==undefined){
													
													}else{
													flag=false;
													return;
													}
													})
													if(!flag){
													alert("请输入合法数据在提交！");
													return false;
													}else{
													getAllinput();
													
													$('form[name="DuiHuan"]').submit();
													}
													})
													
													$("input[name='deleall']").click(function(){
													if($(this).prop("checked")){
													var chall=$("input[type='checkbox']");
													chall.each(function(){
													
													
													if($(this).attr("checked")){
													// alert($(this).attr("checked"));
													}else{
													$(this).attr("checked",true).change();	
													}
													
													
													})
													}else{
													$("input[type='checkbox']").removeAttr("checked").change();
													}
													
													
													})
													
													
													
													
													})
													/**
													* 数量表单操作
													* @param  {[object]} ob 当前数量dom对象
													*/
													function checkNum(ob){
													//检验数量表单
													var shengyu=parseInt($("#avfen").text());
													var sum=sunAll();//计算当前所有已经选择的商品的积分
													// alert(sum);
													if(ob.value==""){//如果内容为空
													
													$(ob).next().html("请填写数量！");
													}else{
													if(Znumber.test($(ob).val())){//如果满足正整数
													if(parseInt($(ob).parent().prev().text())<$(ob).val()){//验证数量是否超过目前商品的数量
													$("#hfen").text(sum);
													$(ob).next().html("不能大于剩余数量！");
													}else{
													// var sum=sunAll();
													if(sum>shengyu){//判断积分是否超过该会员拥有的积分
													$("#hfen").text(sum);//动态改变已消耗的积分
													$(ob).next().html("积分不足！");
													}else{
													//拼凑库存表字段		
													// {$vo.id},{$instno},{$vo.inst_gift_code},{$vo.inst_gift_grate},{$vo.inst_gift_source},{$vo.giftlog_type},{$vo.inst_gift_num}
													getGroceryDate(ob);
													//拼凑兑换日志
													// {$vo.inst_gift_code},兑换数量,{$vo.giftlog_type},{$vo.inst_gift_source},时间,{$ctf},{$nowgrate},{$instno},'否','否',{$userName},sumfen							
													getGroceryLogDate(ob);
													$("#hfen").text(sum);
													$(ob).next().html("");
													}
													}
													
													}else{
													$(ob).next().html("请填写正整数！");
													}
													
													}
													}
													
													/**
													* 把所有的分表单汇集到总表单
													*/
													function getAllinput(){
													var graocrydataO=$("font[name='graocrydataO']");
													var gracelogO=$("font[name='gracelogO']");
													var graocrydata="";
													var gracelog="";
													graocrydataO.each(function(){
													graocrydata+=$(this).text();
													})
													$("input[name='graocrydata']").val(graocrydata);
													gracelogO.each(function(){
													gracelog+=$(this).text();
													})
													$("input[name='gracelog']").val(gracelog);
													
													}
													
													/**
													* 拼凑兑换日志字段
													* @return {[string]} 兑换日志字段
													*/
													function getGroceryLogDate(ob){
													// alert();
													var rowIds=$(ob).parent().parent().attr('id');//所在行的id
													// alert();
													var dataFonts=$("font[name='"+rowIds+"f']");//取到所有name=rowid的数组
													// alert($(dataFonts[3]).text());
													var dou=",";
													var dan="'";
													var nums=$(ob).val();
													var ctf=$("input[name='ctf']").val();
													var nowgrate=$("input[name='nowgrate']").val();
													var sure="否";
													var ah="是";
													var username=$("input[name='userName']").val();
													var nowsumfen=Number($(ob).val())*Number($(ob).parent().prev().prev().text());
													var times=$("input[name='time']").val(); 
													// alert(time);
													
													var results="("+dan+$(dataFonts[2]).text()+dan+dou+nums+dou+dan+$(dataFonts[5]).text()+dan+dou+dan+$(dataFonts[4]).text()+dan+dou+dan+times+dan+dou+dan+ctf+dan+dou+nowgrate+dou+dan+$(dataFonts[1]).text()+dan+dou+dan+ah+dan+dou+dan+sure+dan+dou+dan+username+dan+dou+nowsumfen+"),";
													// alert(results);
													$(ob).next().next().children().eq(1).text(results);
													
													}
													
													
													
													/**
													* 获取单条礼品的数据以提交给后台
													* @return {[string]} 该条礼品的所有数据
													*/
													function getGroceryDate(ob){
													var rowId=$(ob).parent().parent().attr('id');//所在行的id
													var dataFont=$("font[name='"+rowId+"f']");//取到所有name=rowid的数组
													// alert($(dataFont[3]).text());
													var result="";
													var num=$(ob).val();
													dataFont.each(function(index){
													if(index==1||index==2||index==4||index==5){
													result+="'"+$(this).text()+"',";	
													}	
													else if(index==6){
													var pass=Number($(this).text());
													var sss=Number(num);
													var now=pass-sss;
													// alert(now);
													result+=now+",";
													}else{
													result +=$(this).text()+",";
													}
													})
													result=result.substring(0,result.length-1);
													result="("+result+"),";
													// alert(result);
													$(ob).next().next().children().eq(0).text(result);
													
													}							
													/* 
													多选框事件
													*/
													function showH(ob){
													
													if($(ob).prop("checked")){
													$(ob).attr("checked",true);
													var id=ob.name;
													var td="#"+id+" td[name='"+id+"']";
													$(td).append($("#tr-template").html());
													}else{
													$(ob).removeAttr("checked");
													var id=$(ob).attr("name");
													var td="#"+id+" td[name='"+id+"']";
													
													var reduce=$(ob).parent().parent().children().eq(7).children().eq(0);
													$(reduce).blur();
													
													// window.setTimeout('reduceSum("reduce")',100);
													reduceSum(reduce);
													// $("*").blur();
													$(td).children().remove();
													}	
													}
													/* 
													算总积分
													*/
													function sunAll(){
													var inputArarry=$("input[name='num[]']");
													var sumnow=0;
													inputArarry.each(function(){//遍历所有
													if(Znumber.test($(this).val()) && $(this).val()!=""){
													sumnow+=Number($(this).val())*Number($(this).parent().prev().prev().text());
													}
													// 	continue;
													// }
													
													
													})
													return sumnow;
													}
													/* 
													减除积分
													*/
													function reduceSum(ob){
													if(Znumber.test($(ob).val()) && $(ob).val()!=""){
													var obfen=Number($(ob).val())*Number($(ob).parent().prev().prev().text());
													var sumnow=Number($("#hfen").text())-obfen;
													// alert(sumnow);
													
													if(isNaN(sumnow)){
													sumnow=0;
													}
													$("#hfen").text(parseInt(sumnow));
													}
													// alert($(ob).val());
													
													
													}
													
													// 对Date的扩展，将 Date 转化为指定格式的String
													// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
													// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
													// 例子： 
													// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
													// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
													Date.prototype.Format = function (fmt) { //author: meizz 
													var o = {
													"M+": this.getMonth() + 1, //月份 
													"d+": this.getDate(), //日 
													"h+": this.getHours(), //小时 
													"m+": this.getMinutes(), //分 
													"s+": this.getSeconds(), //秒 
													"q+": Math.floor((this.getMonth() + 3) / 3), //季度 
													"S": this.getMilliseconds() //毫秒 
													};
													if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
													for (var k in o)
													if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
													return fmt;
													}
													
													
													