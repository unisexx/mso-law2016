<?php
class Weblinks extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Weblink();
		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('weblinks/index',$data);
	}
	
	function form($id=false){
		$data['rs'] = new Weblink($id);
		$this->template->build('weblinks/form',$data);
	}
	
	function save($id=false){
		if($_POST){
			$rs = new Weblink($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/weblinks');
	}
	
	function delete($id=false){
		if($id){
			$rs = new Weblink($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/weblinks');
	}
	
}
?>
