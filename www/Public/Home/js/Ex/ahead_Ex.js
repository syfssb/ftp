																/**
																 * 提前兑换会员资格判断页面
																 */
																var zPhone = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;//电话
																var zBankCode = /^[0-9]*[1-9][0-9]*$/;//银行签约账号	
																
																$(function(){
																$("#querySub").click(function(){
																// alert();
																if($("#vrp_ctf").val()==""){
																alert("请输入会员身份证！");
																}else{
																$("form[name='queryFen']").submit();
																}
																})
																$("#showL").click(function(){
																var input=$("input[name='itemcode']");
																
																
																if(""==$("#flag").text()||""!=$("#er").text()||input.length==0){
																alert("无法兑换！");
																return false;
																}else{
																var flag=true;	
																$("*").blur();	
																$("select[name='actives']").change();
																var font =$("font[name='error']");
																font.each(function(){
																if($(this).text()==""||$(this).text()==null||$(this).text()==undefined){
																
																}else{
																flag=false;
																return;
																}})


																var selectF=$("select[name='flagJ']");
																selectF.each(function () {
																	if ($(this).val()=="-1") {
																		$(this).next().html('请选择转介标识！');
																		flag=false;
																	} else {

																	}
																})

																// if($("select[name='flagJ']").val()=="-1"){
																// $("select[name='flagJ']").next().html("请选择转介标识！");
																// alert("请输入合法数据在提交！");
																// flag=false;
																
																// }
																
																// alert(flag);
																if(!flag){
																alert("请输入合法数据在提交！");
																return false;
																}else{	
																getAllinput();
																
																$('form[name="aheadshow"]').submit();
																}
																
																}
																
																})
																
																
																// alert();
																})
																
																
																function getActives(ob){
																	var sele=$(ob).parent().children().last().children("select[name='actives']");
																	// console.log(sele);
																	// debugger;
																$.getJSON("/Home/Ex/getActive",function(data){
																$.each(data,function(i,item){
																$("<option></option>").val(item["actives_id"]).text(item["actives_name"]).appendTo(sele);
																});
																});
																}
																/**
																 * 根据表单内容动态查询业务类别
																 * @author 孙云峰 2016-7-11
																 * @param  {[string]} inputdata [表单内容]
																 * @return {[array]}           [业务信息]
																 */
																function getActiveByInput(inputdata) {
																	var inputdatas=$(inputdata).val();
																$.getJSON("/Home/Ex/getActiveByname",{activename:inputdatas},function(data){
																	$(inputdata).next().next().empty();
																	$("<option></option>").val('-1').text('请选择业务类别').appendTo($(inputdata).next().next());
																$.each(data,function(i,item){
																$("<option></option>").val(item["actives_id"]).text(item["actives_name"]).appendTo($(inputdata).next().next());
																});
																});
																}
																
																/**
																* 验证下业务拉框
																* @param  {[Object]} ob [当前下拉框对象]
																*/
																function checkselect(ob){
																if($(ob).val()=="-1"){
																$(ob).next().html("请选择业务类别！");
																}else{
																$(ob).next().html("");
																}
																
																
																}
																
																/**
																* 动态添加业务类型
																* @param  {[Object]} ob [当前按钮]
																*/
																function addActive(ob){
																
																$(ob).parent().append($("#tr-template").html());
																getActives(ob);
																// alert(ob);
																
																}
																
																/**
																* 验证转介下拉框
																* @author 孙云峰 2016-7-4
																* @param  {[Object]} ob [当前下拉框对象]
																*/
																function checksflag(ob){
																if($(ob).val()=="-1"){
																$(ob).next().next().empty();
																$(ob).next().html("请选择转介标识！");
																}else{
																$(ob).next().next().empty();
																$(ob).next().html("");
																if($(ob).val()!="自主办理"){
																$(ob).next().next().append($("#tr-phone").html());
																}else{
																
																$(ob).next().next().empty();
																}
																}
																}
																
																/**
																* 验证转介人手机
																* @author 孙云峰 2016-7-4
																* @param  {[Object]} ob [当前表单对象]
																*/
																function  checkphone(ob){
																if($(ob).val()==""){
																$(ob).next().html("请填写手机号码！");
																}else{
																if(zPhone.test($(ob).val())){
																$(ob).next().html("");
																}else{
																$(ob).next().html("请填写正确格式的手机号！");
																}
																}	
																
																}
																/**
																* 验证单号
																* @author 孙云峰 2016-7-4
																* @param  {[Object]} ob [当前表单对象]
																*/
																function checkitem(ob){
																if($(ob).val()==""){
																$(ob).next().html("请填写单号号码！");
																}else{
																if(zBankCode.test($(ob).val())){
																$(ob).next().html("");
																}else{
																$(ob).next().html("请填写正确格式的单号！");
																}
																}
																}
																/**
																* 动态删除业务类型数据
																* @author 孙云峰 2016-7-4
																* @param  {[Object]} ob [当前表单对象]
																*/
																function deleteData(ob){
																$(ob).parent().remove();
																
																}
																
																/**
																* 汇总数据
																* @author 孙云峰 2016-7-4
																*/
																function getAllinput(){
																var activesdatas=$("div[name='activesdatas']");
																// alert(activesdatas.length);
																var sql="";
																var dou=",";
																var dan="'";
																activesdatas.each(function(){
																var giftlog_vrp_ctf=$("input[name='ctf']").val();
																var itemcode=$(this).children("input[name='itemcode']").val();
																// alert(itemcode);
																var actives_id=$(this).children("select[name='actives']").val();
																var tphone="";
																var bphone="";
																var zflag=$(this).children("select[name='flagJ']").val();
																var giftlog_time="giftlog_time";
																if(zflag=="自主办理"){
																var tphone="";
																var bphone="";
																}else if(zflag=="推荐"){
																var tphone=$(this).children().children("input[name='fphone']").val();
																var bphone="";
																}else{
																var bphone=$(this).children().children("input[name='fphone']").val();
																var tphone="";
																}
																sql+="("+dan+giftlog_vrp_ctf+dan+dou+dan+itemcode+dan+dou+actives_id+dou+dan+tphone+dan+dou+dan+bphone+dan+dou+dan+zflag+dan+dou+dan+giftlog_time+dan+"),";
																// alert(sql);
																})
																sql=sql.substring(0,sql.length-1);
																$("input[name='sql']").val(sql);
																
																}