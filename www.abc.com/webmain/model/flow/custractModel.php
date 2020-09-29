<?php

class flow_custractClassModel extends flowModel
{
	public function initModel(){
        $this->is_frame = array('否','是');//是否框架协议
        $this->business_stype = array('概算','预算','控制价','变更签证','结算','财务决算','期中支付','全过程','跟踪审计','框架协议');//业务类型
        $this->engineering_type = array('市政','房建','公路','轨道','圆林绿化');//工程类型
        $this->service_type = array('编制预算','审核竣工决算','编制估算','编制标底','审核预算','编制概算','审核估算','审核标底','编制结算','审核概算','编制项目建议书与可行性研究报告','审核变更签证','审核结算','受理法院委托鉴定工程造价','其它咨询服务','编制变更签证','编制竣工决算','受委托进度款监管','全过程咨询服务');//服务类型
        $this->is_record = array('否','是');//是否备案
        $this->is_approve = array('否','是');//是否审批
        $this->is_settlement = array('否','是');//是否结算
        $this->contract_status = array('待签订','已付清','待归档','已归档');//合同状态
		$this->typearr		= array('收款合同','付款合同');
		$this->typesarr		= array('收','付');
		$this->statearr		= c('array')->strtoarray('待生效|blue,生效中|green,已过期|#888888');
		$this->dtobj		= c('date');
		$this->crmobj		= m('crm');
	}


    public function flowrsreplace($rs){
        if(isset($this->is_frame[$rs['is_frame']])){
            $rs['is_frame'] = $this->is_frame[$rs['is_frame']];
        }
        if(isset($this->business_stype[$rs['business_type']])){
            $rs['business_type'] = $this->business_stype[$rs['business_type']];
        }
        if(isset($this->engineering_type[$rs['engineering_type']])){
            $rs['engineering_type'] = $this->engineering_type[$rs['engineering_type']];
        }
        if(isset($rs['service_type'])){
            $service_type = explode(',',$rs['service_type']);
            $for_service_type = '';
            for($index=0;$index<count($service_type);$index++){
                $for_service_type .= $this->service_type[$service_type[$index]].',';
            }
            $rs['service_type'] = rtrim($for_service_type,',');
        }
        if(isset($this->is_record[$rs['is_record']])){
            $rs['is_record'] = $this->is_record[$rs['is_record']];
        }
        if(isset($this->is_approve[$rs['is_approve']])){
            $rs['is_approve'] = $this->is_approve[$rs['is_approve']];
        }
        if(isset($this->is_settlement[$rs['is_settlement']])){
            $rs['is_settlement'] = $this->is_settlement[$rs['is_settlement']];
        }
        if(isset($this->contract_status[$rs['contract_status']])){
            $rs['contract_status'] = $this->contract_status[$rs['contract_status']];
        }
        return $rs;
    }
//	public function flowrsreplace($rs){
//		$type 		= $rs['type'];
//		$rs['type'] = $this->typearr[$type];
//		$statetext	= '';
//		$dt 		= $this->rock->date;
//		$htstatus	= 0;
//		if($rs['startdt']>$dt){
//			$statetext='待生效';
//		}else if($rs['startdt']<=$dt && $rs['enddt']>=$dt){
//			$jg = $this->dtobj->datediff('d', $dt, $rs['enddt']);
//			$statetext='<font color=green>生效中</font><br><font color=#888888>'.$jg.'天过期</font>';
//			if($jg==0)$statetext='<font color=green>今日到期</font>';
//			$htstatus = 1;
//		}else if($rs['enddt']<$dt){
//			$statetext='<font color=#888888>已过期</font>';
//			$rs['ishui'] 	= 1;
//			$htstatus = 2;
//		}
//		$rs['statetext']	= $statetext;
//		$nrss	 			= $this->crmobj->ractmoney($rs);
//		$ispay 				= $nrss[0];
//		$moneys 			= $nrss[1];
//		$dsmoney			= '';
//		$ts 				= $this->typesarr[$type];
//		if($ispay==1){
//			$dsmoney		= '<font color=green>已全部'.$ts.'款</font>';
//		}else{
//			$dsmoney		= '待'.$ts.'<font color=#ff6600>'.$moneys.'</font>';
//		}
//		$rs['moneys']		= $dsmoney;
//		$rs['htstatus']		= $htstatus;
//		return $rs;
//	}
	
	protected function flowbillwhere($uid, $lx)
	{
		
		$month	= $this->rock->post('dt');
		$where 	= '';
		if($month!=''){
			$where =" and `signdt` like '$month%'";
		}
	
		
		return array(
			'where' => $where,
			'order' => '`id` desc',
			//'orlikefields' => 'custname'
		);
	}
	
