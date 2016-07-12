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

<!-- 客户信息查询=====孙云峰 -->

    <h2>接收明细查询</h2>     
	
    <div class="clearfix">&nbsp;
    <form action="/Home/GroceryLog/rvCheck"  method="post" class="form-horizontal">
    
    	﻿		<input type="hidden" value="<?php echo ($instno); ?>" id="instnum"/>
		<input type="hidden" value="<?php echo ($instlv); ?>" id="instlevel"/>
		<?php if(($instlv) <= "3"): if(($instlv) <= "1"): ?><label>市级机构:</label>
			<select class="comheight" id="citys" name="citys" >
					<option value="-1">---请选择市---</option>
			</select><?php endif; ?>
			<?php if(($instlv) <= "2"): ?><label>县级机构:</label>
			<select class="comheight" id="countys" name="countys">
				<option value="-1">---请选择县---</option>
			</select><?php endif; ?>
			<label>网点机构:</label>
			<select class="comheight" id="instno" name="instno">
				<option value="-1">---请选择网点---</option>
			</select><?php endif; ?>
		<?php if(($instlv) == "4"): ?><input id="instno" name="instno"  type="hidden"><?php endif; ?>
　　　	　　
		<br /><br />
		<label>礼品名称:　</label><input type="text" class="text" name="gift_name"  />
		　<label>礼品属性:</label><input  type="text" class="text" name="rvgiftlog_type"  />
		<label>礼品条形码:</label><input type="text" class="text" name="rvgiftlog_code"  />	<br/><br/>
		  <label>开始时间:</label><input class="laydate-icon text" id="demo" name="begintime"  >
		　<label>截止时间:</label><input class="laydate-icon text" id="end" name="endtime"  > 
	　　　　<input type="submit"  value="查询" />
		</form>			
	</div>            	
    <table width="100%" border="0" cellpadding="0" cellspacing="0">   
        <tbody><tr class="even">        
                       
            <!-- <th width="5%" scope="col">序号</th> -->
            <th width="15%" scope="col">机构名称</th>
			<th width="15%" scope="col">礼品名称</th>
            <th width="15%" scope="col">条形码</th>
            <th width="10%" scope="col">给予方机构号</th>
			 <th width="10%" scope="col">属性</th>
			   <th width="10%" scope="col">接收数量</th>
            <th width="15%" scope="col">录入时间</th>           
        </tr>
    <?php if(is_array($logList)): $i = 0; $__LIST__ = $logList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>   
           
            <td scope="col"><?php echo ($vo["inst_name"]); ?></td>
            <td scope="col"><?php echo ($vo["gift_name"]); ?></td>
            <td scope="col"><?php echo ($vo["rvgiftlog_code"]); ?></td>
            <td scope="col"><?php echo ($vo["exgiftlog_inst"]); ?></td>
            <td scope="col"><?php echo ($vo["rvgiftlog_type"]); ?></td>
            <td scope="col"><?php echo ($vo["rvgiftlog_num"]); ?></td>
            <td scope="col"><?php echo ($vo["rvgiftlog_time"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
    </tbody></table> 
   <div class="pagelist"><?php echo ($page); ?></div> 
           <div class="clearfix">&nbsp;</div>
		  


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