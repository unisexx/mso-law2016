<?php
class User_groups extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['rs'] = new User_group();
		if(@$_GET['search']){
			$data['rs']->where('name LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('lastname LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('username LIKE "%'.$_GET['search'].'%"');
			$data['rs']->or_where('email LIKE "%'.$_GET['search'].'%"');
		}
		
		$data['rs']->order_by('id','desc')->get_page();
		// $data['rs']->check_last_query();
		$this->template->build('user_groups/index',$data);
	}
}
?>