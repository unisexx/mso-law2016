<?php
class Law_plans extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new Law_plan();
		$data['rs']->order_by('plan_year','desc')->get_page();
		$this->template->build('index',$data);
	}
}
?>
