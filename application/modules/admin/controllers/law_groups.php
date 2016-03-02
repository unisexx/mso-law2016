<?php
class Law_groups extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_group();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('law_groups/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_group($id);
		$this->template->build('law_groups/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['name'] = lang_encode($_POST['name']);
			
			$rs = new Law_group($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_groups');
	}

	function delete($id){
		if($id){
			$rs = new Law_group($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_groups');
	}

}
?>
