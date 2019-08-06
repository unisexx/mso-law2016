<?php
class Law_resolutions extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_resolution();
		if(@$_GET['search']){$data['rs']->where('resolution_name LIKE "%'.$_GET['search'].'%"');}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_resolutions/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_resolution($id);
		$this->template->build('law_resolutions/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['resolution_name'] = lang_encode($_POST['resolution_name']);
			$_POST['resolution_dateappoint'] = Date2DB($_POST['resolution_dateappoint']);
			
			$rs = new Law_resolution($id);
			

			$allowed =  array('doc','docx' ,'xls', 'xlsx','pdf');

			if($_FILES['resolution_file_th']['name'])
			{
				$filename_th = $_FILES['resolution_file_th']['name'];
				$ext_th = pathinfo($filename_th, PATHINFO_EXTENSION);
				if(in_array($ext_th,$allowed) ) {
					if($rs->id){
						$rs->delete_file($rs->id,'uploads/resolutionfile','resolution_file_th');
					}
					$_POST['resolution_file_th'] = $rs->upload($_FILES['resolution_file_th'],'uploads/resolutionfile/');
				}
			}
			
			if($_FILES['resolution_file_en']['name']){
				$filename_en = $_FILES['resolution_file_en']['name'];
				$ext_en = pathinfo($filename_en, PATHINFO_EXTENSION);
				if(in_array($ext_en,$allowed) ) {
					if($rs->id){
						$rs->delete_file($rs->id,'uploads/resolutionfile','resolution_file_en');
					}
					$_POST['resolution_file_en'] = $rs->upload($_FILES['resolution_file_en'],'uploads/resolutionfile/');
				}
			}
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_resolutions');
	}

	function delete($id){
		if($id){
			$rs = new Law_resolution($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_resolutions');
	}

}
?>
