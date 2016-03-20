<?php
class Weblinks extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Weblink();
		$data['rs']->order_by('id','asc')->get_page();
		$this->template->build('index',$data);
	}
}
?>
