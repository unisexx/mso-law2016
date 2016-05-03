<?php
class User extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Sys_user();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('lastname LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('username LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('email LIKE "%'.$_GET['search'].'%"');
		}
		
		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('user/index',$data);
	}
	
	function form($id=false){
		$data['rs'] = new Sys_user($id);
		$this->template->build('user/form',$data);
	}
	
	function save($id=false){
		if($_POST){
			$rs = new Sys_user($id);
			
			$_POST['rdate'] = Date2DB($_POST['rdate']);
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/user');
	}
	
	function delete($id){
		if($id){
			$rs = new Sys_user($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/user');
	}
}
?>
