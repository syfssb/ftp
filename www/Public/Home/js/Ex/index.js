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
	if(""==$("#flag").text()||0>=$("#avfen").text()||""!=$("#er").text()){
		alert("无法兑换！");
		return false;
	}else{
		return true;
	}
	
})


	// alert();
})