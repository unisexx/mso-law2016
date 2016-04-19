<?php
class Law_committees extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_committee();
		if(@$_GET['search']){
			$data['rs']->where('plan_name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_committees/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_committee($id);
		$this->template->build('law_committees/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['plan_name'] = lang_encode($_POST['plan_name']);
			
			$rs = new Law_committee($id);
			
			if($_FILES['plan_file']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/Law_committees','plan_file');
				}
				$_POST['plan_file'] = $rs->upload($_FILES['plan_file'],'uploads/Law_committees/');
			}
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_committees');
	}

	function delete($id){
		if($id){
			$rs = new Law_committee($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_committees');
	}

}
?>
