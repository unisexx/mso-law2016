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
		if(@$_GET['user_group_id']){ $condition = " where sys_users.user_group_id = ".$_GET['user_group_id']; }
		$sql = "SELECT
				user_logs.*
				FROM
				user_logs
				LEFT JOIN sys_users ON user_logs.id_login = sys_users.id ".@$condition;
		$user_log = new User_log();
        $data['rs'] = $user_log->sql_page($sql, 20);
		$data['pagination'] = $user_log->sql_pagination;
		
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
