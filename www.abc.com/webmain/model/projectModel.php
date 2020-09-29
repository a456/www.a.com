<?php
//公司单位
class projectClassModel extends Model
{
    public function initModel()
    {
        $this->settable('project');
    }

    public function getoneproject($id){
        $rows = $this->getone("id={$id}",'`id`,title,totalp,projectt,businesst,jobst,fuze,plans,plane,content,num,status');
        return $rows;
    }

    public function getxmment($lx=0)
    {
        $rows = $this->getall("id>0 and fuzeid='{$this->adminid}'",'`id` as value,title as name,pid,num','`sort`');
        return $rows;
    }

	public function getselectdata($lx=0)
	{
		$rows = $this->getall('id>0','`id`,title,pid,num','`sort`');
		$barr = array();
        if($lx==0)$barr[] = array(
            'value' => '0',
            'name'  => '最顶级',
            'num'  => '',
        );
		$this->getselectdatas($rows, $barr, '0', 0);
		return $barr;
	}
	private function getselectdatas($rows,&$barr, $pid='0', $level=0)
	{
		foreach($rows as $k=>$rs){
			if($rs['pid']==$pid){
				$str  = '';
				for($i=0;$i<$level;$i++)$str.='&nbsp;&nbsp;&nbsp;';
				if($str!='')$str.='├';
				$name = ''.$str.''.$rs['title'].'';
				$barr[] = array(
					'name'  => $name,
					'value' => $rs['id'],
                    'num'  => $rs['num'],
				);
				$this->getselectdatas($rows, $barr, $rs['id'], $level+1);
			}
		}
	}

    //树形结构
    public function gettreedata($rows, &$barr, $pid='0', $level=1)
    {
        foreach($rows as $k=>$rs){
            if($rs['pid']==$pid){
                $rs['level'] 	= $level;
                $rs['stotal'] 	= $this->gettreetotal($rows, $rs['id']);

                $barr[] = $rs;
                $this->gettreedata($rows, $barr, $rs['id'], $level+1);
            }
        }
    }
    public function gettreetotal($rows, $pid)
    {
        $stotal = 0;
        foreach($rows as $k=>$rs){
            if($rs['pid']==$pid){
                $stotal++;
            }
        }
        return $stotal;
    }
}