<?php
class flow_customerClassModel extends flowModel
{
	public function initModel()
	{
        $this->business_type = array('概算','预算','控制价','变更签证','结算','财务决算','期中支付','全过程','跟踪审计','框架协议');//业务类型
        $this->industry = array('建筑','学校');//行业
        $this->area = array('珠海','深圳','东莞','广州','广东','中山','惠州','厦门','安徽','西安','阳江');//地区
		$this->statearr		 = c('array')->strtoarray('停用|#888888,启用|green');
		$this->statarr		 = c('array')->strtoarray('否|#888888,是|#ff6600');
	}
	
	public function flowrsreplace($rs, $lx=0)
	{
        if(isset($rs['business_type'])){
            $business_type = explode(',',$rs['business_type']);
            $for_business_type = '';
            for($index=0;$index<count($business_type);$index++){
                $for_business_type .= $this->business_type[$business_type[$index]].',';
            }
            $rs['business_type'] = rtrim($for_business_type,',');
        }
        if(isset($this->industry[$rs['industry']])){
            $rs['industry'] = $this->industry[$rs['industry']];
        }
        if(isset($this->area[$rs['area']])){
            $rs['area'] = $this->area[$rs['area']];
        }
		if(isset($rs['status'])){
			if($rs['status']==0)$rs['ishui'] = 1;
			$zt 	= $this->statearr[$rs['status']];
			$rs['statuss']	= $rs['status'];
			$rs['status']	= '<font color="'.$zt[1].'">'.$zt[0].'</font>';
		}

		if(isset($rs['isstat'])){
			$stat 	= $this->statarr[$rs['isstat']];
			$rs['isstat']	= '<font color="'.$stat[1].'">'.$stat[0].'</font>';
		}

		if(isset($rs['isgys'])){
			$gys 	= $this->statarr[$rs['isgys']];
			$rs['isgys']	= '<font color="'.$gys[1].'">'.$gys[0].'</font>';
		}
		if($this->rock->arrvalue($rs,'htshu','0')==0)$rs['htshu']='';
		if($this->rock->arrvalue($rs,'moneyz','0')==0)$rs['moneyz']='';
		if($this->rock->arrvalue($rs,'moneyd','0')==0)$rs['moneyd']='';

		if($lx==1){
			$rs['suoname'] = $this->adminmodel->getmou('name','id='.$rs['uid'].'');
		}

		return $rs;
	}
	
	
	
	//是否有查看权限
	protected function flowisreadqx()
	{
		$bo = false;
		$shateid = ','.$this->rs['shateid'].',';
		if(contain($shateid,','.$this->adminid.','))$bo=true;
		return $bo;
	}
	
	protected function flowgetfields_qiyong($lx)
	{
		$arr = array();
		if($this->uid==$this->adminid){
			$arr['mobile'] 		= '手机号';
			$arr['tel'] 		= '电话';
			$arr['email'] 		= '邮箱';
			$arr['routeline'] 	= '交通路线';
		}
		return $arr;
	}

	
	protected function flowoptmenu($ors, $crs)
	{
		$zt  = $ors['statusvalue'];
		$num = $ors['num'];
		if($num=='ztqh'){
			$this->update('`status`='.$zt.'', $this->id);
		}
		
		//共享
		if($num=='shate'){
			$cname 	 = $crs['cname'];
			$cnameid = $crs['cnameid'];
			$this->update(array(
				'shateid' 	=> $cnameid,
				'shate' 	=> $cname,
			), $this->id);
			$this->push($cnameid, '客户管理', ''.$this->adminname.'将一个客户【{name}】共享给你');
		}
		
		//取消共享
		if($num=='unshate'){
			$this->update(array(
				'shateid' 	=> '',
				'shate' 	=> '',
			), $this->id);
		}	
	}
	
	protected function flowbillwhere($uid, $lx)
	{
		return array(
			'order' => 'a.status desc,a.optdt desc',
			'table'	=> '`[Q]'.$this->mtable.'` a left join `[Q]admin` b on a.`uid`=b.id',
			'asqom' => 'a.',
			'fields'=> 'a.*,b.name as suoname'
		);
	}

    //导入之前判断
    public function flowdaorubefore($rows)
    {

        foreach($rows as $k=>$rs){
            if(isset($rows[$k]['business_type'])){
                $business_type_flip = array_flip($this->business_type);
                $business_type = explode(',',$rows[$k]['business_type']);
                $for_business_type = '';
                for($index=0;$index<count($business_type);$index++){
                    if (isset($business_type_flip[$business_type[$index]])){
                        $for_business_type .= $business_type_flip[$business_type[$index]].',';
                    }
                }
                $for_business_type = rtrim($for_business_type,',');
            }
            $industry_flip = array_flip($this->industry);
            if (isset($industry_flip[$rows[$k]['industry']])){
                $industry = $industry_flip[$rows[$k]['industry']];
            }else{
                $industry = null;
            }
            $area_flip = array_flip($this->area);
            if (isset($area_flip[$rows[$k]['area']])){
                $area = $area_flip[$rows[$k]['area']];
            }else{
                $area = null;
            }
            $rows[$k]['laiyuan'] = '其它';
            $rows[$k]['type'] = '其它';
            $rows[$k]['area'] = $area;
            $rows[$k]['industry'] = $industry;
            $rows[$k]['business_type'] = $for_business_type;
        }

        return $rows;
    }
	
	//导入数据的测试显示
	public function flowdaorutestdata()
	{
		$barr = array(
			'name' 		=> '海纳百川CRM',
			'type' 		=> '软件',
			'laiyuan' 		=> '网上开拓',
			'unitname' 		=> '深圳海纳百川信息技术有限公司',
			'tel' 		=> '0755-123456',
			'mobile' 		=> '15800000000',
			'email' 		=> 'admin@admin.com',
			'address' 		=> '深圳南山科技园',
			'linkname' 		=> '诸葛亮',
		);
		$barr1 = array(
			'name' 		=> '百度',
			'type' 		=> '搜索计算',
			'laiyuan' 		=> '电话联系',
			'unitname' 		=> '百度在线网络技术(北京)有限公司',
			'tel' 		=> '010-123456',
			'mobile' 		=> '15800000001',
			'email' 		=> 'admin@baidu.com',
			'address' 		=> '北京软件园百度大厦',
			'linkname' 		=> '李彦宏',
		);
		$barr2 = array(
			'name' 		=> '陈先生',
			'type' 		=> '个人',
			'laiyuan' 		=> '电话联系',
			'unitname' 		=> '',
			'tel' 		=> '010-123456',
			'mobile' 		=> '15800000002',
			'email' 		=> '1111@qq.com',
			'address' 		=> '福建厦门火车站',
			'linkname' 		=> '',
		);
		return array($barr,$barr1,$barr2);
	}

}