var Znumber = /^\+?[1-9][0-9]*$/;


$(function(){
	
	$("#desgiftlog_num").blur(function(){
			if($(this).val()==""){
				$(this).next().html("该条信息不能为空！");														
			}else{
				if(Znumber.test($(this).val())){
					if(parseInt($(this).val())>parseInt($("#inst_gift_num").val())){
					$(this).next().html("不能大于目前剩余数量！");	
					}else{
					$(this).next().html("");		
					}}else{
					 $(this).next().html("请输入正整数！");										
					}		
				}
			})
				
					$("#desgiftlog_reason").blur(function(){
						if($(this).val()==""){
				   $(this).next().next().html("该条信息不能为空！");														
						}else{
						$(this).next().next().html("");		
						}
					})
			
		$('#xiaoku').click(function(){
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
		alert("请输入合法数据在提交！");//调用模态框
	}else{
		$('form[name="xk"]').submit();
	}
	})
	
	

	
	
}
)
	
