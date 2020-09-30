<?php
/**
*	项目的
*/
class flow_projectClassModel extends flowModel
{
	
	public function initModel()
	{
	    $this->projectt = array('市政','房建','公路','轨道','圆林绿化');//项目类别
	    $this->businesst = array('概算','预算','控制价','变更签证','结算','财务决算','期中支付','全过程','跟踪审计','框架协议');// 业务类别
	    $this->jobst = array('编制','审核');// 工作类别
	    $this->area = array('珠海','深圳','东莞','广州','广东','中山','惠州','厦门','安徽','西安','阳江');// 地区
	    $this->is_bidding = array('否','是');//  是否公开招标
	    $this->is_free = array('否','是');//  是否公开招标
	    $this->status = array('待执行','已完成','执行中');//  是否公开招标
		$this->workobj = m('work');
	}
	
	/**
	*	进度报告时更新对应状态
	*/
	protected function flowaddlog($a)
	{
		if($a['name']=='进度报告'){
			$arr['status'] = $a['status'];
			$this->update($arr, $this->id);
		}
	}
	
	public function flowrsreplace($rs, $slx=0){
        if(isset($this->projectt[$rs['projectt']])){
            $rs['projectt'] = $this->projectt[$rs['projectt']];
        }
        if(isset($this->businesst[$rs['businesst']])){
            $rs['businesst'] = $this->businesst[$rs['businesst']];
        }
        if(isset($this->jobst[$rs['jobst']])){
            $rs['jobst'] = $this->jobst[$rs['jobst']];
        }
        if(isset($this->area[$rs['area']])){
            $rs['area'] = $this->area[$rs['area']];
        }
        if(isset($this->is_bidding[$rs['is_bidding']])){
            $rs['is_bidding'] = $this->is_bidding[$rs['is_bidding']];
        }
        if(isset($this->is_free[$rs['is_free']])){
            $rs['is_free'] = $this->is_free[$rs['is_free']];
        }

		$zts 		= $rs['status'];
		$str 		= $this->getstatus($rs,'','',1);
		$rs['status']= $str;
		$id			= $rs['id'];
		$wwc	= $this->workobj->rows('projectid='.$id.' and `status` not in(1,5)');
		$wez	= $this->workobj->rows('projectid='.$id.'');
		if($wwc>0)$wwc='<font color=red>'.$wwc.'</font>';
		$rs['workshu'] = ''.$wwc.'/'.$wez.'';
		$rs['distribution'] = $wwc;

		return $rs;
	}
	
	public function flowisreadqx()
	{
		return $this->flowgetoptmenu('shwview');
	}
	
	//显示操作菜单判断
	protected function flowgetoptmenu($num)
	{
		$fuzeid 	= $this->rs['fuzeid'];
		$runuserid 	= $this->rs['runuserid'];
		$where 		= m('admin')->gjoin($fuzeid.','.$runuserid, 'ud', $blx='where');
		$where 		= 'id='.$this->adminid.' and ('.$where.')';
		$bo 		= null;
		if($num=='shwview')$bo = true;
		if(m('admin')->rows($where)==0)$bo=false;
		return $bo;
	}
	
	protected function flowbillwhere($uid, $lx)
	{
		
		return array(
			'where' => '',
			'order' => 'id desc'
		);
	}
}