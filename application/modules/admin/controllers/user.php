<?php
class User extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
		
		// $encodedEmail = $this->encrypt->encode('user_email_address');
		// $myEmail = $this->encrypt->decode($encodedEmail);
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

			// ถ้ามีการเปลี่ยนรหัสผ่าน ให้ทำการเช็กรหัสผ่านเก่าก่อน ถ้ารหัสผ่านเก่าตรง อนุญาติให้เปลี่ยนได้
			if(isset($_POST['new_password'])){
				if(verifyHashedPassword($_POST['old_password'], $rs->password)){
					$_POST['password'] = getHashedPassword($_POST['new_password']);
				}
			}
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
			
			if($id != ""){
				user_logs('user','แก้ไข้บุคลากร '.$_POST['username'],$_POST['current']);
			}else{
				user_logs('user','เพิ่มบุคลากร '.$_POST['username'],$_POST['current']);
			}
		}
		redirect('admin/user');
	}
	
	function delete($id){
		if($id){
			$rs = new Sys_user($id);
			
			user_logs('user','ลบบุคลากร '.$rs->username,current_url());
			
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/user');
	}
}
?>
