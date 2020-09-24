<?php
namespace User\Controller;
use Common\Controller\MemberbaseController;
class SettingController extends MemberbaseController {
	protected $users_model;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
	}
    //会员中心
	public function index() {
		$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->display();
    }
    public function setting_post(){
        if(IS_POST){
         $userid=sp_get_current_userid();
         $data['user_nicename']=$_POST['user_nicename'];
         $data['sex']=$_POST['sex'];
         $data['mobile']=$_POST['mobile'];
         $data['prov']=$_POST['prov'];
         $data['city']=$_POST['city'];
         $data['dist']=$_POST['dist'];
         $data['birthday']=$_POST['birthday'];
         $data['signature']=$_POST['signature'];
         $data['weiixn']=$_POST['weiixn'];
         $data['qq']=$_POST['qq'];
         $result=$this->users_model->where(array("id"=>$userid))->save($data);
			if ($result) {
				
					$this->success("修改成功！");
				}else{
					$this->error("修改失败！");
				}			
        }
       
    }
}