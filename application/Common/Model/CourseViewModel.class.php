<?php
namespace Common\Model;
use Think\Model\ViewModel;
class CourseViewModel extends ViewModel{
    public $viewFields = array(
      'Course'=>array('id','ty_id','cs_name','cs_xuni','cs_price','cs_brief','sec_numbers','cs_picture','cs_teacher','cs_addtime','cs_state','is_tuijian','listorder','labelid'),
      'Coursetype'=>array('name'=>'coursetype_name', '_on'=>'Course.ty_id=Coursetype.term_id'),
   );
	
}