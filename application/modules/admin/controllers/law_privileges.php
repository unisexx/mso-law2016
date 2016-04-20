<?php
class Law_privileges extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_privilege();
		if(@$_GET['search']){
			$data['rs']->where('committee_name LIKE "%'.$_GET['search'].'%"');
		}
		if(@$_GET['Law_privilege_type_id']){
			$data['rs']->where('Law_privilege_type_id = '.$_GET['Law_privilege_type_id']);
		}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_privileges/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_privilege($id);
		$this->template->build('law_privileges/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['committee_name'] = lang_encode($_POST['committee_name']);
			$_POST['committee_position'] = lang_encode($_POST['committee_position']);
			$_POST['committee_history'] = lang_encode($_POST['committee_history']);
			
			$rs = new Law_privilege($id);
			
			if($_FILES['committee_picfile']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/Law_privileges','committee_picfile');
				}
				$_POST['committee_picfile'] = $rs->upload($_FILES['committee_picfile'],'uploads/Law_privileges/');
			}
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_privileges');
	}

	function delete($id){
		if($id){
			$rs = new Law_privilege($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_privileges');
	}

}
?>
