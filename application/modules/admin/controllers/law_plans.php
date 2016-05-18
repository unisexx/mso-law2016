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
			$_POST['plan_name'] = lang_encode($_POST['plan_name']);
			
			$rs = new Law_plan($id);
			
			if($_FILES['plan_file_th']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/planfile','plan_file_th');
				}
				$_POST['plan_file_th'] = $rs->upload($_FILES['plan_file_th'],'uploads/planfile/');
			}
			
			if($_FILES['plan_file_en']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/planfile','plan_file_en');
				}
				$_POST['plan_file_en'] = $rs->upload($_FILES['plan_file_en'],'uploads/planfile/');
			}
			
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
