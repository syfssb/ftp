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
                        <h2>积分兑换</h2>  
                        <div class="clearfix">&nbsp;
                        <!-- <p name="time">11</p> -->
                        </div>
                        
                        <form action="/Home/Ex/duiAction"  method="post" class="form-horizontal" name="DuiHuan"> 
                         <input type='hidden' name='graocrydata' value=''/>
                        <input type="hidden" name="gracelog" value=""/>
                        <!-- <input type="hidden" name="sumfen[]" value=''/> -->
                        <label>姓名:</label><font color=" #0000E3" style="font-size: 25px" ><strong id="vname"><?php echo ($name); ?></strong></font> 
                        　　　　　　　<label>可用积分:</label><font color="red" style="font-size: 25px" ><strong id="avfen"><?php echo ($fen); ?></strong></font> 　　　　　　　　　　　　<label>已用积分:</label><font color="red" style="font-size: 25px" ><strong id="hfen">0</strong></font><br/><br/>
                        <input type="hidden" name="nowgrate" value="<?php echo ($nowgrate); ?>">
                        <input type="hidden" name="ctf" value="<?php echo ($ctf); ?>">
                        <input type="hidden" name="userName" value="<?php echo ($userName); ?>">
                        　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<input type="button" name="sub" value="兑换" >
                        
                        
                        
                        
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">   
                        <tbody><tr class="even">        
                        
                        <th width="5%" scope="col">选择<input type="checkbox" name="deleall" /></th> 
                        <th width="20%" scope="col">礼品名称</th>
                        <th width="15%" scope="col">条形码</th>
                        <th width="10%" scope="col">来源</th>
                        <th width="10%" scope="col">属性</th>
                        <th width="10%" scope="col">兑换分值(已计算兑换率)</th>
                        <th width="10%" scope="col">剩余数量</th>
                        
                        <th width="20%" scope="col">选择数量</th>           
                        </tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 库存表 -->
						<div style="width:0px; height:0px;display:inline-block; line-height:0px; overflow:hidden;">
                        <font style="font-size:0;"  name ="<?php echo ($vo["id"]); ?>f"><?php echo ($vo["id"]); ?></font>
                        <font style="font-size:0;" name ="<?php echo ($vo["id"]); ?>f"><?php echo ($instno); ?></font>
                        <font style="font-size:0;" name ="<?php echo ($vo["id"]); ?>f"><?php echo ($vo["inst_gift_code"]); ?></font>
                        <font style="font-size:0;" name ="<?php echo ($vo["id"]); ?>f"><?php echo ($vo["inst_gift_grate"]); ?></font>
                        <font style="font-size:0;" name ="<?php echo ($vo["id"]); ?>f"><?php echo ($vo["inst_gift_source"]); ?></font>
                        <font style="font-size:0;" name ="<?php echo ($vo["id"]); ?>f"><?php echo ($vo["giftlog_type"]); ?></font>
                        <font style="font-size:0;" name ="<?php echo ($vo["id"]); ?>f"><?php echo ($vo["inst_gift_num"]); ?></font>
						</div>
                        <tr id="<?php echo ($vo["id"]); ?>">   
                        
                        <td scope="col"><input type="checkbox" name="<?php echo ($vo["id"]); ?>" onchange="showH(this)"/> </td> 
                        <td scope="col" name="gname"><?php echo ($vo["gift_name"]); ?></td>
                        <td scope="col" name="gcode"><?php echo ($vo["inst_gift_code"]); ?></td>     
                        <td scope="col" name="gsource"><?php echo ($vo["inst_gift_source"]); ?></td>
                        <td scope="col" name="gtype"><?php echo ($vo["giftlog_type"]); ?></td>           
                        <td scope="col" name="ggrate"><?php echo ($vo["fendisc"]); ?></td>
                        <td scope="col" name="gnum"><?php echo ($vo["inst_gift_num"]); ?></td>
                        <td scope="col" name="<?php echo ($vo["id"]); ?>"></td>
                        
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody></table> 
                        </form> 
                        
                        <!-- <font color="red" style="font-size: 25px"><strong>21</strong></font>   -->
                        　　　　 
                        
                        <div class="clearfix">&nbsp;</div>
                        <!-- 动态添加html代码块 ============-->
                        <script type="text/template" id="tr-template">
                        <input type="text" class="only" name="num[]" value="0" onblur="checkNum(this)" />
                        <font name="error" color="red"></font>
						<div style="width:0px; height:0px;display:inline-block; line-height:0px; overflow:hidden;">
                        <font  style="font-size:0;" name='graocrydataO'></font>
                        <font  style="font-size:0;" name="gracelogO"></font>
						</div>
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