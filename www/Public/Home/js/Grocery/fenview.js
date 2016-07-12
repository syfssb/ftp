var Znumber = /^\+?[1-9][0-9]*$/;
$(function(){
	
	var level = $("#instlevelo").val();
	var inst_gift_codes=$("#exgiftlog_code").val();
	// alert(instnos);

	// 改
	// 改
	// 改
	// 改
	// 改
	// 改
	// 改
	
	
	
		$("form select").change(function(){
		var instnos= $("form select").val();
		// alert(instnos);
		query_inst_grate(instnos,inst_gift_codes);
	})


$("#exgiftlog_num").blur(function(){
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
	$("#exgiftlog_grate").blur(function(){
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
	$("form select").change(function(){
	if($(this).val()==-1){
		$(this).next().html("该条信息不能为空！");	
	}else{
		$(this).next().html("");	
	}
		
		
	})
		
		$('#fenfa').click(function(){
		$("form select").change();	
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
		$('form[name="ff"]').submit();
	}
	})	
	
	
})
	
	function query_inst_grate(inst,inst_gift_code){
        // $("#exgiftlog_grate").val("");
	$.getJSON("/Home/Index/getGrate",{instno:inst,code:inst_gift_code},function(data){
	if(data!=false){
		$.each(data,function(i,item){
			$("#exgiftlog_grate").val(item["inst_gift_grate"]).attr("readonly","readonly");
		});
		}else{
			$("#exgiftlog_grate").removeAttr("readonly");
		}
		
	});
}
