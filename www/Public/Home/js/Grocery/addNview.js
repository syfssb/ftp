var Zcode=/^[0-9]*$/;
var Znumber = /^\+?[1-9][0-9]*$/;
 var zAmount=/^(?!0+(?:\.0+)?$)(?:[1-9]\d*|0)(?:\.\d{1,2})?$/;//金额
$(function(){
	
	var lev=$("#instlevelo").val();
if(lev==1){
	$("#bgiftlog_type").val("省发");
}else if(lev==2){
	$("#bgiftlog_type").val("市发");
}else if(lev==3){
	$("#bgiftlog_type").val("县发");
}else{
	$("#bgiftlog_type").val("网点发");
}
		
		$("#bgiftlog_code").blur(function(){
			var bgiftlog_code=$(this).val();
			var inst=$("#bgiftlog_inst").val();
			
			if($(this).val()==""){
				$(this).next().html("该条信息不能为空！");														
			}else{
				if(Zcode.test($(this).val())){
			query_inst_grate($(this).val());
			query_gift_grate(inst,$(this).val());
			query_gift_inst(inst,$(this).val());
					// $(this).next().html("");
				}else{
					 $(this).next().html("请输入数字格式的数据，例：0121212121930！");										
					}		
				}
			// alert();
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
				
				$("#bgiftlog_grate").blur(function(){
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
				
			$("#gift_name").blur(function(){
			if($(this).val()==""){
				$(this).next().html("该条信息不能为空！");														
			}else{
					$(this).next().html("");
				}
			})	
				
		$('#addNa').click(function(){
			// var flag=true;
		$('*').blur();
		// var addN="addN";
		window.setTimeout("waitcheck('addN')",300);
// alert(1);
		
	})	
		
	
})
	
//判断礼品表是否有该礼品，如果有给名称赋值,且标示为1
	function query_inst_grate(inst_gift_code){
        // $("#gift_name").val("");
	$.getJSON("/Home/Grocery/getGift",{code:inst_gift_code},function(data){
	if(data!=false){
		$.each(data,function(i,item){
			$("#gift_name").val(item["gift_name"]).attr("readonly","readonly");
			$("#giftflag").val("1");
		});
		}else{
			// $("#gift_name").val();
			$("#giftflag").val("0");
			$("#gift_name").removeAttr("readonly");
		}
		
	});
}
//判断该机构是否有该条形码，如果有给兑换分值赋值
		function query_gift_grate(inst,inst_gift_code){
        // $("#bgiftlog_grate").val("");
		$.getJSON("/Home/Index/getGrate",{instno:inst,code:inst_gift_code},function(data){
	if(data!=false){
		$.each(data,function(i,item){
			$("#bgiftlog_grate").val(item["inst_gift_grate"]).attr("readonly","readonly");
		});
		}else{
			$("#bgiftlog_grate").removeAttr("readonly");
		}
		
	});
}
	
//判断该机构是否已有该机构号，该条形码，且属性为自主采购的礼品。如果有的不允许添加
		function query_gift_inst(inst,inst_gift_code){
		$.getJSON("/Home/Grocery/getGiftInst",{instno:inst,code:inst_gift_code},function(data){
	if(data==false){
		$("#bgiftlog_code").next().html("");
		}else{
			$("#bgiftlog_code").next().html("已自主采购该种商品，请不要重复添加！");
		}
		
	});
}
