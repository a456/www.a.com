<?php
/**
*	项目的
*/
class flow_projectreviewClassModel extends flowModel
{

	public function initModel()
	{
        $this->projcetid = (int)$this->rock->post('projcetid');
	}
    public function flowrsreplace($rs, $slx=0){
        $project = m('project')->getone('id='.$rs['mid'],'num,title,content');
        $pid = m('option')->getone("num='costtype'", 'id');
        $arr = m('option')->getone("pid={$pid['id']} and value='".$rs['type']."'", 'name');
        $rs['type'] = $arr['name'];
        $rs['num'] = $project['num'];
        $rs['title'] = $project['title'];
        $rs['remarks'] = $project['content'];
        return $rs;
    }
    //自定义审核人读取
    protected function flowcheckname($num){
        $sid = '';
        $sna = '';
        $project = m('project')->getone('id='.$this->rs['mid'],'fuze,fuzeid,runuser,runuserid');
        if($num=='principal'){
            $sid = $project['fuzeid'];
            $sna = $project['fuze'];
        }else if($num=='manager'){
            return $this->adminmodel->getdeptheadman($project['runuserid']);
        }
            return array($sid, $sna);
    }
	protected function flowbillwhere($uid, $lx)
	{
        $where		= '';
        $projcetid 	= (int)$this->rock->post('projcetid');
        if($projcetid>0)$where='and a.mid='.$projcetid;
        return array(
            'where' => $where,
            'order' => '`optdt` desc'
        );
	}
}