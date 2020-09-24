<?php
namespace Course\Controller;
use Common\Controller\AdminbaseController;
require('./Expand/cos/include.php');
use Qcloud_cos\Auth;
use Qcloud_cos\Cosapi;
class AdminSectionController extends AdminbaseController {
	protected $section_obj;
	protected $course_obj;
    
	function _initialize() {
		parent::_initialize();
		$this->section_obj = D("Common/Section");
		$this->sectionview_obj = D("Common/SectionView");
		$this->course_obj = D("Common/Course");
	}
   public function cos_upload() {
   set_time_limit(0);//防止上传大文件超时
     
    //上传文件的路径
    $srcPath=$_FILES['upvideo']['tmp_name'];
    $bucketName = C('DOMAIN'); //Bucket名称
    $dar=Date('Y').'/'.Date('m'); //以年月为目录
    //查询目录 如果无目录则创建目录
    $path = "/$dar/";
    $ispath=Cosapi::statFolder($bucketName, $path);
    if($ispath['code']!='0'){
        //没有目录先创建
        Cosapi::createFolder($bucketName, $path);
    }
    //cos存储的路径
    $dstPath = $path.$_FILES['upvideo']['name'];
    $_SESSION["access_name"]=$_FILES['upvideo']['name'];
    //上传
    if($_FILES['upvideo']['size'] < 7388608){
        //小于8M
        $arr = Cosapi::upload($srcPath,$bucketName,$dstPath);
    }else{
        //大于8M使用分片上传
        $arr = Cosapi::upload_slice($srcPath, $bucketName, $dstPath);
    }
    if($arr['code']=='0'){//上传成功了
    	$_SESSION["access_url"]=$arr['data']['access_url'];
        $this->success('上传成功');
   
    }else{
        $this->success('上传失败');
    }
   }
   public function upload(){
   if (!empty($_FILES) && $_POST['token'] == $verifyToken) 
    {
        $upload = new \Think\Upload();// 实例化上传类
        //  $upload->maxSize   =     3145728 ;      // 设置附件上传大小
          $upload->exts      =     C('VEDIOTYPE');  // 设置附件上传类型
            $upload->rootPath  =      './upload/vedio/'; // 设置附件上传根目录
        // 上传单个文件
        $info   =   $upload->uploadOne($_FILES['Filedata']);
        if(!$info) 
        {
            echo "error".$upload->getError();
        }
        else 
        {
            echo $info['savepath'].$info['savename'];
        }
        //  $name = $_SERVER['DOCUMENT_ROOT'].'/upload/vedio/'.$info['savepath'].$info['savename'];
        $data['name'] = $info['savepath'].$info['savename'];      //  上传后的文件名！
    }
    }
	
	
	function index(){
		$this->_lists();
		$this->_getCourse();
		$this->display();
	}
    function index_cs(){
		$id=  intval(I("get.cs_id"));
		$cs_name=$this->course_obj->where("id=$id")->getField('cs_name');
		$sc_data=$this->section_obj->where("cs_id=$id")->order("id ASC")->select();
	    $this->assign("sc_data",$sc_data);
	    $this->assign("cs_id",$id);
	    $this->assign("cs_data",$cs_name);
	    
		$this->display();
    }
	function add(){
		$cs_id=  intval(I("get.cs_id"));
		$cs_data=$this->section_obj->where("id=$cs_id")->find();
		$where['cs_id']=$cs_id;
		$where['type_id']=1;
		$zhang_list=$this->section_obj->where($where)->order("id DESC")->select();
		$this->assign("cs_data",$cs_data);
		$this->assign("cs_id",$cs_id);
		$this->assign("zhang_list",$zhang_list);
		$this->display();
	}
    function add_zhang(){
		$cs_id=  intval(I("get.cs_id"));
		$this->assign("cs_id",$cs_id);
		$this->display();   
	}
    function add_video(){
		
		$this->display();   
	}
    function add_zhang_post(){
        if (IS_POST) {
        	
		    $data['cs_id']=intval(I("post.cs_id"));
		    $data['type_id']=intval(I("post.type_id"));
		    $data['sc_name']=I("post.sc_name");
		    $data['addtime']=I("post.addtime");
		    $data['state']=1;
		    if($data['sc_name']==null){
		       $this->error("请填写章节名称！");
		    }
			$result=$this->section_obj->add($data);
			if ($result) {
				
					$this->success("添加成功！" );
				}else{
					$this->error("添加失败！");
				}			
		}
	}
	
