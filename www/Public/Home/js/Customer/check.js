 		 var zName =  /^[\u2E80-\u9FFF]+$/;//验证中文字符
		 var zIdCard = /^[1-9]{1}[0-9]{14}$|^[1-9]{1}[0-9]{16}([0-9]|[xX])$/;//验证身份证
		 var zCarNum = /^[\u4E00-\u9FA5][a-zA-Z][\da-zA-Z]{5}$/;//车牌号
		 var zPhone = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;//电话
		 var zCarColor = /^([黄色|蓝色|白色|黑色]){2}$/;//汽车颜色
		 var zIniCode = /^[0-9]*[1-9][0-9]*$/;//交易机构号
		 var zStartDate = /^(19|20)\d\d(0[1-9]|1[012])(0[1-9]|[12]\d|3[01])$/;//开卡日期
		 var zETCcode = /^[0-9]*[1-9][0-9]*$/;//ETC卡号
		 var zBankCode = /^[0-9]*[1-9][0-9]*$/;//银行签约账号
		 var zETCstate = /^(正常|写卡失败|开卡未完成|销户)$/;//ETC卡片状态
		 var zETCservpakage=/^(ETC邮惠宝)$/;//业务包名称
		 var zETCcarUse=/^(营运|非营运)$/;//车辆属性
		 var zAmount=/^(?!0+(?:\.0+)?$)(?:[1-9]\d*|0)(?:\.\d{1,2})?$/;//金额
		 /*customers 表单验证*/
		 var cus_name=0;
		 var cus_carnumber=0;
		 var cus_salesman_name=0;
		 var cus_salesman_call=0;
		 var cus_ctf=0;
		 /*free 表单验证*/
		 var free_call=0;
		 var free_addr=0;
		 var free_pack=0;
		 var free_inst_no=0;
		 var free_begintime=0;
		 var free_endtime=0;
         /*traffic 表单验证*/
		 var traffic_call=0;
		 var traffic_carplate_color=0;
		 var traffic_inst_no=0;
		 var traffic_atime=0;
		 var traffic_etc_card=0;
		 var traffic_bank_num=0;
		 var traffic_etc_state=0;
		 /*car 表单验证*/
		 var vipcar_car_type=0;
		 var vipcar_driving_addr=0;
		 var vipcar_natrue=0;
		 var vipcar_brand_model=0;
		 var vipcar_idcode=0;
		 var vipcar_engineno=0;
		 var vipcar_creationg=0;
		 var vaipcar_issue=0;
		 var vipcar_effective=0;
		 var vipcar_nuclearload=0;
		 /*insurance 表单验证*/
		 var insurance_company=0;
		 var insurance_effective_time=0;
		 var insurance_expiration_time=0;
		 var insurance_sprice=0;
		 var insurance_cprice=0;
		 var insurance_totalprice=0;
		 var insurance_sodd=0;
		 var insurance_codd=0;

