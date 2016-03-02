<?php
class Sys_user extends ORM
{
	public $table = "sys_users";
	
	public $has_one = array('user_group','user_premission');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
