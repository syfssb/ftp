<?php if (!defined('THINK_PATH')) exit();?>﻿
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>安徽省代理金融积分兑换系统</title>

<script type="text/javascript" src="/Public/public/ie/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/Public/public/ie/js/jquery-form.js"></script> -->

    <!-- MASTER STYLESHEET-->
    <link href="/Public/public/ie/css/styles.css" rel="stylesheet" type="text/css">
    
    <!-- LOAD TIPSY TOOLTIPS-->
    <script type="text/javascript" src="/Public/public/ie/js/jquery.tipsy.js"></script>
   
    <!-- LOAD CUSTOM JQUERY SCRIPTS-->
    <script type="text/javascript" src="/Public/public/ie/js/scripts.js"></script>	
    
	 <!-- LOAD FACEBOX -->
	<script type="text/javascript" src="/Public/public/ie/js/facebox.js"></script>
    <link href="/Public/public/ie/css/facebox.css" rel="stylesheet" type="text/css">
    
	<link href="/Public/Home/common/css/common.css" rel="stylesheet" type="text/css">
      <!-- LOAD FLOT GRAPHS 
    <script type="text/javascript" src="/Public/public/ie/js/jquery.flot.pack.js"></script>-->
    <!--[if IE]>
     <script language="javascript" type="text/javascript" src="js/excanvas.pack.js"></script>
    <![endif]-->
   
    
    <!--[if IE 6]>
    <script src="/Public/public/ie/js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('.png_bg');
    </script>        
    <![endif]-->
     <!-- LOAD GRAPH JAVASCRIPT FILE
    <script src="/Public/public/ie/js/graphs.js" type="text/javascript"></script>-->
    <script src="/Public/public/laydate/laydate.js"></script>
    <link type="text/css" rel="stylesheet" href="/Public/public/laydate/need/laydate.css">
    <link type="text/css" rel="stylesheet" href="/Public/public/laydate/skins/molv/laydate.css" id="LayDateSkin">
    <style type="text/css">
.pos_abs
{
position:absolute;
left:100px;
top:700px
}
.div_abs{
    position:absolute;
left:235px;
}

</style>

</head>

<body>

<div id="header" class="png_bg" style="TEXT-ALIGN: center;">

    <div id="head_wrap" class="container_12  " style=" MARGIN-RIGHT: auto; MARGIN-LEFT: auto;">
    
        <!-- start of logo - you could replace this with an image of your logo -->
        <div id="logo" class="grid_4">
          <h1>安徽邮政<span>金融兑换</span></h1>
        </div>
        <!-- end logo -->
        
        <!-- start control panel -->
    	<div id="controlpanel" class="grid_8">
        
            <ul>
            
    			<li><p><strong>你好，<?php echo ($userName); ?></strong></p></li>
                <li><a href="/Home/Login/outLogin" class="last" id="outlogin">退出登录</a></li>
            </ul>

        </div>
        <!-- end control panel -->
    
        <!-- start navigation -->
      	<div id="navigation" class=" grid_12" style="center">
    <ul>
	<li><a href="/Home/Member/index" >会员信息</a></li>
	<li><a href="/Home/Memberlog/index" >会员信息更改日志</a></li>
	<li><a href="/Home/Grocery/index">礼品库存信息</a></li>
	<li><a href="/Home/GroceryLog/index" >礼品库存出入日志</a></li>
	<li><a href="/Home/Grate/index" >兑换比率信息</a></li>
	<li><a href="/Home/GrateLog/index" >兑换比率更换日志</a></li>
	<?php if(($instlv) == "1"): ?><li><a href="/Home/Active/index" >业务类别信息</a></li><?php endif; ?>
    <?php if(($instlv) == "4"): ?><li><a href="/Home/Ex/index" >积分兑换</a></li><?php endif; ?>
    <?php if(($instlv) == "4"): ?><li><a href="/Home/Ex/ahead_Ex" >提前兑换</a></li><?php endif; ?>
	<?php if(($instlv) < "4"): ?><li><a href="/Home/User/index" >用户信息</a></li><?php endif; ?>
	
	
</ul>
          
        </div>
        <!-- end navigation -->
     
    </div><!-- end headwarp  -->
</div><!-- end header -->



<div class="container_12 div_abs">

