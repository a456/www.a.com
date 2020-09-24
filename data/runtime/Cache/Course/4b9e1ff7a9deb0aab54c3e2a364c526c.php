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
<body class="J_scroll_fixed">
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('AdminLabel/index');?>">标签列表</a></li>
     <li><a href="<?php echo U('AdminLabel/add');?>">添加标签</a></li>
  </ul>
  <div class="common-form">
    <form class="js-ajax-form" action="" method="post">
      <table width="100%" class="table table-hover  table-list">
        <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
	            <th width="50">排序</th>
	            <th width="40">ID</th>
	            <th>标签名称</th>
	            <th>所属分类</th>
	            <th width="100">操作</th>
	          </tr>
        </thead>
        	
        	<?php if(is_array($label)): foreach($label as $key=>$vo): ?><tr> 
		            <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
		            <td><input name="listorders[<?php echo ($vo["id"]); ?>]" class="input input-order"  type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
		            <td><a><?php echo ($vo["id"]); ?></a></td>
		            <td><?php echo ($vo["labelname"]); ?></td>
                    <td><?php echo ($vo["typename"]); ?>
    	            </td>
		            <td><a class="js-ajax-delete" href="<?php echo u('AdminLabel/delete',array('id'=>$vo['id']));?>">删除</a> 
		            </td>                              
	          	</tr><?php endforeach; endif; ?>
          <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
	            <th width="50">排序</th>
	            <th width="40">ID</th>
	            <th>课程名称</th>
	            <th>所属分类</th>           
	            <th width="100">操作</th>
	          </tr>
        </thead>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>   
      <div class="form-actions">                       
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminLabel/listorders');?>">排序</button>
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminLabel/delete');?>">删除</button>
      </div>
  </form>
  </div>
</div>
<script type="text/javascript" src="/public/js/common.js"></script>
</body>
</html>