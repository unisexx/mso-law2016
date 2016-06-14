<?php
class Admin_Controller extends Master_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		ini_set("memory_limit","512M");	
		
		// check login
		if(user_login()->id == "") redirect('admin');
		
		$this->template->set_theme('admin');
		
		// Set layout
		$this->template->set_layout('layout');
		
		// Load Langauge
		$this->lang->load('admin');
		
		// Set Default Language
		$this->session->set_userdata('lang','th');
		
		// Set js
		$this->template->append_metadata(js_notify());
	}
	
}
?>