<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>安徽邮政金融兑换</title>

<script type="text/javascript" src="/Public/public/ie/js/jquery.min.js"></script>
<script src="/Public/public/ie/js/jquery.validate.js" type="text/javascript"></script>

<!--Initiate form validation - in this example on the login form-->
<script type="text/javascript">
$(document).ready(function() {
	$("#loginform").validate();
});
</script>


<!--This is the styling for the error message for form validation-->
<style type="text/css">
.error {
	padding: 7px;
	margin: 3px;
	background-color: #FCC;
	border: 1px solid #F00;
	font-family: arial;
	font-size: 10px;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	color: #000;
	float: left;
	width: 98%;
	-moz-border-radius:5px;
	-webkit-border-radius: 5px;
}

</style>

<link href="/Public/public/ie/css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="admin_wrapper">

          
            <form action="/Home/Login/login" id="loginform" method="post">
 
                   
                    <!--START LOGO  --> 
                    
                    <div id="logo">
                    
                    <h1>安徽邮政<span>金融</span>兑换</h1>
                    
                    </div>
                  
                
                    <!-- TEXTBOXES -->
                    <label>用户名</label><br />
                    <input name="username" type="text" class="text large required" id="username" />
                    <br />
    				
                    <div class="clearfix">&nbsp;</div
                    
                    ><label>密码</label><br />
                    <input name="password" type="password" class="text large required" id="password" />
                     <br />
                
              		 <div class="clearfix">&nbsp;</div>
                
                <p>
                    <input name="btnLogin" type="submit"  id="btnLogin" value="登录" />
                    
              </p>
            </form>

    </div><!-- end admin wrapper -->
    
</body>
</html>