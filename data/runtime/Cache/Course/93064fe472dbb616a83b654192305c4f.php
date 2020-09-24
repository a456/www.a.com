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
<style type="text/css">
.pic-list li {
	margin-bottom: 5px;
}
</style>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
          <li><a href="<?php echo U('AdminCourse/index');?>"  target="_self">所有课程</a></li>
          <li class="active"><a href="<?php echo U('AdminCourse/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>"  target="_self">添加课程</a></li>
        </ul>
        <form name="myform" id="myform" action="<?php echo u('AdminCourse/add_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
			<div class="row-fluid">
				<div class="span9">
					<table class="table table-bordered">
						<tr>
              <th width="80">课程分类</th>
              <td>
              	<select name="ty_id" id='first' class="normal_select">
						<?php echo ($taxonomys); ?>
				</select>
				
				<span id="second"> 
                  <select id="label" name="labelid"> 
                  
                  </select> 
                </span> 
              </td>
            </tr>
            <tr>
              <th width="80">课程名称</th>
			  <input type="hidden" name="domain" id="domain" value=<?php echo ($domain); ?>></>
              <td>
              	<input type="text" style="width:350px;" name="cs_name" id="cs_name"   value="" style="color:" class="input input_hd J_title_color" placeholder="请输入标题" onkeyup="strlen_verify(this, 'title_len', 160)" />
              </td>
            </tr>
            <tr>
              <th width="80">课程价格</th>
			  <input type="hidden" name="code" id="code" value=""></>
              <td><input type='text' name='cs_price' id='cs_price'  value='' style='width:350px'   class='input' > &nbsp &nbsp元</td>
            </tr>
            <tr>
              <th width="80">章节数量 </th>
			  <input type="hidden" name="count" id="count" value=""></>
              <td><input type='text' name='sec_numbers' id='sec_numbers'  value='' style='width:350px'   class='input' > &nbsp &nbsp节 </td>
            </tr>
            
            <tr>
              <th width="80">虚拟学员 </th>
              <td><input type='text' name='cs_xuni' id='cs_xuni' value='' style='width:350px'   class='input'> &nbsp &nbsp个</td>
            </tr>
            <tr>
              <th width="80">课程目标 </th>
              <td ><textarea class="form-control" rows="6"  style='width:350px' name="mubiao"></textarea></td>
            </tr>
            <tr>
              <th width="80">适合人群 </th>
              <td><textarea class="form-control" rows="3"  style='width:350px' name="shihe"></textarea></td>
            </tr>
            <tr>
              <th width="80">课程描述</th>
              <td><div id='content_tip'></div>
              <script id="content" type="text/plain" name="cs_brief" style="width:100%;height:500px;"></script>
                <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script>
               <script type="text/javascript" src="/public/js/ueditor/ueditor.config.js"></script>
	           <script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js"></script>
			   <script type="text/javascript" charset="utf-8" src="/public/js/ueditor/lang/zh-cn/zh-cn.js"></script>
				</td>
            </tr> 
					</table>
				</div>
				<div class="span3">
					<table class="table table-bordered">
						<tr>
          <td><b>课程图片</b><font color="red">  建议像素：350*170</font></td>
        </tr>
        <tr>
          <td>
		     <div  style="text-align: center;"><input type='text' name='cs_picture' id='thumb' value=''>
		     	<a href='javascript:void(0);' onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
			    <img src='/admin/themes/simplebootx/Public/assets/images/default-thumbnail.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
            </div>
	      </td>
        </tr>
        <tr>
          <td><b>发布时间</b></td>
        </tr>
        <tr>
          <td><input type="text" name="cs_addtime" id="updatetime" value="<?php echo date('Y-m-d H:i:s',time());?>" size="21" class="input length_3 J_datetime "></td>
        </tr>
        <tr>
          <td><b>审核状态</b></td>
        </tr>
        <tr>
          <td>
          	<span class="switch_list cc">
			<label><input type="radio" name="cs_state" value="1" checked><span>审核通过</span></label>
			<label><input type="radio" name="cs_state" value="0"  ><span>待审核</span></label>
		 	</span>
		 </td>
        </tr>
        <tr>
          <td><b>推荐设置</b></td>
        </tr>
        <tr>
          <td>
          	<span class="switch_list dd">
			<label><input type="radio" name="is_tuijian" value="1" ><span>推荐</span></label>
			<label><input type="radio" name="is_tuijian" value="0" checked ><span>不推荐</span></label>
		 	</span>
		 </td>
        </tr>
					</table>
				</div>
			</div>
			<div class="form-actions">
               <button class="btn btn-primary " type="submit">提交</button>
               <a class="btn" href="<?php echo U('AdminCourse/index');?>">返回</a>
            </div>
		</form>
	</div>
	<script type="text/javascript" src="/public/js/common.js"></script>
	<script type="text/javascript" src="/public/js/content_addtop.js"></script>
	<script type="text/javascript">
		//编辑器路径定义
		var editorURL = GV.DIMAUB;
	</script>
	<script type="text/javascript" src="/public/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/public/js/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript"> 
