<?php
class User_group extends ORM
{
	public $table = "user_groups";
	
	public $has_many = array('sys_user');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
