<?php
class Public_Controller extends Master_Controller
{
	function __construct()
	{
		parent::__construct();

		ini_set("memory_limit","512M");	
		
		// check login
		// if(!is_login('Administrator')) redirect('users/admin/auth/login');
		
		$this->template->set_theme('law');
		
		// Set layout
		$this->template->set_layout('layout');
		
		// Set Default Language
		$this->session->set_userdata('lang','th');
		
		// Set js
		$this->template->append_metadata(js_notify());
	}
}
?>
