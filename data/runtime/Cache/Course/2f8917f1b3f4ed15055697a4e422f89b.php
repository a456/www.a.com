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
<div class="wrap js-check-wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('AdminCourse/index');?>"  target="_self">所有课程</a></li>
     <li><a href="<?php echo U('AdminCourse/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>"  target="_self">添加课程</a></li>
  </ul>
  <form class="well form-search" method="post" action="<?php echo u('AdminCourse/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">分类：
        <select class="select_2" name="term">
          	<option value='0' >全部</option>
          	<?php echo ($taxonomys); ?>
        </select>
        &nbsp;&nbsp;时间：
        <input type="text" name="start_time" class="input length_2 js-date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width:100px;" autocomplete="off">-<input type="text" class="input length_2 js-date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:100px;" autocomplete="off">
        
        <!-- 
        <select class="select_2" name="searchtype" style="width:70px;">
          <option value='0' >标题</option>
        </select>
         -->
               &nbsp; &nbsp;关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入关键字...">
        <input type="submit" class="btn" value="搜索"/>
        </span>
      </div>
    </div>
  </form>
  <form class="js-ajax-form" action="" method="post">
      <table width="100%" class="table table-hover  table-list">
        <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
	            <th width="50">排序</th>
	            <th width="40">ID</th>
	            <th>课程名称</th>
	            <th>所属分类</th>
	            <th width="100">标签</th>
	            <th width="60">学员数</th>
	            <th width="60">发布人</th>
	            <th width="130"><span>发布时间</span></th>
	            <th width="60">状态</th>
	            <th width="100">操作</th>
	          </tr>
        </thead>
        	<?php $status=array("1"=>"已审核","0"=>"未审核"); $recommend_status=array("1"=>"已推荐","0"=>"未推荐"); ?>
        	<?php if(is_array($courselist)): foreach($courselist as $key=>$vo): ?><tr> 
		            <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
		            <td><input name="listorders[<?php echo ($vo["id"]); ?>]" class="input input-order"  type='text' size='3' value='<?php echo ($vo["listorder"]); ?>'></td>
		            <td><a><?php echo ($vo["id"]); ?></a></td>
		            <td><span><?php echo ($vo["cs_name"]); ?></span></td>
                    <td>
    	               <?php echo ($vo["coursetype_name"]); ?>
    	            </td>
    	            <td>
    	               <?php echo (getlablename($vo["labelid"])); ?>
    	            </td>
    	            <td>
    	               <?php echo ($vo["cs_xuni"]); ?>
    	            </td>
		            <td><?php echo ($vo["cs_teacher"]); ?></td>
		            <td><?php echo ($vo["cs_addtime"]); ?></td>
		            <td><?php echo ($status[$vo['cs_state']]); ?><br><?php echo ($recommend_status[$vo['is_tuijian']]); ?></td>
		            <td>
		                <div class="btn-group">
		                   <a  class="btn btn-default btn-sm" href="<?php echo u('course/AdminSection/add',array('cs_id'=>$vo['id']));?>">添加</a>
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                             <span class="caret"></span>
                             <span class="sr-only"></span>                             
                           </button>                          
                           <ul class="dropdown-menu pull-right" role="menu" >
                             <li><a href="<?php echo u('course/AdminSection/index_cs',array('cs_id'=>$vo['id']));?>">课时列表</a></li>
                             <li><a href="<?php echo u('course/AdminMaterial/index_cs',array('cs_id'=>$vo['id']));?>">资料列表</a></li>
                             <li><a href="javascript:open_iframe_dialog('<?php echo U('Course/AdminCourse/xueyuan',array('cs_id'=>$vo['id']));?>','学员列表')">学员列表</a></li>
                             <li><a href="javascript:open_iframe_dialog('<?php echo U('Course/AdminCourse/pinglun',array('cs_id'=>$vo['id']));?>','评论列表')">评论列表</a></li>
                             <li><a href="<?php echo u('card/AdminCard/index_cs',array('cs_id'=>$vo['id']));?>">激活点卡</a></li>
                             <li class="divider"></li>
                             <li><a href="<?php echo U('AdminCourse/edit',array('id' => $vo['id']));?>">修改课程</a></li>
                             <li><a href="<?php echo U('AdminCourse/delete',array('id' => $vo['id']));?>" class="js-ajax-delete" data-subcheck="true" data-msg="你确定删除吗？">删除课程</a></li>
                           </ul>
                          </div>
					</td>
	          	</tr><?php endforeach; endif; ?>
          <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
	            <th width="50">排序</th>
	            <th width="40">ID</th>
	            <th>课程名称</th>
	            <th>所属分类</th>
	            <th width="100">标签</th>
	            <th width="60">学员数</th>
	            <th width="60">发布人</th>
	            <th width="130"><span>发布时间</span></th>
	            <th width="60">状态</th>
	            <th width="100">操作</th>
	          </tr>
        </thead>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>   
      <div class="form-actions">                       
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminCourse/listorders');?>">排序</button>
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminCourse/check',array('check'=>1));?>" data-subcheck="true" >审核</button>
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminCourse/check',array('uncheck'=>1));?>" data-subcheck="true" >取消审核</button>
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminCourse/recommend',array('recommend'=>1));?>" data-subcheck="true" >推荐</button>
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo U('AdminCourse/recommend',array('unrecommend'=>1));?>" data-subcheck="true">取消推荐</button>
        <button class="btn btn-primary js-ajax-submit" type="submit" data-action="<?php echo u('AdminCourse/delete');?>">删除</button>
        <button class="btn btn-primary" type="button" id="J_Content_remove">批量移动</button>
      </div>
  </form>
</div>
<script src="/public/js/common.js"></script>
<script>
function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location="<?php echo u('AdminCourse/index',$formget);?>";
    }
}
setInterval(function(){
	refersh_window();
}, 2000);
$(function () {
	setCookie("refersh_time",0);
    Wind.use('ajaxForm','artDialog','iframeTools', function () {
        //批量移动
        $('#J_Content_remove').click(function (e) {
            var str = 0;
            var id = tag = '';
            $("input[name='ids[]']").each(function () {
                if ($(this).attr('checked')) {
                    str = 1;
                    id += tag + $(this).val();
                    tag = ',';
                }
            });
            if (str == 0) {
				art.dialog.through({
					id:'error',
					icon: 'error',
					content: '您没有勾选信息，无法进行操作！',
					cancelVal: '关闭',
					cancel: true
				});
                return false;
            }
            var $this = $(this);
            art.dialog.open("/index.php?g=course&m=AdminCourse&a=move&ids=" + id, {
                title: "批量移动",
                width:"80%"
            });
        });
    });
});


</script>
</body>
</html>