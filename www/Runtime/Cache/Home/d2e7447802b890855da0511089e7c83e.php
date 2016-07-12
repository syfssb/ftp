<?php if (!defined('THINK_PATH')) exit();?>﻿
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>安徽省代理金融积分兑换系统</title>

<script type="text/javascript" src="/Public/public/ie/js/jquery.min.js"></script>

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
<!-- 会员新增=====张冬冬-->
	<style type="text/css">
		#msform fieldset:not(:first-of-type) {
			display: none;
		}
	</style>
    <h2>会员新增</h2>              
    <div class="clearfix">
    <form action="/Home/Member/vrp_Add" id="msform" name="vrpadd" method="post" class="form-horizontal">
		<fieldset>
		<input type="hidden" value="<?php echo ($userinst); ?>" name="mb_inst"/>
		<p>
		<label>身份证号:</label><input type="text" class="text" name="mb_ctf" id="mb_ctf"/><font color="red" name="error"></font>
		</p>
		<p>　　　　　　　　　　　　　　　
		<input type="button" name="next" class="next" value="下一步"/>
		</p>
		</fieldset>
		<fieldset style="display:none;">
		<p>
		<label>姓名:</label><input type="text" class="text" name="mb_name" id="mb_name"/><font color="red" name="error"></font>
		</p>
		<p>
		<label>手机号码:</label><input type="text" class="text" name="mb_phone" id="mb_phone" /><font color="red" name="error"></font>
		</p>
		<p>
		<label>客户级别:</label>
		<select id="mb_lv" name="mb_lv" >
			<option value="普通客户" selected="selected">普通客户</option>
			<option value="金卡客户">金卡客户</option>
			<option value="白金卡客户">白金卡客户</option>
			<option value="钻石卡客户">钻石卡客户</option>
		</select>
		<font color="red" name="error"></font>
		</p>
		<p>
		<label>剩余积分:</label><input type="text" class="text" name="mb_validate" id="mb_validate" value="0" readonly="readonly" /><font color="red" name="error"></font>
		</p>
		<p>
		<label>可兑换积分:</label><input type="text" class="text" name="mb_svalidate" id="mb_svalidate" value="0" readonly="readonly"/><font color="red" name="error"></font>
		</p>
		<p>
		<label>联系地址:</label><input type="text" class="text" name="mb_address" id="mb_address" /><font color="red" name="error"></font>
		</p>
		<p>
		<label>客户属性:</label>
		<select id="mb_type" name="mb_type" >
			<option value="外出务工">外出务工</option>
			<option value="商贸">商贸</option>
			<option value="社区居民">社区居民</option>
			<option value="种植户">种植户</option>
			<option value="养殖户">养殖户</option>
			<option value="夕阳红">夕阳红</option>
			<option value="上班族">上班族</option>
			<option value="其他" selected="selected">其他</option>
		</select>
		<font color="red" name="error"></font>
		</p>
		<p>
		<label>信用状态:</label>
		<select id="mb_xstate" name="mb_xstate" >
			<option value="良好" selected="selected">良好</option>
			<option value="黑名单用户">黑名单用户</option>
		</select>
		<font color="red" name="error"></font>
		</p>
		<p>
		<label>会员状态:</label>
		<select id="mb_state" name="mb_state" >
			<option value="开启" selected="selected">开启</option>
			<option value="停止">停止</option>
		</select>
		<font color="red" name="error"></font>
		</p>
		<p>
		<input type="button" name="previous" class="previous" value="上一步" />　　
		<!--<input type="submit" name="submit" class="submit" value="提交" />-->
		<input id="vvaa" type="submit"  class="" value="添 加" />
		</p>
		</fieldset>
		
		
	</form>
	</div>
	
    <div class="clearfix">&nbsp;</div>
<script src="/Public/Home/js/Member/jquery.easing.min.js"></script>
<script src="/Public/Home/js/Member/vrpAdd.js"></script>
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