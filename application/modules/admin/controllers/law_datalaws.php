<?php
class Law_datalaws extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_datalaw();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('law_datalaws/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_datalaw($id);
		$this->template->build('law_datalaws/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['name'] = lang_encode($_POST['name']);
			
			$rs = new Law_datalaw($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_datalaws');
	}

	function delete($id){
		if($id){
			$rs = new Law_datalaw($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_datalaws');
	}

}
?>
