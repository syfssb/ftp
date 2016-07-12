$(function(){
//$("#container").removeClass("container_12");
$("#checkedAll").click(function(){
	$("input[name='checkbox']:checkbox").each(function(){ 
		if(!$(this).attr("checked")){
			$(this).attr("checked","checked");
		}else{
			$(this).attr("checked",false);
		}
	});
});
});
function checkSubmit(){
	var code="";
	var codename ="";
	$("input[name='checkbox']:checkbox").each(function(){ 
		if($(this).attr("checked")){
			code += ($(this).val().split('|')[0])+",";
			codename +=($(this).val().split('|')[1])+",";
		}
	});
	$("#code").val(code.substr(0,code.lastIndexOf(',')));
	$("#codename").val(codename.substr(0,codename.lastIndexOf(',')));
	return true;
}
