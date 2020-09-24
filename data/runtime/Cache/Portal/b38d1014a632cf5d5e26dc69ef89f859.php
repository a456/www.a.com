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
    <section class="poster hidden-xs">
      <div id="carousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
        <?php if(is_array($slide)): $$key = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($$key % 2 );++$$key; if($key == 0): ?><li data-target="#carousel" data-slide-to="<?php echo ($key); ?>" class="active"></li>
          <?php else: ?>
             <li data-target="#carousel" data-slide-to="<?php echo ($key); ?>" class=""></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>  
      </ol>
      <div class="carousel-inner" role="listbox">
        <?php if(is_array($slide)): $$key = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($$key % 2 );++$$key; if($key == 0): ?><div class="item active">
             <a href="<?php echo ($vo['slide_url']); ?>" target="_self"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo['slide_des']); ?>"></a>
            </div>
          <?php else: ?>
            <div class="item">
             <a href="<?php echo ($vo['slide_url']); ?>" target="_self"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo['slide_des']); ?>"></a>
            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>  
      </div>
       <a class="left carousel-control hidden-xs" href="#carousel" role="button" data-slide="prev">
         <i class="iconfont icon-jiantou3 carousel-left"></i>
       </a>
       <a class="right carousel-control hidden-xs" href="#carousel" role="button" data-slide="next">
         <i class="iconfont icon-jiantou4 carousel-right"></i>
       </a>
     </div>
    </section>
    <section class="index-course-list lazyload">
      <div class="container">
        <div class="es-filter">
          <ul id="myTab" class="nav clearfix nav-pills">
            <li class="active"><a href="#zuixin" data-toggle="tab">最新</a></li>
            <li><a href="#tuijian" data-toggle="tab">推荐</a></li>
            <li><a href="#free" data-toggle="tab">免费</a></li>
          </ul>
        </div>
        <div id="myTabContent" class="tab-content">
         <div class="tab-pane fade in active row item " id="zuixin">
          <?php if(is_array($zx_courselist)): $i = 0; $__LIST__ = $zx_courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-xs-6">
             <div class="course-item">
                <div class="course-img">
                  <a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['id']));?>"><img class="transform img-responsive "  src="<?php echo ($vo['cs_picture']); ?>">
                    <div class="course-show clearfix">
                      <img src="./themes/simplebootx/public/images/1803026e1ab3793901.JPG" class="img-circle pull-left">
                        <div class="pull-left">
                          <p><?php echo ($vo['cs_name']); ?></p>
                        </div>
                     </div>
                  </a>
                 </div>
                 <div class="course-info">
                   <div class="title"><a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['id']));?>"><?php echo ($vo['cs_name']); ?></a></div>
                    <div class="metas clearfix">
                      <span class="score">评分：<em>0</em></span>
                      <span class="num">1人在学</span>
                      <span class="price price-num">¥<?php echo ($vo['cs_price']); ?>.00</span>                        
                    </div>
                  </div>
                </div>
              </div><?php endforeach; endif; else: echo "" ;endif; ?>       
           </div>
           <div class="tab-pane fade  item row item " id="tuijian">
             <?php if(is_array($tuijian_courselist)): $i = 0; $__LIST__ = $tuijian_courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-xs-6">
                <div class="course-item">
                 <div class="course-img">
                  <a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['id']));?>"><img class="transform img-responsive"  src="<?php echo ($vo['cs_picture']); ?>">
                    <div class="course-show clearfix">
                      <img src="./themes/simplebootx/public/images/1803026e1ab3793901.JPG" class="img-circle pull-left">
                        <div class="pull-left">
                          <h4>老师</h4>
                          <p><?php echo ($vo['cs_name']); ?></p>
                        </div>
                     </div>
                  </a>
                 </div>
                 <div class="course-info">
                   <div class="title"><a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['id']));?>"><?php echo ($vo['cs_name']); ?></a></div>
                    <div class="metas clearfix">
                      <span class="score">评分：<em>0</em></span>
                      <span class="num">1人在学</span>
                      <span class="price price-num">¥<?php echo ($vo['cs_price']); ?>.00</span>                        
                    </div>
                  </div>
                </div>
               </div><?php endforeach; endif; else: echo "" ;endif; ?>   
           </div>
           <div class="tab-pane fade  item row item " id="free">
             <?php if(is_array($free_courselist)): $i = 0; $__LIST__ = $free_courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-xs-6">
                <div class="course-item">
                 <div class="course-img">
                  <a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['id']));?>"><img class="transform img-responsive"  src="<?php echo ($vo['cs_picture']); ?>">
                    <div class="course-show clearfix">
                      <img src="./themes/simplebootx/public/images/1803026e1ab3793901.JPG" class="img-circle pull-left">
                        <div class="pull-left">
                          <h4>老师</h4>
                          <p><?php echo ($vo['cs_name']); ?></p>
                        </div>
                     </div>
                  </a>
                 </div>
                 <div class="course-info">
                   <div class="title"><a href="<?php echo u('course/Course/courseinfo',array('id'=>$vo['id']));?>"><?php echo ($vo['cs_name']); ?></a></div>
                    <div class="metas clearfix">
                      <span class="score">评分：<em>0</em></span>
                      <span class="num">1人在学</span>
                      <span class="price price-num">¥<?php echo ($vo['cs_price']); ?>.00</span>                        
                    </div>
                  </div>
                </div>
               </div><?php endforeach; endif; else: echo "" ;endif; ?>   
           </div>
         </div>
         
      </div>
      </section>
     <section class="index-introduction hidden-xs">
       <div id="carousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
        <?php if(is_array($mslide)): $$key = 0; $__LIST__ = $mslide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($$key % 2 );++$$key; if($key == 0): ?><li data-target="#carousel" data-slide-to="<?php echo ($key); ?>" class="active"></li>
          <?php else: ?>
             <li data-target="#carousel" data-slide-to="<?php echo ($key); ?>" class=""></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>  
      </ol>
      <div class="carousel-inner" role="listbox">
        <?php if(is_array($mslide)): $$key = 0; $__LIST__ = $mslide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($$key % 2 );++$$key; if($key == 0): ?><div class="item active">
             <a href="<?php echo ($vo['slide_url']); ?>" target="_self"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo['slide_des']); ?>"></a>
            </div>
          <?php else: ?>
            <div class="item">
             <a href="<?php echo ($vo['slide_url']); ?>" target="_self"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo['slide_des']); ?>"></a>
            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>  
      </div>
     </div>
     </section>
     <?php if(!empty($articlelist)): ?><section class="group-dynamic clearfix">
        <div class="container">
         <?php if(is_array($articlelist)): $k = 0; $__LIST__ = $articlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="col-md-4">
            <div class="course_sy2 ">
                 <div class="opb1 opb3"><?php echo ($vo['name']); ?><div class=" mor11"><a href="<?php echo u('Portal/Index/article',array('termid'=>$vo['term_id']));?>">更多&gt;</a></div></div>
               <?php if(is_array($vo['voo'])): $k = 0; $__LIST__ = $vo['voo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($k % 2 );++$k; if($k==7): ?><div class="course_sy3b op3" style=" border-bottom:none;"><a href="<?php echo u('Portal/Index/content',array('id'=>$vo['id'],'termid'=>$vo['term_id']));?>" target="_blank" title=""><?php echo ($sub['post_title']); ?></a></div>
        	     <?php else: ?>
        	       <div class="course_sy3b op3"><a href="<?php echo u('Portal/Index/content',array('id'=>$sub['id'],'termid'=>$sub['term_id']));?>" target="_blank" title=""><?php echo ($sub['post_title']); ?></a></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        	</div>
           </div><?php endforeach; endif; else: echo "" ;endif; ?>  
        </div>
      </section><?php endif; ?>
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