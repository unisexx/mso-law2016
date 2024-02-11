<?php
class Law_types extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_type();
		if(@$_GET['search']){$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');}
		if(@$_GET['law_group_id']){$data['rs']->where('law_group_id = '.$_GET['law_group_id']);}

		$data['rs']->order_by('id','asc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('law_types/index',$data);
	}

	function form($id=false){
		$data['rs'] = new Law_type($id);
		$this->template->build('law_types/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['name'] = lang_encode($_POST['name']);
			$_POST['unit_import'] = implode(',', $_POST['unit_import']);

			// ไฟล์แนบ
			$allowed =  array('jpg','jpeg' ,'png');
			if($_FILES['pic']['name'])
			{
				$pic = $_FILES['pic']['name'];
				$ext_th = pathinfo($pic, PATHINFO_EXTENSION);
				if(in_array($ext_th,$allowed) ) {
					if($rs->id){
						$rs->delete_file($rs->id,'uploads/law_types','pic');
					}
					$_POST['pic'] = $rs->upload($_FILES['pic'],'uploads/law_types/');
				}
			}

			$rs = new Law_type($id);
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/law_types');
	}

	function delete($id){
		if($id){
			$rs = new Law_type($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/law_types');
	}

}
?>
