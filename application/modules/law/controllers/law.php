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
		
		// ผูกกฎหมาย (คาบ/ข้าม)
		$data['law_overlaps'] = new Law_overlap_or_skip();
		$data['law_overlaps']->where('law_datalaw_id = '.$id)->get();
			
		// กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)
		$data['law_versions'] = new Law_version();
		$data['law_versions']->where('law_datalaw_id = '.$id)->get();
		
		// law option
		$data['law_options'] = new Law_option();
		$data['law_options']->order_by('id asc')->get();
		
		$data['law_optioninlaws'] = new Law_optioninlaw();
		$data['law_optioninlaws']->where('law_datalaw_id = '.$id)->order_by('id asc')->get();
			
		$this->template->build('view',$data);
	}

	function download_by_name($law_id){
    //force-download();
        if($_GET['filename']!=''){
        $filename = @$_GET['filename'];
        $path = "uploads/lawfile/".$filename;
        $this->load->helper('download');
        $this->load->helper('file');
        $media->file = 'http://law.m-society.go.th/law2016/'.$path;
        $user_type = $this->session->userdata('id') != '' ? 2 : 1;
        $this->db->query("INSERT INTO law_download (filename,time_download,user_download)values('".$filename."','".date("Y-m-d H:i:s")."',".$user_type.")");

        if(!get_mime_by_extension($media->file))
        {
            redirect($media->file);
        }
        else
        {
            $data = file_get_contents(urldecode($media->file));
            $name = basename(urldecode($media->file));
            force_download($name, $data);
        }

      }
      }
	
}
?>
