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
			$data['rs']->where('committee_name LIKE "%'.$_GET['search'].'%"');
		}
		if(@$_GET['Law_privilege_type_id']){
			$data['rs']->where('Law_privilege_type_id = '.$_GET['Law_privilege_type_id']);
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
			
			$rs = new Law_privilege($id);
			
			if($_FILES['pri_file']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/law_privileges','pri_file');
				}
				$_POST['pri_file'] = $rs->upload($_FILES['pri_file'],'uploads/law_privileges/');
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
