<?php
class Law_types extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index($id)
	{
		$data['rs'] = new Law_datalaw($id);
		if(@$_GET['law_maintype_id']){$data['rs']->where('type_id = '.$_GET['law_maintype_id']);}
		if(@$_GET['law_submaintype_id']){$data['rs']->where('subtype_id = '.$_GET['law_submaintype_id']);}
		$data['rs']->order_by('id','desc')->get_page();
		
		$this->template->build('index',$data);
	}
	
}
?>
