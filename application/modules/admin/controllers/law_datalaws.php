<?php
class Law_datalaws extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_datalaw();
		if(@$_GET['search']){$data['rs']->where('name_th LIKE "%'.$_GET['search'].'%" or name_eng LIKE "%'.$_GET['search'].'%"');}
		if(@$_GET['law_group_id']){$data['rs']->where('law_group_id = '.$_GET['law_group_id']);}
		if(@$_GET['law_type_id']){$data['rs']->where('law_type_id = '.$_GET['law_type_id']);}
		if(@$_GET['law_maintype_id']){$data['rs']->where('law_maintype_id = '.$_GET['law_maintype_id']);}
		if(@$_GET['law_submaintype_id']){$data['rs']->where('law_submaintype_id = '.$_GET['law_submaintype_id']);}
		if(@$_GET['sortDate']){$data['rs']->order_by($_GET['sortDate']);}
		if(@$_GET['sortName']){$data['rs']->order_by($_GET['sortName']);}
		if(@!$_GET['sortDate'] && @!$_GET['sortName']){$data['rs']->order_by('id','desc');}
		
		$data['rs']->get_page();
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
			include 'include/config.inc.php';
			include 'include/class.db.php';
			include 'include/nusoap.php';
			include "include/class.serach.php";
			
			// แนบไฟล์เอกสาร ภาษาไทย
			if($_FILES['filename_th']['name'])
			{
				$target_dir = 'uploads/lawfile';
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/lawfile','filename_th');
				}
				$_POST['filename_th'] = $rs->upload($_FILES['filename_th'],'uploads/lawfile/');
				$_POST['ref_code'] = date('YmdHis');
				$FilePointer=fopen($target_dir.'/'.$_POST['filename_th'], "r");
			    $EncodeFile=fread($FilePointer, filesize ($target_dir.'/'.$_POST['filename_th']));
				//var_dump($EncodeFile);
			  fclose($FilePointer);
	  		$EncodeFile=chunk_split(base64_encode($EncodeFile));

				$dataSerach = array(
                            "id"=>@$_POST['doc_id1'],
                            "sourceCode"=>$_POST['ref_code'],
                            "displayTime"=>"",
                            "storyTime"=>"",
                            "headLine"=>$_POST['name_th'],
                            "description"=>"",
                            "story"=>$_POST['law_group_id'],
                            "category"=>$_POST['law_type_id'],
                            "disclaimer"=>"",
                );


				$cSerach = new serach();
				//var_dump(checkFileType($_POST['filename_th']));
				if($id>0){
					$_POST['doc_id1'] = $cSerach->editSerach($_POST['filename_th'],$dataSerach,'',checkFileType($_POST['filename_th']),1);
				}else{
					$_POST['doc_id1'] = $cSerach->addSerach($_POST['filename_th'],$dataSerach,'',checkFileType($_POST['filename_th']),1);
				}
			}

			// แนบไฟล์เอกสาร ภาษาอังกฤษ
			if($_FILES['filename_eng']['name'])
			{
				$target_dir = 'uploads/lawfile';
				if($rs->id){
					$rs->delete_file($rs->id,'uploads/lawfile','filename_eng');
				}
				$_POST['filename_eng'] = $rs->upload($_FILES['filename_eng'],'uploads/lawfile/');
				$_POST['ref_code'] = date('YmdHis');
				$FilePointer=fopen($target_dir.'/'.$_POST['filename_eng'], "r");
			    $EncodeFile=fread($FilePointer, filesize ($target_dir.'/'.$_POST['filename_eng']));
				//var_dump($EncodeFile);
			  fclose($FilePointer);
	  		$EncodeFile=chunk_split(base64_encode($EncodeFile));

				$dataSerach = array(
                            "id"=>@$_POST['doc_id2'],
                            "sourceCode"=>$_POST['ref_code'],
                            "displayTime"=>"",
                            "storyTime"=>"",
                            "headLine"=>$_POST['name_eng'],
                            "description"=>"",
                            "story"=>$_POST['law_group_id'],
                            "category"=>$_POST['law_type_id'],
                            "disclaimer"=>"",
                );

				//include 'include/class.serach.php';
				$cSerach = new serach();
				//var_dump(checkFileType($_POST['filename_th']));
				if($id>0){
					$_POST['doc_id2'] = $cSerach->editSerach($_POST['filename_eng'],$dataSerach,'',checkFileType($_POST['filename_eng']),1);
				}else{
					$_POST['doc_id2'] = $cSerach->addSerach($_POST['filename_eng'],$dataSerach,'',checkFileType($_POST['filename_eng']),1);
				}
			}

			$_POST['gazete_notice_date'] = Date2DB($_POST['gazete_notice_date']);
			$_POST['notic_date'] = Date2DB($_POST['notic_date']);
			$_POST['import_date'] = Date2DB($_POST['import_date']);
			$_POST['use_date'] = Date2DB($_POST['use_date']);
			
			if($id){
				$_POST['updated_user_id'] = user_login()->id;
				$_POST['updated_user_group_id'] = user_login()->user_group_id;
			}else{
				$_POST['created_user_id'] = user_login()->id;
				$_POST['created_user_group_id'] = user_login()->user_group_id;
			}

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
			if(@$_POST['ov_id']){
				// ลบข้อมูลเก่า หากมีการลบข้อมูลที่บันทึกไว้ก่อนหน้านั้น
				$ov_id_array = implode(", ", $_POST['ov_id']);
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id.' and id not in ( '.$ov_id_array.')')->delete('law_overlap_or_skips');
			}else{
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id)->delete('law_overlap_or_skips');
			}
			if(@$_POST['ov_sk_law']){
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
			if(@$_POST['version_id']){
				// ลบข้อมูลเก่า หากมีการลบข้อมูลที่บันทึกไว้ก่อนหน้านั้น
				$version_id_array = implode(", ", $_POST['version_id']);
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id.' and id not in ( '.$version_id_array.')')->delete('law_versions');
			}else{
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id)->delete('law_versions');
			}
			if(@$_POST['law_id_select']){
				foreach($_POST['law_id_select'] as $key=>$value){
					$law = new Law_version($_POST['version_id'][$key]);
					$law->law_id_select = $value;
					$law->version_type = $_POST['version_type'][$key];
					$law->version_txt = $_POST['version_txt'][$key];
					$law->version_filename = $_POST['version_filename'][$key];
					$law->law_datalaw_id = $law_datalaw_id;
					$law->save();
				}
			}

			// Option
			if(@$_POST['optioninlaw_id']){
				// ลบข้อมูลเก่า หากมีการลบข้อมูลที่บันทึกไว้ก่อนหน้านั้น
				$option_id_array = implode(", ", $_POST['optioninlaw_id']);
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id.' and id not in ( '.$option_id_array.')')->delete('law_optioninlaws');
				@$this->db->where('law_optioninlaw_id in ( '.$option_id_array.')')->delete('law_optionfiles');
			}else{
				// ลบทั้งหมด (law_optioninlaw และ law_optionfile)
				$o = new Law_optioninlaw();
				$optioninlaws = $o->where('law_datalaw_id', $law_datalaw_id)->get();
				foreach($optioninlaws as $optioninlaw){
					$optioninlaw->law_optionfile->delete_all();
				}
				@$this->db->where('law_datalaw_id = '.$law_datalaw_id)->delete('law_optioninlaws');
			}

			if(@$_POST['law_option_id']){
				foreach($_POST['law_option_id'] as $key=>$value){
					$law = new Law_optioninlaw($_POST['optioninlaw_id'][$key]);
					$law->law_option_id = $value;
					$law->option_name = $_POST['option_name'][$key];
					$law->option_source = $_POST['option_source'][$key];
					$law->option_year = $_POST['option_year'][$key];
					$law->law_datalaw_id = $law_datalaw_id;
					$law->save();

					// หา max id ของ law_optioninlaw
					if(@$_POST['optioninlaw_id'][$key]){
						$law_optioninlaw_id = $_POST['optioninlaw_id'][$key];
					}else{
						$row = $this->db->query('SELECT MAX(id) AS maxid FROM law_optioninlaws')->row();
						if ($row) {
						    $law_optioninlaw_id = $row->maxid;
						}
					}

					// multiupload optionfile
					if(@$_POST['op_filename_'.$key] != ""){
						foreach($_POST['op_filename_'.$key] as $key2=>$item){
							$op = new Law_optionfile();
							$op->op_filename = $item;
							$op->op_text = $_POST['op_text_'.$key][$key2];
							$op->law_optioninlaw_id = $law_optioninlaw_id;
							$op->save();
						}
					}
				}
			}


			set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
		}
		// redirect($_SERVER['HTTP_REFERER']);
		redirect('admin/law_datalaws');
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
