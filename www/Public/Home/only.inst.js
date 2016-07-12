			$(function(){
			// var href = window.location.href;
			// var beginStr ='/Home/';
			// var beginIndex = href.indexOf('/Home/');
			// var end = href.substring(beginIndex+beginStr.length);
			// var str = end.substr(0,end.indexOf('/'));
			
			
			var instno = $("#instnumo").val();
			var level = $("#instlevelo").val();
			// alert(level);
			if(level==2){
			// alert(instno);
			init_countyso(instno);
			}else if(level==3){
			init_instnoo(instno);
			}else if(level==4){
			$("#instnoo").val(instno);
			}else{
			init_cityso();
			}
			//init_citys();
			$("#cityso").change(function(){
			init_countyso($("#cityso").val());
			});
			$("#countyso").change(function(){
			init_instnoo($("#countyso").val());
			});
			
			});
			
			function init_cityso(){
			// alert(111);
			$.getJSON("/Home/Index/getInstno",function(data){
			$.each(data,function(i,item){
			$("<option></option>").val(item["inst_no"]).text(item["inst_name"]).appendTo($("#cityso"));
			});
			});
			}
			function init_countyso(city){
			$("#countyso").empty();
			$("<option></option>").val("-1").text("---请选择县---").appendTo($("#countyso"));
			$.getJSON("/Home/Index/getInstno",{instno:city},function(data){
			$.each(data,function(i,item){
			$("<option></option>").val(item["inst_no"]).text(item["inst_name"]).appendTo($("#countyso"));
			});
			});
			}
			function init_instnoo(county){
			$("#instnoo").empty();
			$("<option></option>").val("-1").text("---请选择网点---").appendTo($("#instnoo"));
			$.getJSON("/Home/Index/getInstno",{instno:county},function(data){
			$.each(data,function(i,item){
			$("<option></option>").val(item["inst_no"]).text(item["inst_name"]).appendTo($("#instnoo"));
			});
			});
			}