<?php
class Law_plans extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_plan();
		if(@$_GET['search']){
			$data['rs']->where('plan_name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_plans/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_plan($id);
		$this->template->build('law_plans/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new Law_plan($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_plans');
	}

	function delete($id){
		if($id){
			$rs = new Law_plan($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_plans');
	}

}
?>
