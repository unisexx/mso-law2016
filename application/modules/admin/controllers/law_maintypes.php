<?php
class Law_maintypes extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_maintype();
		if(@$_GET['search']){
			$data['rs']->where('typeName LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_maintypes/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_maintype($id);
		$this->template->build('law_maintypes/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new Law_maintype($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_maintypes');
	}

	function delete($id){
		if($id){
			$rs = new Law_maintype($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_maintypes');
	}

}
?>
