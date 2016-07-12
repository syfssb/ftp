$(function(){
	var zPhone = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
	$("#mb_phone").blur(function(){
		if($(this).val()==""){
			$(this).next().html("手机号不能为空！");
		}else{
			if(zPhone.test($(this).val())){
				$(this).next().html("");
			}else{
				$(this).next().html("请正确输入11位格式的手机号码！");
			}
		}
	})
	
	$("#mb_address").blur(function(){
		if($(this).val()==""){
			$(this).next().html("联系地址不能为空！");
		}else{
			$(this).next().html("");
		}
	})
	
	$("#mb_lv").blur(function(){
		if($(this).val()==""){
			$(this).next().html("客户级别不能为空！");
		}else{
			$(this).next().html("");
		}
	})
	
	$("#mb_type").blur(function(){
		if($(this).val()==""){
			$(this).next().html("客户属性不能为空！");
		}else{
			$(this).next().html("");
		}
	})
	
	$('#vvmm').click(function(){
		$('*').blur();//所有表单失焦
		var flag=true;
		var font=$("form font[name='error']");
		font.each(function(){//遍历所有后缀警告的font,查看是否有值
		if($(this).text()==""||$(this).text()==null||$(this).text()==undefined){
			
		}else{
			flag=false;
			return;
		}
		})
		if(!flag){
			alert("请输入合法数据在提交！");return false;//调用模态框
		}else{
			$('form[name="vrpmodify"]').submit();
		}
	})
	
	
});
