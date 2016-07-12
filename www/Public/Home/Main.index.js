			$(function(){
			var href = window.location.href;
			var beginStr ='/Home/';
			var beginIndex = href.indexOf('/Home/');
			var end = href.substring(beginIndex+beginStr.length);
			var str = end.substr(0,end.indexOf('/'));
			
			$("#demo").click(function(){
			laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
			laydate({elem: '#demo'});//绑定元素
			});
			var instno = $("#instnum").val();
			var level = $("#instlevel").val();
			if(level==2){
			init_countys(instno);
			}else if(level==3){
			init_instno(instno);
			}else if(level==4){
			$("#instno").val(instno);
			}else{
			init_citys();
			}
			//init_citys();
			$("#citys").change(function(){
			init_countys($("#citys").val());
			});
			$("#countys").change(function(){
			init_instno($("#countys").val());
			});
			
			});
			
			function init_citys(){
			// alert(111);
			$.getJSON("/Home/Index/getInstno",function(data){
			$.each(data,function(i,item){
			$("<option></option>").val(item["inst_no"]).text(item["inst_name"]).appendTo($("#citys"));
			});
			});
			}
			function init_countys(city){
			$("#countys").empty();
			$("<option></option>").val("-1").text("---请选择县---").appendTo($("#countys"));
			$.getJSON("/Home/Index/getInstno",{instno:city},function(data){
			$.each(data,function(i,item){
			$("<option></option>").val(item["inst_no"]).text(item["inst_name"]).appendTo($("#countys"));
			});
			});
			}
			function init_instno(county){
			$("#instno").empty();
			$("<option></option>").val("-1").text("---请选择网点---").appendTo($("#instno"));
			$.getJSON("/Home/Index/getInstno",{instno:county},function(data){
			$.each(data,function(i,item){
			$("<option></option>").val(item["inst_no"]).text(item["inst_name"]).appendTo($("#instno"));
			});
			});
			}
			
			function waitcheck(formname){
			var flag=true;
			var font=$("form font[name='error']");
			font.each(function(){//遍历所有后缀警告的font,查看是否有值
			if($(this).text()==""||$(this).text()==null||$(this).text()==undefined){
			// flag=true;
			}else{
			flag=false;
			return;
			}
			})
			
			if(flag==false){
			alert("请输入合法数据在提交！");
			// return false;
			}else{
			$('form[name="'+formname+'"]').submit();
			}}