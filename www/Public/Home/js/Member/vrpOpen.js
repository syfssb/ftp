$(function(){

	$("#open_reason").blur(function(){
		if($(this).val()==""){
			$(this).next().next().html("该条信息不能为空！");
		}else{
			$(this).next().next().html("");
		}
	})
	
	$('#vvopen').click(function(){
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
			var r=confirm("确定开启会员吗？");
			if(r==true){
				$('form[name="vrpopen"]').submit();
			}else{
				return false;
			}
			
		}
	})
	
	
});
