<?php 
/**
*	【文档】应用的接口
*/
class worcClassAction extends apiAction
{
	
	public function getdataAction()
	{
		$barr = m('word')->getdata();
		
		$this->showreturn($barr);
	}
}