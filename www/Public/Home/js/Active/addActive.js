			$(function(){
			
			$("#actives_name").blur(function(){
			if($(this).val()!="" ){
			query_anames($(this).val());
			}else{
			
			$(this).next().html("该条信息不能为空！");
			}
			
			
			})
			
			$('#ata').click(function(){
			$('*').blur();//所有表单失焦
			
			window.setTimeout("waitcheck('At')",300);
			
			})	
			
			
			
			
			
			})
			
			//判断是否有该名称的业务。如果有的不允许添加
			function query_anames(actives_name){
			$.getJSON("/Home/Active/getAname",{name:actives_name},function(data){
			if(data==""){
			$("#actives_name").next().html("")
			}else{
			$("#actives_name").next().html("已有该名称的业务，请不要重复添加！");
			}
			
			});
			}
