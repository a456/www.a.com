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
</head>
<body class="J_scroll_fixed">
<div class="wrap js-check-wrap">
  <form class="well form-search" method="post" action="<?php echo u('AdminOrder/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">分类：
        <select class="select_2" name="type">
          	<option value='0' >全部</option>
          	   <option value='2' >未支付</option>
          	   <option value='1' >支付成功</option>
          	   <option value='3' >订单失效</option>
        </select>
        &nbsp;&nbsp;时间：
        <input type="text" name="start_time" class="input length_2 js-date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width:100px;" autocomplete="off">-<input type="text" class="input length_2 js-date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:100px;" autocomplete="off">
        &nbsp; &nbsp;关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入订单号...">
        <input type="submit" class="btn" value="搜索"/>
        </span>
      </div>
    </div>
  </form>
  <form class="js-ajax-form" action="" method="post">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
	            <th width="40">ID</th>
	            <th>订单号</th>
				<th>支付宝订单号</th>
	            <th>用户名</th>
                <th>订单金额</th>  
                <th>支付状态</th>           
	            <th>创建时间</th>
	           
	          </tr>
        </thead>
        	<?php $status=array("1"=>"<font color='green'>支付成功</font>","2"=>"<font color='red'>未支付</font>","3"=>"订单失效"); ?>
        	<?php if(is_array($order)): foreach($order as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
		            <td><?php echo ($vo["id"]); ?></td>
		            <td><?php echo ($vo["order"]); ?></td>
					<td><?php echo ($vo["alipayorder"]); ?></td>
		            <td><?php echo (getusername($vo["user_id"])); ?></td>
    	            <td><?php echo ($vo["total"]); ?> 元</td>
    	            <td><?php echo ($status[$vo['state']]); ?></td>
		            <td><?php echo ($vo["addtime"]); ?></td>
	          	</tr><?php endforeach; endif; ?>
          <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
	            <th width="40">ID</th>
	            <th>订单号</th>
				<th>支付宝订单号</th>
	            <th>用户名</th>
                <th>订单金额</th>  
                <th>支付状态</th>           
	            <th>创建时间</th>
	          </tr>
          </thead>
          </table>
          <div class="pagination"><?php echo ($page); ?></div>
      
  </form>
</div>
<script src="/public/js/common.js"></script>
</body>
</html>