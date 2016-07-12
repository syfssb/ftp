$(function(){
	var zPhone = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
	//身份证(15位)
	var IDCard1=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;

	//身份证(18位)
	var IDCard2=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}[\dXY]{1}$/;

	//中文
	//var chinese=/^[\x{4e00}-\x{9fa5}]+$/;
	
	$("#mb_name").blur(function(){
		if($(this).val()==""){
			$(this).next().html("姓名不能为空！");
		}else{
			//$(this).next().html("");
			if(chinese.test($(this).val())){
				$(this).next().html("");
			}else{
				$(this).next().html("请输入中文！");
			}
		}
	})
	
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

	
	$("#vvaa").click(function(){
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
			$('form[name="vrpadd"]').submit();
		}
	})
	
	
	
	
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches

	$(".next").click(function(){
		var ID_num = $("#mb_ctf").val();
		if(ID_num==""){
			$("#mb_ctf").next().html("身份证号不能为空！");
			return false;
		}else{
			if( IDCard1.test(ID_num)||IDCard2.test(ID_num) ){
				var rr=ID_check(ID_num);
				if(rr==false){
					return false;
				}else{
					
				}
			}else{
				$("#mb_ctf").next().html("请正确输入正确格式的身份证号码！");return false;
			}
			//$("#mb_ctf").next().html("");
		}

		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent().parent();
		next_fs = $(this).parent().parent().next();
		
		//activate next step on progressbar using the index of next_fs
		//$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent().parent();
		previous_fs = $(this).parent().parent().prev();
		
		//de-activate current step on progressbar
		//$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		
		//show the previous fieldset
		previous_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});
	
});

function ID_check(ID_num){
	var r;
	$.ajaxSettings.async = false;
	$.getJSON("/Home/Member/getidnum",{IDnum:ID_num},function(data){
		if(data!=false){
			$("#mb_ctf").next().html("你已是我行积分会员，不用重复注册！");
			r=false;
		}else{
			$("#mb_ctf").next().html("");
			r=true;
		}
	});
	return r;
}
