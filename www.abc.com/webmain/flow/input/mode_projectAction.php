<?php
class mode_projectClassAction extends inputAction{

    protected function savebefore($table, $arr, $id, $addbo){
        if($id>0 && $arr['pid']==$id)return '上级不能选自己';
        $title = $arr['title'];
        if(m($table)->rows("`title`='$title' and `id`<>$id")>0)return '名称['.$title.']已存在';
    }
	public function progressdata()
	{
		$arr = array();
		for($i=0;$i<=100;$i++)$arr[]=array('value'=>$i,'name'=>$i.'%');
		return $arr;
	}
    public function hetongdata()
    {
        $rows = m('crm')->getmyract($this->adminid, false,false);
        $arr  = array();
        foreach($rows as $k=>$rs){
            $arr[] = array(
                'value' => $rs['id'],
                'name' 	=> $rs['num'],
                'contract_name' 	=> $rs['contract_name'],
                'custname' 	=> $rs['custname'],
                'custid' 	=> $rs['custid'],
            );
        }
        return $arr;
    }
    public function projectData()
    {
        return m('project')->getselectdata();
    }
    public function storeafter($table, $rows)
    {
        $barr = array();
        m('project')->gettreedata($rows, $barr);
        return array(
            'rows' => $barr
        );
    }
    /**
     * 项目编号
     */
    public function projectnumAjax(){
        $nums = $this->get('nums');
        $cars = m('project')->getall("num LIKE '%{$nums}%'", 'num');
        if(!empty($cars)){
            $data=[];
            $cars = array_column($cars,'num');
            foreach($cars as $v){
                $data[] = substr($v,-3);
            }
            $str = str_pad(max($data)+1,3,0,STR_PAD_LEFT);
        }else{
            $str = '001';
        }

        $this->returnjson($str);
    }
}	
			