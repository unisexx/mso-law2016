<?php
Class Ajax extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_select_submaintype(){
		if($_GET){
			echo form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes where law_maintype_id = '.$_GET['law_maintype_id'].' order by id asc'), @$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','--- เลือกประเภทย่อยกฎหมาย ---');
		}
	}
	
	function get_select_lawtype(){
		if($_GET){
			echo form_dropdown('law_type_id', get_option('id','name','law_types where law_group_id = '.$_GET['law_group_id'].' order by id asc'), '','class="form-control" style="width:auto;"','--- เลือกหมวดกฎหมาย ---');
		}
	}
	
	function get_law_group_list_data(){
		if($_GET){
			// function นี้เหมือนก้อบมาจาก law/group_list
			$data['laws'] = new Law_datalaw();
			if(@$_GET['law_group_id']){$data['laws']->where('law_group_id = '.$_GET['law_group_id']);}
			if(@$_GET['law_type_id']){$data['laws']->where('law_type_id = '.$_GET['law_type_id']);}
			$data['laws']->where("law_maintype_id not in ('2', '5')");
			$data['laws']->where('apply_power_id is not null');
			$data['laws']->order_by('law_maintype_id','asc')->order_by('law_submaintype_id','asc')->order_by('name_th','asc')->get(10);
			$this->load->view('get_law_group_list_data',$data);
		}
	}
	
	function get_law_data(){
		if($_GET){
			if(@$_GET['search']){$condition = ' and name_th LIKE "%'.$_GET['search'].'%" ';}
			
			$sql = "select id, name_th, status from law_datalaws where 1=1 ".$condition." order by id desc";
        	$data['rs'] = $this->db->query($sql)->result();
			$this->load->view('get_law_data',$data);
		}
	}
}
?>