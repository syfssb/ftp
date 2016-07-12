$(function(){

	$("a[name='del']").bind("click",function(){
		//alert("确定要删除该用户吗？");
		var r=confirm("确定要删除该用户吗？")
		if(r==true){
			return true;
		}else{
			return false;
		}
	})
	
});
