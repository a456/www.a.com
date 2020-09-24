<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		 form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
		.progress {
    overflow: hidden;
    height: 15px;
    margin-bottom: 5px;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}
	.progress-bar-success {
    background-color: #70d445;
}
.progress-bar {
    float: left;
    width: 0%;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #46c37b;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
    -webkit-transition: width 0.6s ease;
    -o-transition: width 0.6s ease;
    transition: width 0.6s ease;
}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<style>
.home_info li em {
	float: left;
	width: 120px;
	font-style: normal;
}
li {
	list-style: none;
}
.admin_info1 {
    height: 250px;
    width:24%;
    float: left;
    margin: 10px 0px;
    border: 1px #dddddd solid;
    border-radius: 4px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    background: #fff;
}
.opb1 {
    width: 100%;
    float: left;
    display: block;
    font-size: 16px;
    padding: 10px 0;
    color: #82d896;
    border-bottom: 1px #dddddd solid;
    border-radius: 4px 4px 0px 0px;
    border-top-left-radius: 4px;
    border-top-right-radius:4px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    margin-bottom: 8px;
    position: relative;
}
.opb3 {
    background:  #eaeaea ;
}
.admin_info2 {
    width: 100%;
    float: left;
    display: block;
    text-indent: 15px;
    font-size: 14px;
    padding: 14px 0;
    position: relative;
}

.kong{
    width:9px;
    height:200px;
    float:left;
}
</style>
</head>
<body>
   <div class="wrap">
         <div class="home_info">
			<ul id="notices">

			</ul>
		</div>
         <div class="col-md-3">
            <div class="admin_info1 ">
              <div class="opb1 opb3 text-center">课程统计</div>
              <div class="admin_info2">总课程数：<?php echo ($t_course); ?></div> 
              <div class="admin_info2">本日新增：<?php echo ($d_course); ?></div>  
              <div class="admin_info2">本周新增：<?php echo ($z_course); ?></div> 
              <div class="admin_info2">本月新增：<?php echo ($y_course); ?></div>        	 
        	</div>
         </div><div class="kong"></div>
         <div class="col-md-3">	 
            <div class="admin_info1">
               <div class="opb1 opb3 text-center">学员统计</div>
               <div class="admin_info2">学员总数：<?php echo ($t_user); ?></div>	
   	           <div class="admin_info2">本日新增：<?php echo ($d_user); ?></div>  
              <div class="admin_info2">本周新增：<?php echo ($z_user); ?></div> 
              <div class="admin_info2">本月新增：<?php echo ($y_user); ?></div>  
        	</div>
        </div> <div class="kong"></div>  
        <div class="col-md-3">
            <div class="admin_info1">
               <div class="opb1 opb3 text-center">订单统计</div>
            
               <div class="admin_info2">订单总数：<?php echo ($t_order); ?></div>	
       	       <div class="admin_info2">本日新增：<?php echo ($d_order); ?></div>
               <div class="admin_info2">已支付订单：<?php echo ($order_1); ?></div>
               <div class="admin_info2">未支付订单：<?php echo ($order_2); ?></div>  
        	 
        	</div>
      	</div> <div class="kong"></div> 
         <div class="col-md-4">
            <div class="admin_info1">
               <div class="opb1 opb3 text-center">文章统计</div>
            
               <div class="admin_info2">文章总数：<?php echo ($t_article); ?></div>	
       	       <div class="admin_info2">本日新增：<?php echo ($d_article); ?></div>
               <div class="admin_info2">本周新增：<?php echo ($z_article); ?></div> 
               <div class="admin_info2">本月新增：<?php echo ($y_article); ?></div>  
        	</div>
      	</div>
        <div class="col-md-12">
            <div class="admin_info1" style="height: 450px;width:100%">
               <div class="opb1 opb3 text-center">服务器信息[莎莎源码倾情奉献 bbs.sasadown.cn]</div>
               <?php if(is_array($server_info)): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="admin_info2"><?php echo ($key); ?>：<span><?php echo ($vo); ?></span></div><?php endforeach; endif; else: echo "" ;endif; ?>
        	</div>
      	</div>
        
 
	</div>
	<script src="/public/js/common.js"></script>
	
	
</body>
</html>