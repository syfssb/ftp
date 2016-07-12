$(function(){
	var zPwd = /^[0-9a-z]{6,12}$/;//密码
	$("#user_name").blur(function(){
		var user_name = $("#user_name").val();
		if($(this).val()==""){
			$(this).next().html("用户名不能为空！");
			
		}else{
			$(this).next().html("");
		}
	})
	
	$("#user_pwd").blur(function(){
		var user_pwd = $("#user_pwd").val();
		if($(this).val()==""||$(this).val().length<6||$(this).val().length>12){
			$(this).next().html("密码长度在6-12位之间！");
		}else{
			if(zPwd.test($(this).val())){
				$(this).next().html("");
			}else{
				$(this).next().html("密码只能是数字和字母！");
			}
		}
	})
	
	$("#user_pwd2").blur(function(){
		var user_pwd = $("#user_pwd").val();
		if($(this).val()!=user_pwd){
			$(this).next().html("两次密码必须相同！");
		}else{
			$(this).next().html("");
		}
	})
	
	$('#aamm').click(function(){
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
			$('form[name="Umodify"]').submit();
		}
	})
	
	
});
