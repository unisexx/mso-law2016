<?php
Class Ajax extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_select_submaintype(){
		if($_GET){
			echo form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes where law_maintype_id = '.$_GET['law_maintype_id'].' order by id asc'), @$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','-- เลือกประเภทย่อยกฎหมาย --');
		}
	}
}
?>