<?php
class Law_submaintypes extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_submaintype();
		if(@$_GET['search']){$data['rs']->where('typeName LIKE "%'.$_GET['search'].'%"');}
		if(@$_GET['law_maintype_id']){$data['rs']->where('law_maintype_id = '.$_GET['law_maintype_id']);}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_submaintypes/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_submaintype($id);
		$this->template->build('law_submaintypes/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new Law_submaintype($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_submaintypes');
	}

	function delete($id){
		if($id){
			$rs = new Law_submaintype($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_submaintypes');
	}

}
?>
