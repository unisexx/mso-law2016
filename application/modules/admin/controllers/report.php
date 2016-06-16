<?php
class Report extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	// รายงานสถิติจำนวนผู้เข้าชม
	function report_1()
	{
		$this->template->build('report/report_1');
	}
	
	// รายงานการใช้งานระบบบริหารจัดการผู้ใช้
	function report_6()
	{
		$data['rs'] = new User_log();
		
		$data['rs']->order_by('id','desc')->get();
		$this->template->build('report/report_6',$data);
	}
	
	// รายงานจำนวนผู้ใช้งานระบบ
	function report_7()
	{
		$data['rs'] = new Sys_user();
		if(@$_GET['user_group_id']){ $data['rs']->where('user_group_id = '.$_GET['user_group_id']); }
		
		$data['rs']->order_by('name','asc')->get();
		$this->template->build('report/report_7',$data);
	}
	
}
?>
