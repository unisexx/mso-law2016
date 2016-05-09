<?php
class Law_datalaws extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_datalaw();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('law_datalaws/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_datalaw($id);
		
		if($id!=""){
			// ผูกกฎหมาย (คาบ/ข้าม)
			$data['law_overlaps'] = new Law_overlap_or_skip();
			$data['law_overlaps']->where('law_datalaw_id = '.$id)->get();
			
			// กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)
			$data['law_versions'] = new Law_version();
			$data['law_versions']->where('law_datalaw_id = '.$id)->get();
			
			// Option
			$data['law_options'] = new Law_optioninlaw();
			$data['law_options']->where('law_datalaw_id = '.$id)->get();
		}
		
		$this->template->build('law_datalaws/form',$data);
	}

	function save($id=false){
		if($_POST){
			$rs = new Law_datalaw($id);
			
			if($_FILES['filename_th']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/law_datalaws','filename_th');
				}
				$_POST['filename_th'] = $rs->upload($_FILES['filename_th'],'uploads/law_datalaws/');
			}
			
			$_POST['gazete_notice_date'] = Date2DB($_POST['gazete_notice_date']);
			$_POST['notic_date'] = Date2DB($_POST['notic_date']);
			$_POST['import_date'] = Date2DB($_POST['import_date']);
			$_POST['use_date'] = Date2DB($_POST['use_date']);
			
			$rs->from_array($_POST);
			$rs->save();
			
			// หา max id
			if(@$id){
				$law_datalaw_id = $id;
			}else{
				$row = $this->db->query('SELECT MAX(id) AS maxid FROM law_datalaws')->row();
				if ($row) {
				    $law_datalaw_id = $row->maxid; 
				}
			}
			
			// ผูกกฎหมาย (คาบ/ข้าม)
			if(@$_POST['ov_sk_law']){
				// ลบข้อมูลเก่า หากมีการลบข้อมูลที่บันทึกไว้ก่อนหน้านั้น
				$ov_id_array = implode(", ", $_POST['ov_id']);
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id.' and id not in ( '.$ov_id_array.')')->delete('law_overlap_or_skips');

				foreach($_POST['ov_sk_law'] as $key=>$value){
					$law = new Law_overlap_or_skip($_POST['ov_id'][$key]);
					$law->ov_sk_law = $value;
					$law->ov_sk_type = $_POST['ov_sk_type'][$key];
					$law->ov_sk_description = $_POST['ov_sk_description'][$key];
					$law->law_datalaw_id = $law_datalaw_id;
					$law->save();
				}
			}

			// กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)
			if(@$_POST['law_id_select']){
				// ลบข้อมูลเก่า หากมีการลบข้อมูลที่บันทึกไว้ก่อนหน้านั้น
				$version_id_array = implode(", ", $_POST['version_id']);
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id.' and id not in ( '.$version_id_array.')')->delete('law_versions');

				foreach($_POST['law_id_select'] as $key=>$value){
					$law = new Law_version($_POST['version_id'][$key]);
					$law->law_id_select = $value;
					$law->version_type = $_POST['version_type'][$key];
					$law->version_txt = $_POST['version_txt'][$key];
					$law->law_datalaw_id = $law_datalaw_id;
					$law->save();
				}
			}
			
			
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect($_SERVER['HTTP_REFERER']);
		// redirect('admin/law_datalaws');
	}

	function delete($id){
		if($id){
			$rs = new Law_datalaw($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_datalaws');
	}

}
?>
