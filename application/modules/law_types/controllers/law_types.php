<?php
class Law_types extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index($id)
	{
		$data['rs'] = new Law_type($id);
		
		$data['laws'] = new Law_datalaw();
		if(@$_GET['law_maintype_id']){$data['laws']->where('type_id = '.$_GET['law_maintype_id']);}
		if(@$_GET['law_submaintype_id']){$data['laws']->where('subtype_id = '.$_GET['law_submaintype_id']);}
		$data['laws']->where('law_type_id = '.$id);
		$data['laws']->order_by('id','desc')->get_page();
		
		$this->template->build('index',$data);
	}
	
}
?>
