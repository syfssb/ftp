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
							<h2>提前兑换会员信息</h2>  
							<div class="clearfix">&nbsp;
							</div> 
							<form action="/Home/Ex/ahead_Ex"  method="post" class="form-horizontal" name="queryFen">
							<label>会员身份证:　</label><input type="text"  name="vrp_ctf"  value="" id="vrp_ctf"/>
							　　　　　　　　<input type="button"   value="查询" id="querySub"/>　　　　　<br><br>
							<font color="red" style="font-size: 25px"><strong id="er"><?php echo ($vrplist["err"]); ?></strong></font><br><br>
							<label>会员姓名:</label><font id="flag"><?php echo ($vrplist["0"]["vrp_name"]); ?></font><br><br>   
							<label>会员级别:</label> <?php echo ($vrplist["0"]["vrp_lv"]); ?><br><br>
							<label>会员信用状态:</label> <?php echo ($vrplist["0"]["vrp_xstate"]); ?><br><br>
							<label>会员状态:</label> <?php echo ($vrplist["0"]["vrp_state"]); ?><br><br>
							
							　　　　　　　　　　　　
							
							
							
							
							<!-- 		<a href="/Home/Ex/aheadShow/ctf/<?php echo ($vrplist["0"]["vrp_ctf"]); ?>/name/<?php echo ($vrplist["0"]["vrp_name"]); ?> "  id="showL"> 前往兑换</a>  -->
							
							</form > 
							<form action="/Home/Ex/aheadShow" method="post" name="aheadshow">
							<input type="hidden" name="ctf" value="<?php echo ($vrplist["0"]["vrp_ctf"]); ?>">
							<input type="hidden" name="name" value="<?php echo ($vrplist["0"]["vrp_name"]); ?>">
							<input type="hidden" name="sql" value="">
							<div id="data">
							<input type="button" name="add"  value="添加业务类别" onclick="addActive(this)">
							
							</div>
							<br/><br/>
							<input type='button' id='showL' value='前往提前兑换' />　　　　　　　　　　　　　　　　　　　　　　　　
							</form>
							<script type="text/template" id="tr-template">
							<div name="activesdatas">
							<br/><br/>
							<label>请填写单号:</label>
							<input type='text' name='itemcode' value='' onblur="checkitem(this)"/>　<font color="red" name="error"></font>　　　
							<label>搜索业务:</label>
							<input type="text" onpropertychange="getActiveByInput(this)" />　　
							<label>业务类别:</label>
							<select name="actives" onchange="checkselect(this)"> <option value="-1">-----请选择------ </option></select><font color="red" name="error"></font><br/><br/>
							<label>转介标识: 　</label>
							<select name="flagJ" onchange="checksflag(this)">
							<option value="-1">-----请选择------ </option>
							<option value="自主办理">自主办理</option>
							<option value="推荐">推荐</option>
							<option value="便民">便民</option>
							</select><font color="red" name="error"></font>
<span id="phonespan" style="width:500px;"></span>
							<input type='button' name='dele' value='撤除'   onclick="deleteData(this)"/>
							</div>
							</script>
							
							<script type="text/template" id="tr-phone">
							<label>推荐人或转介人手机:</label>
							<input type='fphone' name='fphone' value='' onblur="checkphone(this)"/>　<font color="red" name="error"></font>
							</script>

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