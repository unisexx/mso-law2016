<?php
class Convert extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	// แปลงวันไทยเป็น mysql Date Format (04 พ.ย. 2559 = > 2016-11-04)
	function thdate2DB(){
		
		$sql = "select id, notic_date, import_date, use_date, gazete_notice_date from law_datalaws order by id asc";
		$law_datalaws = $this->db->query($sql)->result();
		
		foreach($law_datalaws as $row){
				
			if (strpos($row->notic_date, ' ') !== false) {
				$notic_date = th2mysqldate($row->notic_date);
			}else{
				$notic_date = $row->notic_date;
			}
			
			if (strpos($row->import_date, ' ') !== false) {
				$import_date = th2mysqldate($row->import_date);
			}else{
				$import_date = $row->import_date;
			}
			
			if (strpos($row->use_date, ' ') !== false) {
				$use_date = th2mysqldate($row->use_date);
			}else{
				$use_date = $row->use_date;
			}
			
			if (strpos($row->gazete_notice_date, ' ') !== false) {
				$gazete_notice_date = th2mysqldate($row->gazete_notice_date);
			}else{
				$gazete_notice_date = $row->gazete_notice_date;
			}
			
			// $notic_date = th2mysqldate($row->notic_date);
			// $import_date = th2mysqldate($row->import_date);
			// $use_date = th2mysqldate($row->use_date);
			// $gazete_notice_date = th2mysqldate($row->gazete_notice_date);
			
			$sql = "UPDATE law_datalaws
						SET 
						notic_date='".@$notic_date."',
						import_date='".@$import_date."',
						use_date='".@$use_date."',
						gazete_notice_date='".@$gazete_notice_date."'
						WHERE id= ".@$row->id;
			$this->db->query($sql);
			
			echo "ID : ".$row->id." Complete<br>";
		}
		
		echo "Finish !!!";
	}

	// แปลงวัน mysql Date Format (20/10/2014 = > 2016-11-04)
	function thdate2DB_2(){
		
		$sql = "select id, rdate from sys_users order by id asc";
		$rs = $this->db->query($sql)->result();
		
		foreach($rs as $row){
				
			$sql = "UPDATE sys_users
						SET 
						rdate='".@switchDateYear($row->rdate)."'
						WHERE id= ".@$row->id;
			$this->db->query($sql);
			
			echo "ID : ".$row->id." Complete<br>";
		}
		
		echo "Finish !!!";
	}
	
}
?>