    function addaudio(){
		
		$this->display();
	}
	function add_post(){
	   if (IS_POST) {
			if ($data=$this->section_obj->create()) {
				if ($this->section_obj->add()!==false) {
					session("access_url",null);
					session("access_name",null);
					$this->success("添加成功！");
					
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->section_obj->getError());
			}
		}
	}
   function add_all(){
		
		$this->display();
	}
	public function edit(){
		$id=  intval(I("get.id"));
		$section=$this->section_obj->where("id=$id")->find();
		$course = $this->course_obj->order(array("listorder"=>"asc"))->select();
		$this->assign("course",$course);
		$this->assign("section",$section);
		$this->display();
	}
    public function edit_zhang(){
		$id=  intval(I("get.id"));
		$section=$this->section_obj->where("id=$id")->find();
		$this->assign("section",$section);
		$this->display();
	}
	public function edit_post(){
     	if (IS_POST) {
     		$id=  intval(I("post.id"));
			if ($this->section_obj->create()) {
				if ($this->section_obj->where("id=$id")->save()!==false) {
					$this->success("编辑成功！");
				} else {
					$this->error("编辑失败！");
				}
			} else {
				$this->error($this->section_obj->getError());
			}
		}
	}
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->section_obj);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	private  function _lists($status=1){
		$cs_id=0;
		$type_id=0;
		if(!empty($_REQUEST["cs_id"])){
			$cs_id=intval($_REQUEST["cs_id"]);
		}
	    $where_ands=empty($cs_id)? array("state<=$status and type_id<=$type_id"):array("cs_id = $cs_id and state<=$status and type_id=$type_id");
	    $fields=array(
				'start_time'=> array("field"=>"addtime","operator"=>">"),
				'end_time'  => array("field"=>"addtime","operator"=>"<"),
				'keyword'  => array("field"=>"sc_name","operator"=>"like"),
		);
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		$where= join(" and ", $where_ands);
		$count=$this->section_obj->where($where)->count();
		$page = $this->page($count, 20);
		$sectionlist=$this->sectionview_obj->where($where)->order(array('listorder','id'=>'desc'))->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign("page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("sectionlist",$sectionlist);
	}
	
	private function _getCourse(){
		
		$course = $this->course_obj->order(array("listorder"=>"asc"))->select();
		$this->assign("course",$course);
	}
	private function _getCoursename($cs_id){
	    $where['id']=$cs_id;
		$course = $this->course_obj->where($where)->select();
		$this->assign("cs_name",$course['cs_name']);
	}
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($this->section_obj->delete($id)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}

		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			if ($this->section_obj->where("id in ($tids)")->delete()) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			
			$data["state"]=1;
			$tids=join(",",$_POST['ids']);
			if ( $this->section_obj->where("id in ($tids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
			
			$data["state"]=0;
			$tids=join(",",$_POST['ids']);
			if ( $this->section_obj->where("id in ($tids)")->save($data)!==false) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
     function isfree(){
		if(isset($_POST['ids']) && $_GET["free"]){
			
			$data["is_free"]=1;
			$tids=join(",",$_POST['ids']);
			if ( $this->section_obj->where("id in ($tids)")->save($data)!==false) {
				$this->success("设置成功！");
			} else {
				$this->error("设置失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unfree"]){
			
			$data["is_free"]=0;
			$tids=join(",",$_POST['ids']);
			if ( $this->section_obj->where("id in ($tids)")->save($data)!==false) {
				$this->success("取消免费成功！");
			} else {
				$this->error("取消免费失败！");
			}
		}
	}
	
	function move(){
		if(IS_POST){
			if(isset($_GET['ids']) && isset($_POST['cs_id'])){
				$tids=$_GET['ids'];
				if ( $this->section_obj->where("id in ($tids)")->save($_POST)) {
					$this->success("移动成功！");
				} else {
					$this->error("移动失败！");
				}
			}
		}else{
			$course = $this->course_obj->order(array("listorder"=>"asc"))->select();
		    $this->assign("course",$course);
			$this->display();
		}
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$tids= implode(",", array_keys($_POST['ids']));
			$data=array("post_status"=>"0");
			$status=$this->terms_relationship->where("tid in ($tids)")->delete();
			if($status!==false){
				$status=$this->posts_obj->where("id in ($ids)")->delete();
			}
			
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$tid = intval(I("get.tid"));
				$status=$this->terms_relationship->where("tid = $tid")->delete();
				if($status!==false){
					$status=$this->posts_obj->where("id=$id")->delete();
				}
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}
		}
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("tid"=>$id,"status"=>"1");
			if ($this->terms_relationship->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
}