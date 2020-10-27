<?php
/**
*	此文件是流程模块【projectreview.项目操作】对应控制器接口文件。
*/ 
class mode_projectreviewClassAction extends inputAction{
	
	/**
	*	重写函数：保存前处理，主要用于判断是否可以保存
	*	$table String 对应表名
	*	$arr Array 表单参数
	*	$id Int 对应表上记录Id 0添加时，大于0修改时
	*	$addbo Boolean 是否添加时
	*	return array('msg'=>'错误提示内容','rows'=> array()) 可返回空字符串，或者数组 rows 是可同时保存到数据库上数组
	*/
	protected function savebefore($table, $arr, $id, $addbo){
		
	}
	
	/**
	*	重写函数：保存后处理，主要保存其他表数据
	*	$table String 对应表名
	*	$arr Array 表单参数
	*	$id Int 对应表上记录Id
	*	$addbo Boolean 是否添加时
	*/	
	protected function saveafter($table, $arr, $id, $addbo){

	}
	/*
	 * 获取类型
	 */
	public function costtype(){
        $pid = m('option')->getone("num='costtype'", 'id');
        $arr = m('option')->getall("pid={$pid['id']}", 'name,value');
        return $arr;
    }
    public function selectdata()
    {
        $arr = m('project')->getall('', 'id,num,title,content');
        foreach ($arr as $k=>$v){
            $arr[$k]['name'] = $arr[$k]['num'];
            $arr[$k]['value'] = $arr[$k]['id'];
        }
        return $arr;
    }
    public function projectdataAjax(){
        $v = $this->get('v');
        $cars = m('project')->getone('id='.$v, 'id,num,title,content');
        $this->returnjson($cars);
    }
}	
			