var Znumber = /^\+?[1-9][0-9]*$/;//正整数
 var zAmount=/^(?!0+(?:\.0+)?$)(?:[1-9]\d*|0)(?:\.\d{1,2})?$/;//金额
$(function(){
	//验证数量
$("#bgiftlog_num").blur(function(){
			if($(this).val()==""){
				$(this).next().html("该条信息不能为空！");														
			}else{
				if(Znumber.test($(this).val())){
					$(this).next().html("");
				}else{
					 $(this).next().html("请输入正整数！");										
					}		
				}
			})
				
$("#bgiftlog_price").blur(function(){
			if($(this).val()==""){
				$(this).next().html("该条信息不能为空！");														
			}else{
				if(zAmount.test($(this).val())){
					$(this).next().html("");
				}else{
					 $(this).next().html("请输入正确格式的金额！例：19.90");										
					}		
				}
			})				

		$('#addHa').click(function(){
		$('*').blur();//所有表单失焦
		window.setTimeout("waitcheck('addH')",300);
	})					
	
	
	
})