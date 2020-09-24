<?php
if(!defined('HOST'))die('not access');
//[管理员]在2020-06-20 15:00:30通过[系统→系统工具→系统设置]，保存修改了配置文件
return array(
	'url'	=> 'http://www.abc.com/',	//系统URL
	'localurl'	=> '',	//本地系统URL，用于服务器上浏览地址
	'title'	=> '深圳广诚工程管理系统',	//系统默认标题
	'apptitle'	=> '广诚工程管理',	//APP上和手机网页版上的标题
	'db_host'	=> 'localhost',	//数据库地址
	'db_user'	=> 'root',	//数据库用户名
	'db_pass'	=> 'root',	//数据库密码
	'db_base'	=> 'oa',	//数据库名称
	'db_engine'	=> 'MyISAM',
	'perfix'	=> 'oa_',	//数据库表名前缀
	'qom'	=> 'xinhu_',	//session、cookie前缀
	'highpass'	=> '',	//超级管理员密码，可用于登录任何帐号
	'db_drive'	=> 'mysqli',	//操作数据库驱动有mysql,mysqli,pdo三种
	'randkey'	=> 'pevzsjdqbxtaumgiofhncwyrlk',	//系统随机字符串密钥
	'asynkey'	=> '6700bbb46037dc2c73ed655d7ec61a06',	//这是异步任务key
	'openkey'	=> 'a77e58883961d662927a25b8194f3344',	//对外接口openkey
	'updir'	=> 'upload',
	'sqllog'	=> false,	//是否记录sql日志保存upload/sqllog下
	'asynsend'	=> '0',	//是否异步发送提醒消息，0同步，1自己服务端异步，2官网VIP用户异步
	'install'	=> true,	//已安装，不要去掉啊
	'reimtitle'	=> '',	//REIM即时通信上标题
	'xinhukey'	=> '7b6a2f55b8e27bed7befe4b31749c0bc',	//官网key，用于在线升级使用
	'bcolorxiang'	=> '',	//单据详情页面上默认展示线条的颜色
	'officeyl'	=> '0',	//文档Excel.Doc预览类型,0自己部署插件，1使用官网支持任何平台
	'debug'	=> true,	//为true调试开发模式,false上线模式
	'reim_show'	=> true,	//首页是否显示REIM
	'mobile_show'	=> true,	//首页是否显示手机版

);