$(function () {
	//setInterval(function(){public_lock_renewal();}, 10000);
	$(".js-ajax-close-btn").on('click', function (e) {
	    e.preventDefault();
	    Wind.use("artDialog", function () {
	        art.dialog({
	            id: "question",
	            icon: "question",
	            fixed: true,
	            lock: true,
	            background: "#CCCCCC",
	            opacity: 0,
	            content: "您确定需要关闭当前页面嘛？",
	            ok:function(){
					setCookie("refersh_time",1);
					window.close();
					return true;
				}
	        });
	    });
	});
	/////---------------------
	 Wind.use('validate', 'ajaxForm', 'artDialog', function () {
			//javascript
	        
	            //编辑器
	            editorcontent = new baidu.editor.ui.Editor();
	            editorcontent.render( 'content' );
	            try{editorcontent.sync();}catch(err){};
	            //增加编辑器验证规则
	            jQuery.validator.addMethod('editorcontent',function(){
	                try{editorcontent.sync();}catch(err){};
	                return editorcontent.hasContents();
	            });
	            var form = $('form.js-ajax-forms');
	        //ie处理placeholder提交问题
	        if ($.browser.msie) {
	            form.find('[placeholder]').each(function () {
	                var input = $(this);
	                if (input.val() == input.attr('placeholder')) {
	                    input.val('');
	                }
	            });
	        }
	        //表单验证开始
	        form.validate({
				//是否在获取焦点时验证
				onfocusout:false,
				//是否在敲击键盘时验证
				onkeyup:false,
				//当鼠标掉级时验证
				onclick: false,
	            //验证错误
	            showErrors: function (errorMap, errorArr) {
					//errorMap {'name':'错误信息'}
					//errorArr [{'message':'错误信息',element:({})}]
					try{
						$(errorArr[0].element).focus();
						art.dialog({
							id:'error',
							icon: 'error',
							lock: true,
							fixed: true,
							background:"#CCCCCC",
							opacity:0,
							content: errorArr[0].message,
							cancelVal: '确定',
							cancel: function(){
								$(errorArr[0].element).focus();
							}
						});
					}catch(err){
					}
	            },
	            //验证规则
	            rules: {'cs_name':{required:1},'cs_price':{required:1},'cs_teacher':{required:1},'sec_numbers':{required:1},'cs_brief':{required:1},'cs_picture':{required:1}},
	            //验证未通过提示消息
	            messages: {'cs_name':{required:'课程名称不能为空'},'cs_price':{required:'课程价格不能为空'},'cs_teacher':{required:'主讲老师不能为空'},'sec_numbers':{required:'章节数量不能为空'},'cs_brief':{required:'课程描述不能为空'},'cs_picture':{required:'请选择课程图片'}},
	            //给未通过验证的元素加效果,闪烁等
	            highlight: false,
	            //是否在获取焦点时验证
	            onfocusout: false,
	            //验证通过，提交表单
	            submitHandler: function (forms) {
	                $(forms).ajaxSubmit({
	                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
	                    dataType: 'json',
	                    beforeSubmit: function (arr, $form, options) {
	                        
	                    },
	                    success: function (data, statusText, xhr, $form) {
	                        if(data.status){
								setCookie("refersh_time",1);
								//添加成功
								Wind.use("artDialog", function () {
								    art.dialog({
								        id: "succeed",
								        icon: "succeed",
								        fixed: true,
								        lock: true,
								        background: "#CCCCCC",
								        opacity: 0,
								        content: data.info,
										button:[
											{
												name: '继续添加？',
												callback:function(){
													reloadPage(window);
													return true;
												},
												focus: true
											},{
												name: '返回列表页',
												callback:function(){
													location='<?php echo U('AdminCourse/index');?>';
													return true;
												}
											}
										]
								    });
								});
							}else{
								isalert(data.info);
							}
	                    }
	                });
	            }
	        });
	    });
	////-------------------------
});
</script>
<script language="javascript"> 
$(function(){ 
$("#second").hide(); //初始化的时候第二个下拉列表隐藏 
$("#first").change(function(){ //当第一个下拉列表变动内容时第二个下拉列表将会显示 
var parentId=$("#first").val(); 
if(null!= parentId && ""!=parentId){
	
$.getJSON("<?php echo U('AdminLabel/select');?>",{id:parentId},function(myJSON){
var options=""; 
if(myJSON.length>0){ 
options+="<option value='-1'>==请选择标签==</option>"; 
for(var i=0;i<myJSON.length;i++){ 
options+="<option value="+myJSON[i].id+">"+myJSON[i].labelname+"</option>"; 
} 
$("#label").html(options); 
$("#second").show(); 
} 
else if(myJSON.length<=0){ 
$("#second").hide(); 
} 
}); 
} 
else{ 
$("#second").hide(); 
} 
}); 
}); 
</script> 
<script>
       var domain=document.getElementById("domain").value;
	  $.ajax({
     	type : "get",
	    url : "http://gw.ruisi365.com/index.php?g=api&m=Regcheck&a=index&domain="+domain,
    	dataType : "jsonp",
	    success : function(data){
	    	document.getElementById("code").value=data.notice;
			document.getElementById("count").value=data.count;
	      }
     });
	</script>
</body>
</html>