	protected function flowoptmenu($ors, $arrs)
	{
		//创建待收付款单
		if($ors['num']=='cjdaishou'){
			$moneys 		= m('crm')->getmoneys($this->rs['id']);
			$money			= $this->rs['money'] - $moneys;
			if($money > 0){
				$arr['htid'] 	= $this->rs['id'];
				$arr['htnum'] 	= $this->rs['num'];
				$arr['uid'] 	= $this->rs['uid'];
				$arr['custid'] 	= $this->rs['custid'];
				$arr['custname']= $this->rs['custname'];
				$arr['dt']		= $this->rock->date;
				$arr['optdt'] 	= $this->rock->now;
				$arr['createdt']= $this->rock->now;
				$arr['optname'] = $this->adminname;
				$arr['createname']= $this->adminname;
				$arr['createid']  = $this->adminid;
				$arr['optid'] 	= $this->adminid;
				$arr['type'] 	= $this->rs['type'];
				$arr['explain'] = $arrs['sm'];
				$arr['money'] 	= $money;
				m('custfina')->insert($arr);
			}
		}
	}
	
	
	/**
	*	客户合同到期提醒
	*/
	public function custractdaoqi()
	{
		$dt 	= $this->rock->date;
		$rows 	= $this->getall("status=1 and `enddt` is not null and `enddt`>='$dt'",'uid,num,custname,enddt','`uid`');
		$txlist = m('option')->getval('crmtodo','0,3,7,15,30');//提醒的时间
		$txarr 	= explode(',', $txlist);
		$dtobj 	= c('date');
		$txrows = array();
		foreach($rows as $k=>$rs){
			$jg = $dtobj->datediff('d', $dt, $rs['enddt']);
			$uid= $rs['uid'];
			if(in_array($jg, $txarr)){
				$strs = ''.$jg.'天后('.$rs['enddt'].')';
				if($jg==1)$strs='明天';
				if($jg==0)$strs='今天';
				if(!isset($txrows[$uid]))$txrows[$uid]='';
				$txrows[$uid] .= '客户['.$rs['custname'].']的[合同:'.$rs['num'].']将在'.$strs.'到期;';
			}
		}
		foreach($txrows as $uid=>$cont){
			$this->push($uid, '客户,CRM', $cont, '客户合同到期提醒');
		}
	}

    //导入之前
    public function flowdaorubefore($rows)
    {
        $this->is_frame = array('否','是');//是否框架协议
        $this->business_stype = array('概算','预算','控制价','变更签证','结算','财务决算','期中支付','全过程','跟踪审计','框架协议');//业务类型
        $this->engineering_type = array('市政','房建','公路','轨道','圆林绿化');//工程类型
        $this->service_type = array('编制预算','审核竣工决算','编制估算','编制标底','审核预算','编制概算','审核估算','审核标底','编制结算','审核概算','编制项目建议书与可行性研究报告','审核变更签证','审核结算','受理法院委托鉴定工程造价','其它咨询服务','编制变更签证','编制竣工决算','受委托进度款监管','全过程咨询服务');//服务类型
        $this->is_record = array('否','是');//是否备案
        $this->is_approve = array('否','是');//是否审批
        $this->is_settlement = array('否','是');//是否结算
        $this->contract_status = array('待签订','已付清','待归档','已归档');//合同状态
        $this->typearr		= array('收款合同','付款合同');
        foreach($rows as $k=>$rs){
            $rows[$k]['num'] = 'GC-'.$this->findNum($rows[$k]['num']);
            $custname = trim($rows[$k]['custname']);
            $name = m('customer')->getone("name='$custname'", 'id');
            if (isset($name['id'])) {
                $name = $name['id'];
            }
            $is_frame_flip = array_flip($this->is_frame);
            if (isset($is_frame_flip[$rows[$k]['is_frame']])){
                $rows[$k]['is_frame'] = $is_frame_flip[$rows[$k]['is_frame']];
            }
            $business_stype_flip = array_flip($this->business_stype);
            if (isset($business_stype_flip[$rows[$k]['business_type']])){
                $rows[$k]['business_type'] = $business_stype_flip[$rows[$k]['business_type']];
            }
            $engineering_type_flip = array_flip($this->engineering_type);
            if (isset($engineering_type_flip[$rows[$k]['engineering_type']])){
                $rows[$k]['engineering_type'] = $engineering_type_flip[$rows[$k]['engineering_type']];
            }
            $is_record_flip = array_flip($this->is_record);
            if (isset($is_record_flip[$rows[$k]['is_record']])){
                $rows[$k]['is_record'] = $is_record_flip[$rows[$k]['is_record']];
            }
            $is_approve_flip = array_flip($this->is_approve);
            if (isset($is_approve_flip[$rows[$k]['is_approve']])){
                $rows[$k]['is_approve'] = $is_approve_flip[$rows[$k]['is_approve']];
            }
            $is_settlement_flip = array_flip($this->is_settlement);
            if (isset($is_settlement_flip[$rows[$k]['is_settlement']])){
                $rows[$k]['is_settlement'] = $is_settlement_flip[$rows[$k]['is_settlement']];
            }
            $contract_status_flip = array_flip($this->contract_status);
            if (isset($contract_status_flip[$rows[$k]['contract_status']])){
                $rows[$k]['contract_status'] = $contract_status_flip[$rows[$k]['contract_status']];
            }
            if(isset($rows[$k]['service_type'])){
                $service_type_flip = array_flip($this->service_type);
                $service_type_type = explode(',',$rows[$k]['service_type']);
                $for_service_type = '';
                for($index=0;$index<count($service_type_type);$index++){
                    if (isset($service_type_flip[$service_type_type[$index]])){
                        $for_service_type .= $service_type_flip[$service_type_type[$index]].',';
                    }
                }
                $for_service_type = rtrim($for_service_type,',');
            }

            $rows[$k]['service_type'] = $for_service_type;
            $rows[$k]['custid'] = $name;

        }

        return $rows;
    }
    public function findNum($str=''){
        $str=trim($str);
        if(empty($str)){
            return '';
        }
        $temp=array('1','2','3','4','5','6','7','8','9','0');
        $result='';
        for($i=0;$i<strlen($str);$i++){
            if(in_array($str[$i],$temp)){
                $result.=$str[$i];
            }
        }
        return $result;
    }
}