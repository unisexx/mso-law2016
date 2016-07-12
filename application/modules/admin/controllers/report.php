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
	
	// รายงานสถิติการใช้ข้อมูล (download)
	function report_3(){
		$condition = " 1=1 ";
		
		if(@$_GET['s_date'] != "" and $_GET['e_date'] == ""){ $condition .= " and (law_downloads.created BETWEEN '".Date2DB($_GET['s_date'])."' AND '".Date('Y-m-d')."') "; }
		
		if(@$_GET['s_date'] == "" and $_GET['e_date'] != ""){ $condition .= " and (law_downloads.created < '".Date2DB($_GET['e_date'])."') "; }
		
		if(@$_GET['s_date'] != "" and $_GET['e_date'] != ""){ $condition .= " and (law_downloads.created BETWEEN '".Date2DB($_GET['s_date'])."' AND '".Date2DB($_GET['e_date'])."') "; }
		
		$sql = "SELECT
					law_datalaws.name_th,
					law_downloads.filename,
					Count(law_downloads.filename) AS total
				FROM
					law_downloads
				INNER JOIN law_datalaws ON law_downloads.law_datalaw_id = law_datalaws.id
				WHERE ".@$condition."
				GROUP BY
					filename
				ORDER BY
					total DESC";
		$rs = new Law_download();
        $data['rs'] = $rs->sql_page($sql, 20);
		$data['pagination'] = $rs->sql_pagination;
		
		$this->template->build('report/report_3',$data);
	}
	
	// รายงานการใช้งานระบบของผู้นำเข้ากฎหมาย
	function report_4()
	{
		if(@$_GET['user_group_id']){ $condition = " and sys_users.user_group_id = ".$_GET['user_group_id']; }
		$sql = "SELECT
				user_logs.*
				FROM
				user_logs
				LEFT JOIN sys_users ON user_logs.id_login = sys_users.id 
				WHERE module = 'law_datalaws' ".@$condition;
		$user_log = new User_log();
        $data['rs'] = $user_log->sql_page($sql, 20);
		$data['pagination'] = $user_log->sql_pagination;
		
		$this->template->build('report/report_4',$data);
	}
	
	// รายงานแสดงจำนวนกฏหมาย
	function report_5()
	{
		$this->template->build('report/report_5');
	}
	
	// รายงานการใช้งานระบบบริหารจัดการผู้ใช้
	function report_6()
	{
		if(@$_GET['user_group_id']){ $condition = " and sys_users.user_group_id = ".$_GET['user_group_id']; }
		$sql = "SELECT
				user_logs.*
				FROM
				user_logs
				LEFT JOIN sys_users ON user_logs.id_login = sys_users.id 
				WHERE module = 'user' ".@$condition;
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
