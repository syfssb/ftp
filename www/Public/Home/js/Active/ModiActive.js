			$(function(){
			
			$("#actives_name").blur(function(){
			if($(this).val()=="" ){
			$(this).next().html("该条信息不能为空！");
			}else{
			query_aname($(this).val());
			}
			})
			
			$('#ama').click(function(){
			//所有表单失焦
			$('*').blur();
			window.setTimeout("waitcheck('Am')",300);
			})	
			
			
			
			
			
			})
			
			//判断是否有该名称的业务。如果有的不允许添加
			function query_aname(actives_name){
			$.getJSON("/Home/Active/getAname",{name:actives_name},function(data){
			if(data==false){
			$("#actives_name").next().html("");
			}else{
			$("#actives_name").next().html("已有该名称的业务，请不要重复添加！");
			}
			
			});
			}
			
			
