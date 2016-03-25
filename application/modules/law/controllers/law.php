<?php
/*
 * --- หมายเหตุ ---
 * เปลี่ยนชื่อฟิลด์เทเบิ้ล law_datalaws จากเว็บเก่าเป็นชื่อใหม่ดังนี้
 * group_id 		เปลี่ยนชื่อเป็น 		law_group_id
 * category_id 	เปลี่ยนชื่อเป็น 		law_type_id
 * type_id 			เปลี่ยนชื่อเป็น 		law_maintype_id
 * subtype_id 	เปลี่ยนชื่อเป็น 		law_submaintype_id
 * 
 * */
 
class Law extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function type_list($id)
	{
		$data['rs'] = new Law_type($id);
		
		$data['laws'] = new Law_datalaw();
		if(@$_GET['law_maintype_id']){$data['laws']->where('law_maintype_id = '.$_GET['law_maintype_id']);}
		if(@$_GET['law_submaintype_id']){$data['laws']->where('law_submaintype_id = '.$_GET['law_submaintype_id']);}
		$data['laws']->where('law_type_id = '.$id);
		$data['laws']->order_by('id','desc')->get_page();
		
		$this->template->build('type_list',$data);
	}
	
	function group_list(){
		// $sqls = "SELECT law_datalaw.id,
					    // law_datalaw.name_th,
					    // law_datalaw.filename_th,
					    // law_datalaw.filename_eng
					  // FROM law_datalaw
					  // WHERE law_datalaw.type_id NOT IN ('2', '5') AND
					    // law_datalaw.apply_power_id IS NOT NULL AND 
					    // law_datalaw.group_id = '$groupID' AND
					    // law_datalaw.category_id = '$categoryID' 
					  // ORDER BY law_datalaw.type_id ASC,
					    // law_datalaw.subtype_id ASC,
					    // law_datalaw.name_th ASC" ;
	
		$data['laws'] = new Law_datalaw();
		if(@$_GET['law_group_id']){$data['laws']->where('law_group_id = '.$_GET['law_group_id']);}
		if(@$_GET['law_type_id']){$data['laws']->where('law_type_id = '.$_GET['law_type_id']);}
		$data['laws']->where("law_maintype_id not in ('2', '5')");
		$data['laws']->where('apply_power_id is not null');
		$data['laws']->order_by('law_maintype_id','asc')->order_by('law_submaintype_id','asc')->order_by('name_th','asc')->get_page();
		$this->template->build('group_list',$data);
	}
	
	function view($id){
		$data['rs'] = new Law_datalaw($id);
		$this->template->build('view',$data);
	}
	
}
?>
