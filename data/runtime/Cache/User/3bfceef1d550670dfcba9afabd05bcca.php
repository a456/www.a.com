<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <title><?php echo ($name); ?> <?php echo ($site_name); ?> <?php echo ($site_seo_title); ?>  </title>
  <meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
  <meta name="description" content="<?php echo ($site_seo_description); ?>" />
  <link rel="icon" href="./themes/simplebootx/public/images/favicon_1409967740.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="./themes/simplebootx/public/images/favicon_1409967740.ico" type="image/x-icon" media="screen"/>
  <link href="./themes/simplebootx/public/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" media="screen" href="./themes/simplebootx/public/css/common.css" />
  <link rel="stylesheet" media="screen" href="./themes/simplebootx/public/css/main.css" />
  <link rel="stylesheet" media="screen" href="./themes/simplebootx/public/css/es-icon.css" />
  <link rel="stylesheet" media="screen" href="./themes/simplebootx/public/css/iconfont.css" />
  <link rel="stylesheet" media="screen" href="./themes/simplebootx/public/css/theme.css" />
  <!--[if lt IE 9]>
    <script src="./themes/simplebootx/public/js/html5shiv.js"></script>
    <script src="./themes/simplebootx/public/js/respond.min.js"></script>
  <![endif]-->
</head>
<body >
  <div class="es-wrap">
    <header class="navbar">
      <div class="container">
        <div class="clearfix navbar-top">
           <a href="/"><img src="./themes/simplebootx/public/images/logo.gif"  class="pull-left logo-left"></a>
            <a class="pull-right hidden-xs"><i class="iconfont icon-mianfeidianhua icon"></i>
               <span class="telephone">全国服务热线：15562315180</span>
            </a>
          </div>
      </div>
      <nav class="nav-collapse">
        <div class="container">
          <div class="navbar-header">
             <ul class="nav navbar-left navbar-collapse collapse" role="navigation">
                <li class=""><a href="/" class=""  >首页 </a></li>
                <?php if(is_array($top_type)): $i = 0; $__LIST__ = $top_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="dropdown"><a href="#" class="dropdown-toggle "   data-toggle="dropdown" ><?php echo ($vo['name']); ?>  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php if(is_array($vo['voo'])): $i = 0; $__LIST__ = $vo['voo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li><a href="<?php echo u('course/Course/coursecenter',array('typeid'=>$sub['term_id']));?>" ><?php echo ($sub["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
                  </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                <li class=""><a href="<?php echo u('Portal/Index/article');?>" class=""  >教育资讯 </a></li>
                <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class=""><a href="<?php echo (sp_get_href($vo['href'])); ?>" class=""  ><?php echo ($vo['label']); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </div>
          <div class="navbar-user hidden-xs">
           <?php if(session('?user')): ?><ul class="nav navbar-nav navbar-right" >
               <li><a href="<?php echo u('User/Center/index');?>" class="nav-study">我的教室</a></li>
               <li class="info-img"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                     <?php if(empty($avatar)): ?><img src="./themes/simplebootx/public/images/093958e59110293063.jpg" class="img-circle"/>
			         <?php else: ?>
				        <img src="<?php echo sp_get_user_avatar_url($avatar);?>?t=<?php echo time();?>" class="img-circle"/><?php endif; ?>                  
                    <span><?php echo ($user_nicename); ?></span>
                    <i class="iconfont icon-xia"></i>
                    </a>
                    <ul class="dropdown-menu menu-ul" role="menu">
                       <li><a href="<?php echo u('User/Center/setting');?>"><i class="iconfont icon-shezhi"></i>个人设置</a></li>
                       <li><a href="<?php echo u('user/center/count');?>"><i class="iconfont icon-001"></i> 账户中心</a></li>
                       <li><a href="<?php echo U('user/index/logout');?>"><i class="iconfont icon-tuichu"></i>退出登录</a></li>
                    </ul>
                </li>
               
              </ul>
           <?php else: ?>  
             <ul class="nav navbar-nav navbar-right">
                 <li><a href="<?php echo u('User/Login/index');?>"> 登录</a></li>
                 <li>｜</li>
                 <li><a href="<?php echo u('User/Register/index');?>">注册</a></li>
             </ul><?php endif; ?>	
          </div>
        </div>
      </nav>
    </header>  
  <div id="content-container" class="container">
     <?php if(empty($avatar)): ?><div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>您还没有头像</strong>。拥有一个独有的头像，老师和同学们能更容易关注到你哦～～ <a href="<?php echo u('user/center/pic');?>"" class="alert-link" target="_blank">点击设置</a>
	  </div>
	  <?php else: ?>
	    <?php if(empty($user['user_nicename'])): ?><div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>您还没设置昵称</strong>。请到个人设置里面设置～～ <a href="<?php echo u('user/center/setting');?>" class="alert-link" target="_blank">点击设置</a>
         </div><?php endif; endif; ?>
      <div class="row row-3-9">
        <div class="col-md-3">
           <div class="sidenav">
             <ul class="list-group">
               <li class="list-group-heading">我的学习</li>
               <li class="list-group-item "><a href="<?php echo u('user/center/index');?>">我的课程</a></li>
               <li class="list-group-item"><a href="<?php echo u('user/center/jihuo');?>">激活课程</a></li>
               <li class="list-group-heading" style="margin-top:10px;">个人设置</li>
               <li class="list-group-item "><a href="<?php echo u('user/center/setting');?>"> 基础信息</a></li>
               <li class="list-group-item "><a href="<?php echo u('user/center/pic');?>">头像设置</a></li>
               <li class="list-group-item "><a href="<?php echo u('user/center/security');?>">修改密码</a></li>          
               <li class="list-group-heading" style="margin-top:10px;">账户中心</li>
               <li class="list-group-item "><a href="<?php echo u('user/center/count');?>">我的账户</a></li>
               <li class="list-group-item active"><a href="<?php echo u('user/center/order');?>">我的订单</a></li>
               <li class="list-group-item "><a href="<?php echo u('user/center/card');?>">点卡充值</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">	
          <div class="panel panel-default panel-col">
	        <div class="panel-heading">我的订单</div>
	           <?php $status0=$state==0?"class='active'":""; $status1=$state==1?"class='active'":""; $status2=$state==2?"class='active'":""; ?>
	          <ul class="nav nav-pills" role="tablist">
               <li role="presentation" <?php echo ($status0); ?>><a href="<?php echo u('user/center/order' ,array('state'=>0));?>">全部订单</a></li>
               <li role="presentation" <?php echo ($status2); ?>><a href="<?php echo u('user/center/order' ,array('state'=>2));?>">待付款<span class="badge"><?php echo ($num); ?></span></a></li>
               <li role="presentation" <?php echo ($status1); ?>><a href="<?php echo u('user/center/order',array('state'=>1));?>">已付款</a></li>
             </ul>
          
            <br>   
	         <div class="table-responsive">
               <table class="table table-striped table-hover" id="orders-table">
                <thead>
                 <tr>
                   <th>名称</th>
                   <th>创建时间</th>
                   <th>状态</th>
                   <th>实付(元)</th>
                   <th style="min-width:100px">操作</th>
                 </tr>
                </thead>
                <tbody>
                 <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="word-break: break-all;word-wrap: break-word;">
                     <td><a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['course_id']));?>" target="_blank"><strong>购买课程《<?php echo (getcoursename($vo['course_id'])); ?>》</strong></a><br>
                       <span class="text-muted text-sm">订单号：<?php echo ($vo['order']); ?></span>
                     </td>
                     <td><span class="text-muted text-sm"><?php echo ($vo['addtime']); ?></span></td>
                     <?php if($vo['state'] == 1): ?><td><span class="label label-success">已付款</span></td>
                     <?php else: ?> 
                       <td><span class="label label-danger">未付款</span></td><?php endif; ?>
                        <td><span class="money-text"><?php echo ($vo['total']); ?>.00</span></td>
                     <td>
                     <?php if($vo['state'] == 2): ?><form id="order-create-form" method="post" action="<?php echo u('course/Course/payorder',array('uid'=>$vo['user_id'],'cid'=>$vo['course_id'],'cn'=>$vo['order']));?>">
                        <div class="btn-group">
                           <button class="pay-button btn btn-primary"  type="submit">去支付</button>
                        </div>
                     </form><?php endif; ?>   
                     </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
               </tbody>
             </table>
			 <nav class="text-center"><div class="pagination text-center"><?php echo ($Page); ?></div></nav>
           </div>
	      </div>
        </div>
     </div>
  </div>