$(function(){
	 checking();
	 
	 //customers提交按钮控制
	$("#cusbuttonT").click(function(){
		$('input[name="cus_ctf"]').blur();
		$('input[name="cus_name"]').blur();
		$('input[name="cus_carnumber"]').blur();
		$('input[name="cus_salesman_name"]').blur();
		$('input[name="cus_salesman_call"]').blur();
		if((cus_name+cus_carnumber+cus_salesman_name+cus_salesman_call+cus_ctf)>0){
			alert("请填入合法数据再提交！");
		}else {
			$('form[name="cus"]').submit();
		};
			})
	//free提交按钮控制
	$('#frebutton').click(function(){
		$('input[name="free_call"]').blur();
		$('input[name="free_addr"]').blur();
		$('input[name="free_pack"]').blur();
		$('input[name="free_inst_no"]').blur();
		$('input[name="free_begintime"]').blur();
		$('input[name="free_endtime"]').blur();
		if( free_call+free_addr+free_pack+free_inst_no+free_begintime+free_endtime>0){
			alert("请填入合法数据再提交！");
		}else {
			$('form[name="free"]').submit();
		}
	})
	//traffic提交按钮控制
		$('#trabutton').click(function(){
			$('input[name="traffic_call"]').blur();
			$('input[name="traffic_carplate_color"]').blur();
			$('input[name="traffic_inst_no"]').blur();
			$('input[name="traffic_atime"]').blur();
			$('input[name="traffic_etc_card"]').blur();
			$('input[name="traffic_bank_num"]').blur();
			$('input[name="traffic_etc_state"]').blur();
		if(traffic_call+traffic_carplate_color+traffic_inst_no+traffic_atime+traffic_etc_card+traffic_bank_num+traffic_etc_state>0){
			alert("请填入合法数据再提交！");
		}else {
			$('form[name="tra"]').submit();
		}
	})
	
	
	
	
	//insurance提交按钮控制
		
		$('#insuancebutton').click(function(){
			$('input[name="insurance_company"]').blur();
			$('input[name="insurance_effective_time"]').blur();
			$('input[name="insurance_expiration_time"]').blur();
			$('input[name="insurance_sprice"]').blur();
			$('input[name="insurance_cprice"]').blur();
			$('input[name="insurance_totalprice"]').blur();
			$('input[name="insurance_sodd"]').blur();
			$('input[name="insurance_codd"]').blur();
			if (insurance_company+
		  insurance_effective_time+
		insurance_expiration_time+
		 insurance_sprice+
		 insurance_cprice+
		  insurance_totalprice+
		  insurance_sodd+insurance_codd>0)
			{
				alert("请填入合法数据再提交！");
			}else{
				
				$('form[name="insuranf"]').submit();
			}
			
		})
		
		
		
		
		//car提交按钮控制
			$('#carbutton').click(function(){
			$('input[name="vipcar_car_type"]').blur();
			$('input[name="vipcar_driving_addr"]').blur();
			$('input[name="vipcar_natrue"]').blur();
			$('input[name="vipcar_brand_model"]').blur();
			$('input[name="vipcar_idcode"]').blur();
			$('input[name="vipcar_engineno"]').blur();
			$('input[name="vipcar_creationg"]').blur();
			$('input[name="vaipcar_issue"]').blur();
			$('input[name="vipcar_effective"]').blur();
			$('input[name="vipcar_nuclearload"]').blur();
			
		if(	  vipcar_car_type+vipcar_driving_addr+vipcar_natrue+vipcar_brand_model+vipcar_idcode+vipcar_engineno+vipcar_creationg+vaipcar_issue+vipcar_effective+vipcar_nuclearload>0){
			alert("请填入合法数据再提交！");
		}else {
			$('form[name="carf"]').submit();
		}
	})

	 //alert($("#company").val());
	 //$("#company").val("阳光财险");
	 var companyvalue = $("#sele_company_val").val();
	 //alert(companyvalue);
	 $("#sele_company option[value='"+companyvalue+"']").attr("selected",true);
});	


	
function checking() {
	
	 /*customers 表单验证*/
		 checkStr("cus_ctf",zIdCard,'请输入正确格式的身份证号码！');
		 checkStr("cus_name",zName,'请输入中文字符！');
		 checkStr('cus_carnumber', zCarNum, '请输入正确格式的车牌号！');
		 checkStrNul('cus_salesman_name', zName, '请输入中文字符！');
		checkStrNul('cus_salesman_call', zPhone, '请输入11位格式的手机号码！');
	/*free 表单验证*/
		checkStr("free_call", zPhone, "请输入11位格式的手机号码！");
		checkNul("free_addr","不能输入空值！");
		checkStr("free_pack", zETCservpakage, "仅限ETC邮惠宝！");
		checkNul("free_inst_no", "不能输入空值！");
		checkStr("free_begintime", zStartDate, "请输入正确的日期格式。例：20160101");
		checkStr("free_endtime", zStartDate, "请输入正确的日期格式。例：20160101");
	/*traffic 表单验证*/
		checkStr("traffic_call", zPhone, "请输入11位格式的手机号码！");
		checkStr("traffic_carplate_color", zCarColor, "限黄色、蓝色、白色、黑色！");
		checkStr("traffic_inst_no", zIniCode, "机构号不正确！");
		checkStr("traffic_atime", zStartDate, "请输入正确的日期格式。例：20160101！");
		checkStr("traffic_etc_card", zIniCode, "卡号格式不正确！");
		checkStr("traffic_bank_num", zIniCode, "卡号格式不正确！");
		checkStr("traffic_etc_state", zETCstate, "限正常、写卡失败、开卡未完成、销户！");
    /*car 表单验证*/
		checkStrNul("vipcar_car_type", zName, '请输入中文字符！');
		checkStr("vipcar_natrue", zETCcarUse, '限营运、非营运!');
		checkNul("vipcar_brand_model", "不能输入空值!");
		checkNul("vipcar_idcode", "不能输入空值!");
		checkNul("vipcar_engineno", "不能输入空值!");
		checkStr("vipcar_creationg", zStartDate, "请输入正确的日期格式。例：20160101！");
		checkStr("vaipcar_issue", zStartDate, "请输入正确的日期格式。例：20160101！");
		checkStrNul("vipcar_nuclearload", zIniCode, "请输入数字！");
		checkStrNul("vipcar_effective", zStartDate, "请输入正确的日期格式。例：20160101！");
	/*insurance 表单验证*/
		checkselect('insurance_company', zName, '请输入中文字符！');
		checkStr('insurance_effective_time', zStartDate, "请输入正确的日期格式。例：20160101！");
		checkStr('insurance_expiration_time', zStartDate, "请输入正确的日期格式。例：20160101！");
		checkStr('insurance_sprice', zAmount, "请输入正确的金额格式，例：12.01");
		checkStr('insurance_cprice', zAmount, "请输入正确的金额格式，例：12.01");
		checkStr('insurance_totalprice', zAmount, "请输入正确的金额格式，例：12.01");
		
}

	function checkStr(name,str,arm) {//非空且字段有要求
		var s="input[name="+"'"+name+"'"+"]";
		$(s).blur(function(){
			if($(s).val()==""){
				eval(name+"=1");
				$(s).next().html("该条信息不能为空！");														
			}else{
				if(str.test($(s).val())){
					eval(name+"=0");
					$(s).next().html("");	
				}else{
					eval(name+"=1");
					 $(s).next().html(arm);										
				}		
			}				
		})	
	}
	
				function checkselect(name,str,arm){
					var s="select[name="+"'"+name+"'"+"]";
						$(s).blur(function(){
			if($(s).val()==""){
				eval(name+"=1");
				$(s).next().html("该条信息不能为空！");														
			}else{
				if(str.test($(s).val())){
					eval(name+"=0");
					$(s).next().html("");	
				}else{
					eval(name+"=1");
					 $(s).next().html(arm);										
				}		
			}				
		})	
					
				}

	function checkStrNul(name,str,arm) {//可为空，字段有要求
		var s="input[name="+"'"+name+"'"+"]";
//		var flag=false;
		$(s).blur(function(){
			if($(s).val()!=""){
				if(str.test($(s).val())){
//				 flag=true;
					eval(name+"=0");
					$(s).next().html('');	
				}else{
					eval(name+"=1");
					 $(s).next().html(arm);						 					
				}		
			}else {
				eval(name+"=0");
				$(s).next().html('');
			}		
		})
	}
	function checkNul(name,arm) {//不可为空，字段无要求
		var s="input[name="+"'"+name+"'"+"]";
		$(s).blur(function(){
			if($(s).val()==""){
				eval(name+"=1");
				$(s).next().html("该条信息不能为空！");	
																	
			}else{
				eval(name+"=0");	
				$(s).next().html("");	
			}				
		})	
	}


	 