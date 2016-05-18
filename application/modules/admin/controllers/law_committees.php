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
			$data['rs']->where('committee_name LIKE "%'.$_GET['search'].'%"');
		}
		if(@$_GET['law_committee_type_id']){
			$data['rs']->where('law_committee_type_id = '.$_GET['law_committee_type_id']);
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
			$_POST['committee_name'] = lang_encode($_POST['committee_name']);
			$_POST['committee_position'] = lang_encode($_POST['committee_position']);
			$_POST['committee_history'] = lang_encode($_POST['committee_history']);
			$_POST['committee_dateappoint'] = Date2DB($_POST['committee_dateappoint']);
			
			$rs = new Law_committee($id);
			
			if($_FILES['committee_picfile_th']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/committeefile','committee_picfile_th');
				}
				$_POST['committee_picfile_th'] = $rs->upload($_FILES['committee_picfile_th'],'uploads/committeefile/');
			}
			
			if($_FILES['committee_picfile_en']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/committeefile','committee_picfile_en');
				}
				$_POST['committee_picfile_en'] = $rs->upload($_FILES['committee_picfile_en'],'uploads/committeefile/');
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
