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
			
			$rs = new Law_resolution($id);
			
			if($_FILES['resolution_file']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/law_resolutions','resolution_file');
				}
				$_POST['resolution_file'] = $rs->upload($_FILES['resolution_file'],'uploads/law_resolutions/');
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