<script type="text/javascript">
var GV = {
    DIMAUB: "/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<script>
	  
</script>
<script src="/public/js/jquery.js"></script>
<script src="/public/js/wind.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/frontend.js"></script>  
  <div class="es-footer-link">
   <div class="container">
     <div class="row">
       <div class="col-md-12 footer-main clearfix">
       <?php if(is_array($dnav)): $i = 0; $__LIST__ = $dnav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="link-item ">
           <h3><?php echo ($vo['label']); ?></h3>
           <ul>
            <?php if(is_array($vo['voo'])): $i = 0; $__LIST__ = $vo['voo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (sp_get_href($sub['href'])); ?>" target="_blank"><?php echo ($sub['label']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
           </ul>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>  
       
     </div>
     
    </div>
  </div>
</div>
<footer class="es-footer">
  <div class="copyright">
    <div class="container">Powered by <a href="/" target="_blank"><?php echo ($site_name); ?></a>©2016-2018 <a class="mlm" href="/" target="_blank"></a>      
       <div class="mts">课程内容版权均归<a href="/"><?php echo ($site_name); ?>文化传播有限公司</a>
           所有<a class="mlm" href="http://www.miibeian.gov.cn/" target="_blank"><?php echo ($site_icp); ?></a><?php echo ($site_tongji); ?>
       </div>
       
    </div>
  </div>
</footer>    
</div>  
</body>
</html>