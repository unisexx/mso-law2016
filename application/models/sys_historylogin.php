<?php
class Sys_historylogin extends ORM
{
	public $table = "sys_historylogins";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
