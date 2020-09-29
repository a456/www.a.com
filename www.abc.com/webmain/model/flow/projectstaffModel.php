<?php
/**
*	项目的
*/
class flow_projectstaffClassModel extends flowModel
{
	
	public function initModel()
	{
	    $this->jobtype = array('土建组长','安装组长','安装参与人员','土建参与人员','驻场');//项目类别
        $this->businesst = array('概算','预算','控制价','变更签证','结算','财务决算','期中支付','全过程','跟踪审计','框架协议');// 业务类别
        $this->jobst = array('编制','审核');// 工作类别
        $this->projectt = array('市政','房建','公路','轨道','圆林绿化');//项目类别
        $this->status = array('待执行','已完成','结束','执行中');// 工作类别
        $this->jobtype = array('土建组长','安装组长','安装参与人员','土建参与人员','驻场');// 工作类别
	}
	
	public function flowrsreplace($rs, $slx=0){
        $project = m('project')->getoneproject($rs['mid']);
	    if(isset($this->jobtype[$project['projectt']])){
            $rs['projectt'] = $this->jobtype[$project['projectt']];
        }
        if(isset($this->businesst[$project['businesst']])){
            $rs['businesst'] = $this->businesst[$project['businesst']];
        }
        if(isset($this->jobst[$project['jobst']])){
            $rs['jobst'] = $this->jobst[$project['jobst']];
        }
        if(isset($this->status[$project['jobst']])){
            $rs['status'] = $this->status[$project['status']];
        }
        if(isset($rs['jobtype'])){
            $jobtype_type = explode(',',$rs['jobtype']);
            $for_jobtype_type = '';
            for($index=0;$index<count($jobtype_type);$index++){
                $for_jobtype_type .= $this->jobtype[$jobtype_type[$index]].',';
            }
            $rs['jobtype'] = rtrim($for_jobtype_type,',');
        }
        $rs['xmselect'] = $project['title'];
	    $rs['totalp'] = $project['totalp'];
	    $rs['fuze'] = $project['fuze'];
	    $rs['plans'] = $project['plans'];
	    $rs['plane'] = $project['plane'];
	    $rs['content'] = $project['content'];
	    $rs['num'] = $project['num'];
	    return $rs;
	}
	
	protected function flowbillwhere($uid, $lx)
	{
		
		return array(
			'where' => '',
			'order' => 'id desc'
		);
	}
}