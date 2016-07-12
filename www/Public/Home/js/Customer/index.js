$(function(){
	//$("#checknum").click(function(){
	//	alert(isLicenseNo($("#carnum").val()));
	//});
});

		/**20160116安徽自邮一族办理信息导入表
		20160116安徽交通卡办理信息导入表
		YYMMNN安徽ETC邮惠宝会员车辆信息导入表
		YYMMNN安徽ETC邮惠宝会员车险投保信息导入表*/
function uploadCheck(){
	var fileName = $("#filename").val();
	var realName = fileName.substr(fileName.lastIndexOf("安徽"));
	realName = realName.substr(0,realName.lastIndexOf("."));
	var real = fileName.substr(fileName.lastIndexOf(".")+1);

	if(real!="xls"&&real!="xlsx"){
		alert("文件格式不对请核对后再试");
		return false;
	}else{
		switch(realName){
			case "安徽自邮一族办理信息导入表":
				$("#tablename").val("etc_free_msg");
			return true;
			case "安徽交通卡办理信息导入表":
				$("#tablename").val("etc_traffic_msg");
			return true;
			case "安徽ETC邮惠宝会员车辆信息导入表":
				$("#tablename").val("etc_vipcar_msg");
			return true;
			case "安徽ETC邮惠宝会员车险投保信息导入表":
				$("#tablename").val("etc_vipcar_insurance_msg");
			return true;
			default :
				alert("文件名称不合法");
		}
		return false;
	}
}