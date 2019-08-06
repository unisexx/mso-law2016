<?php
class Law_privileges extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_privilege();
		if(@$_GET['search']){
			$data['rs']->where('pri_name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('law_privileges/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_privilege($id);
		
		// กฏหมายที่เกี่ยวข้อง
		if($id!=""){
			$data['laws'] = new Law_link_privilege();
			$data['laws']->where('law_privilege_id = '.$id)->get();
		}
		
		$this->template->build('law_privileges/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['pri_name'] = lang_encode($_POST['pri_name']);
			$_POST['pri_date'] = Date2DB($_POST['pri_date']);
			
			$rs = new Law_privilege($id);

			$allowed =  array('doc','docx' ,'xls', 'xlsx','pdf');

			if($_FILES['pri_file_th']['name'])
			{
				$filename_th = $_FILES['pri_file_th']['name'];
				$ext_th = pathinfo($filename_th, PATHINFO_EXTENSION);
				if(in_array($ext_th,$allowed) ) {
					if($rs->id){
						$rs->delete_file($rs->id,'uploads/privilegefile','pri_file_th');
					}
					$_POST['pri_file_th'] = $rs->upload($_FILES['pri_file_th'],'uploads/privilegefile/');
				}
			}
			
			if($_FILES['pri_file_en']['name']){
				$filename_en = $_FILES['pri_file_en']['name'];
				$ext_en = pathinfo($filename_en, PATHINFO_EXTENSION);
				if(in_array($ext_en,$allowed) ) {
					if($rs->id){
						$rs->delete_file($rs->id,'uploads/privilegefile','pri_file_en');
					}
					$_POST['pri_file_en'] = $rs->upload($_FILES['pri_file_en'],'uploads/privilegefile/');
				}
			}
			
			$rs->from_array($_POST);
			$rs->save();
			
			// หา max id
			if(@$id){
				$law_privilege_id = $id;
			}else{
				$row = $this->db->query('SELECT MAX(id) AS maxid FROM law_privileges')->row();
				if ($row) {
				    $law_privilege_id = $row->maxid; 
				}
			}
			
			// กฎหมายที่เกี่ยวข้อง
			if(@$_POST['law_datalaw_id']){
				// ลบข้อมูลเก่า
				@$this->db->where('law_privilege_id', $law_privilege_id)->delete('law_link_privileges');

				foreach($_POST['law_datalaw_id'] as $key=>$value){
					$law = new Law_link_privilege();
					$law->law_datalaw_id = $value;
					$law->law_privilege_id = $law_privilege_id;
					$law->save();
				}
			}
			
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_privileges');
	}

	function delete($id){
		if($id){
			
			// ลบกฏหมายที่เกี่ยวข้อง
			@$this->db->where('law_privilege_id', $id)->delete('law_link_privileges');
			
			$rs = new Law_privilege($id);
			$rs->delete();
			
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_privileges');
	}

}
?>
