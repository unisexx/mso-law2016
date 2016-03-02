<?php
class Law_options extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_option();
		if(@$_GET['search']){
			$data['rs']->where('typeName LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('law_options/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_option($id);
		$this->template->build('law_options/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new Law_option($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_options');
	}

	function delete($id){
		if($id){
			$rs = new Law_option($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_options');
	}

}
?>