<img src="/Public/Home/common/ss.jpg"/>
	
<!--    <h2>#表格名称#</h2>                   
    <div class="clearfix">&nbsp;
		市级机构:
		<select class="comheight" id="citys">
				<option value="-1">---请选择市---</option>
		</select>
		县级机构:
		<select class="comheight" id="countys">
			<option value="-1">---请选择县---</option>
		</select>
		网点机构:
		<select class="comheight" id="instno">
			<option value="-1">---请选择网点---</option>
		</select>
		
		<input class="laydate-icon" id="demo" readonly="readonly">
	</div>
            	
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    
        <tbody><tr class="even">
        
            <th width="5%" scope="col">
            <input type="checkbox" name="checkbox" id="checkbox" class="checkall"><label for="checkbox"></label></th>
            
            <th width="18%" scope="col">名</th>
            <th width="16%" scope="col">姓</th>
            <th width="29%" scope="col">邮箱</th>
            <th width="13%" scope="col">开始日期</th>
            <th width="11%" scope="col">结束日期</th>
            <th width="8%" scope="col">状态</th>
        </tr>
        
        <tr>
        
            <td scope="col"><input type="checkbox" name="checkbox2" id="checkbox2"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">24/02/2010</td>
            <td scope="col">12/12/2011</td>
            
        </tr>
        
        <tr class="even">
        
            <td scope="col"><input type="checkbox" name="checkbox3" id="checkbox3"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">12/09/2009</td>
            <td scope="col">21/12/2011</td>
            
        </tr>
        
        <tr>
            <td scope="col"><input type="checkbox" name="checkbox4" id="checkbox4"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">05/09/2009</td>
            <td scope="col">12/11/2011</td>
           
        </tr>
        
        <tr class="even">
        
            <td scope="col"><input type="checkbox" name="checkbox5" id="checkbox5"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">12/06/2009</td>
            <td scope="col">13/08/2011</td>
            
        </tr>
        
        <tr>
        
            <td scope="col"><input type="checkbox" name="checkbox6" id="checkbox6"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">05/06/2009</td>
            <td scope="col">14/7/2011</td>
            
        </tr>


        
        <tr class="even">
            <td scope="col"><input type="checkbox" name="checkbox7" id="checkbox7"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>                   
            <td scope="col">12/09/2009</td>
            <td scope="col">21/08/2011</td>
            
        </tr>
        
        <tr>
            <td scope="col"><input type="checkbox" name="checkbox8" id="checkbox8"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">08/12/2009</td>
            <td scope="col">22/10/2011</td>
           
        </tr>
        
        <tr class="even">
        
            <td scope="col"><input type="checkbox" name="checkbox9" id="checkbox9"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">12/09/2009</td>
            <td scope="col">28/09/2011</td>
            
        </tr>
        
        <tr>
        
            <td scope="col"><input type="checkbox" name="checkbox10" id="checkbox10"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>                
            <td scope="col">05/04/2009</td>
            <td scope="col">21/12/2011</td>
            
        </tr>
        
        <tr class="even">
            <td scope="col"><input type="checkbox" name="checkbox11" id="checkbox11"></td>
            <td scope="col">Johnathan</td>
            <td scope="col">Doe</td>
            <td scope="col"><a href="#">john.doe@myinternet.com</a></td>
            <td scope="col">12/7/2009</td>
            <td scope="col">21/12/2011</td>
           
        </tr>
    </tbody></table>
    
    <!-- END TABULAR DATA EXAMPLE
      
           
           
           <div class="grid_12">
           
           <div class="clearfix">&nbsp;</div>
           
            <ul id="pagination">
                <li class="previous-off">上一页</li>
                <li class="active">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
                <li class="next"><a href="#">下一页</a></li>
                
            </ul>
           </div>           

           
           <div class="clearfix">&nbsp;</div> -->

</div>

   <!-- START FOOTER -->
    
    <div id="footer" class="grid_12 pos_abs">
    
        <!--<p>© Copyright 2016 <a href="#" target="_blank">安徽邮政</a> </p>--> 
        
	</div>
    <!-- END FOOTER -->   
</body>
</html>
<script src="<?php echo ($path); ?>"></script>
<script src="/Public/Home/Main.index.js"></script>
<script type="text/javascript">
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    //min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    //min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);
</script>