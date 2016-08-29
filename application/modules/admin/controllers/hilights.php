<?php
class Hilights extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new hilight();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
		}

		$data['rs']->order_by('id','desc')->get_page();
		$this->template->build('hilights/index',$data);
	}

	function form($id=false){
		$data['rs'] = new hilight($id);
		$this->template->build('hilights/form',$data);
	}

	function save($id=false){
		if($_POST){
			$_POST['name'] = lang_encode($_POST['name']);
			
			$rs = new hilight($id);
			
			if($_FILES['img_th']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/hilight','img_th');
				}
				$_POST['img_th'] = $rs->upload($_FILES['img_th'],'uploads/hilight/');
			}
			
			if($_FILES['img_en']['name'])
			{
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/hilight','img_en');
				}
				$_POST['img_en'] = $rs->upload($_FILES['img_en'],'uploads/hilight/');
			}
			
			$rs->from_array($_POST);
			$rs->save();
			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		redirect('admin/hilights');
	}

	function delete($id){
		if($id){
			$rs = new hilight($id);
			$rs->delete();
			set_notify('success', 'ลบข้อมูลเรียบร้อย');
		}
		redirect('admin/hilights');
	}

}
?>
