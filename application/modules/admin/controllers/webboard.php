<?php
class Webboard extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_quiz();
		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('webboard/index',$data);
	}
	
	function ajax_status(){
		if($_GET){
			
		}
	}
	
	// function form($id=false){
		// $data['rs'] = new Sys_user($id);
		// $this->template->build('user/form',$data);
	// }
// 	
	// function save($id=false){
		// if($_POST){
			// $rs = new Sys_user($id);
			// $rs->from_array($_POST);
			// $rs->save();
			// set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		// }
		// redirect('admin/user');
	// }
// 	
	// function delete($id){
		// if($id){
			// $rs = new Sys_user($id);
			// $rs->delete();
			// set_notify('success', 'ลบข้อมูลเรียบร้อย');
		// }
		// redirect('admin/user');
	// }
}
?>
