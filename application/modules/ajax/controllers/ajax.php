<?php
Class Ajax extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_select_submaintype(){
		if($_GET){
			echo form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes where law_maintype_id = '.$_GET['law_maintype_id'].' order by id asc'), @$_GET['law_submaintype_id'],'class="form-control" style="width:auto;"','--- เลือกประเภทย่อยกฎหมาย ---');
		}
	}
	
	function get_select_lawtype(){
		if($_GET){
			echo form_dropdown('law_type_id', get_option('id','name','law_types where law_group_id = '.$_GET['law_group_id'].' order by id asc'), @$_GET['law_type_id'],'class="form-control" style="width:auto;"','--- เลือกหมวดกฎหมาย ---');
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
			$condition = " 1=1 ";
			if(@$_GET['search']){$condition .= ' and name_th LIKE "%'.$_GET['search'].'%" ';}
			
			$sql = "select id, name_th, status from law_datalaws where ".$condition." order by id desc";
        	$data['rs'] = $this->db->query($sql)->result();
			$this->load->view('get_law_data',$data);
		}
	}
	
	function get_cross_law_data(){
		if($_GET){
			$condition = " 1=1 ";
			if(@$_GET['search']){$condition .= ' and name_th LIKE "%'.$_GET['search'].'%" ';}
			if(@$_GET['law_group_id']){$condition .= ' and law_group_id = '.$_GET['law_group_id'];}
			if(@$_GET['law_type_id']){$condition .= ' and law_type_id = '.$_GET['law_type_id'];}
			if(@$_GET['law_maintype_id']){$condition .= ' and law_maintype_id = '.$_GET['law_maintype_id'];}
			if(@$_GET['law_submaintype_id']){$condition .= ' and law_submaintype_id = '.$_GET['law_submaintype_id'];}
			
			$sql = "select id, name_th, law_group_id, law_type_id, law_maintype_id, law_submaintype_id, status from law_datalaws where ".$condition." order by id desc";
        	$data['rs'] = $this->db->query($sql)->result();
			$this->load->view('get_cross_law_data',$data);
		}
	}
	
	function get_related_law_data(){
		if($_GET){
			$condition = " 1=1 ";
			if(@$_GET['search']){$condition .= ' and name_th LIKE "%'.$_GET['search'].'%" ';}
			
			$sql = "select id, name_th, status from law_datalaws where ".$condition." order by id desc";
        	$data['rs'] = $this->db->query($sql)->result();
			$this->load->view('get_related_law_data',$data);
		}
	}

	function vote(){
		if($_GET){
			$rs = new Law_poll();
			$rs->from_array($_GET);
			$rs->save();
		}
	}
	
	function get_select_power_group(){
		if($_GET){
			echo form_dropdown('apply_power_group',get_option('id','typeName','law_submaintypes where id < '.$_GET['law_submaintype_id'].' order by id asc'),@$_GET['apply_power_group'],'class="form-control" style="width:auto;"','-- เลือกประเภทกฎหมายย่อยที่อาศัยอำนาจ --');
		}
	}
	
	function get_select_apply_power_id(){
		if($_GET){
			$sql = "select id, name_th from law_datalaws where law_submaintype_id = ".$_GET['apply_power_group']." order by id asc";
			$rs = $this->db->query($sql)->result();
			// echo $sql;
			
			echo "<select name='apply_power_id' class='form-control' style='width:500px;'>";
			echo "<option value=''>--- กรุณาเลือกกฎหมายที่อาศัยอำนาจ ---</option>";
			foreach($rs as $row):
				if($row->id == $_GET['apply_power_id']){ $select = "selected"; }else{ $select = ""; }
				echo "<option value='".$row->id."' ".$select.">".str_replace("|"," ",$row->name_th)."</option>";
			endforeach;
			echo "</select>";
			
			// echo form_dropdown('law_type_id', get_option('id','name_th','law_datalaws where law_submaintype_id = '.$_GET['apply_power_group'].' order by id asc'), @$_GET['apply_power_id'],'class="form-control" style="width:500px;"','--- กรุณาเลือกกฎหมายที่อาศัยอำนาจ ---');
		}
	}
}
?>