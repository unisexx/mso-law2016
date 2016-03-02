<?php
class User_premission extends ORM
{
	public $table = "user_premissions";
	
	public $has_many = array('sys_user');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
