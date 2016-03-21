<?php
class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->template->set_layout('home');
		$this->template->build('index');
	}

	public function lang($lang)
	{
		$this->load->library('user_agent');
		$this->session->set_userdata('lang',$lang);

		redirect($this->agent->referrer());
	}

	function inc_newlaw(){
		$data['rs'] = new Law_datalaw();
		$data['rs']->order_by('id','desc')->get(5);
		$this->load->view('inc_newlaw',$data);
	}

	function inc_lawtype(){
		$data['rs'] = new Law_type();
		$data['rs']->where('law_group_id = 1');
		$data['rs']->order_by('id','asc')->get();
		$this->load->view('inc_lawtype',$data);
	}
	
	function info(){
		// phpinfo();
	}
}
?>
