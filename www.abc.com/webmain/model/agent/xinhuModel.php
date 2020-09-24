<?php

class agent_xinhuClassModel extends agentModel
{
	protected function agentdata($uid, $lx)
	{
		$rows[] = array(
			'title' => '欢迎使用深圳海纳百川CRM',
			'cont'	=> '官网：<a href="'.URLY.'" target="_blank">'.URLY.'</a><br>版本：'.VERSION.'',
			'statuscolor' => 'green',
			'statustext'  => '官网'
		);
		$rows[] = array(
			'title' => '开源协议',
			'cont'	=> '二次开发，功能定制，请联系QQ：2573372084。',
			'statuscolor' => 'green',
			'statustext'  => '官网'
		);
		$rows[] = array(
			'title' => '相关帮助',
			'cont'	=> '1、常见使用问题，<a href="'.URLY.'view_cjwt.html" target="_blank">[查看]</a><br>2、使用前必读 ，<a href="'.URLY.'view_bidu.html" target="_blank">[查看]</a><br>3、二次开发前必读 ，<a href="'.URLY.'view_devbd.html" target="_blank">[查看]</a><br>4、更多帮助问题列表 ，<a href="'.URLY.'infor.html" target="_blank">[查看]</a>',
			'statuscolor' => 'green',
			'statustext'  => '官网'
		);
		$arr['rows'] 	= $rows;
		return $arr;
	}
}