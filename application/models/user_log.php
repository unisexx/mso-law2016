<?php
class User_log extends ORM
{
	public $table = "user_logs";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
