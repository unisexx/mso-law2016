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
		// $data['rs']->check_last_query();
		$this->load->view('inc_lawtype',$data);
	}
	
	function inc_poll(){
		$sql = "SELECT
					score,
					count(score) AS total,
					FORMAT(count(score) / t.cnt * 100,2) AS `percentage`
				FROM
					law_polls
				CROSS
				  JOIN (SELECT COUNT(score) AS cnt FROM law_polls) t
				GROUP BY
					score
				ORDER BY score DESC";
		$data['rs'] = $this->db->query($sql)->result();
		$this->load->view('inc_poll',$data);
	}
	
	function inc_group_list(){
		 // function นี้เหมือนก้อบมาจาก law/group_list
		$data['laws'] = new Law_datalaw();
		if(@$_GET['law_group_id']){$data['laws']->where('law_group_id = '.$_GET['law_group_id']);}
		if(@$_GET['law_type_id']){$data['laws']->where('law_type_id = '.$_GET['law_type_id']);}
		$data['laws']->where("law_maintype_id not in ('2', '5')");
		$data['laws']->where('apply_power_id is not null');
		$data['laws']->order_by('law_maintype_id','asc')->order_by('law_submaintype_id','asc')->order_by('name_th','asc')->get(10);
		$this->load->view('inc_group_list',$data);
	}

	function info(){
		// phpinfo();
	}
}
?>
