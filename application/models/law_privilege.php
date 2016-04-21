<?php
class Law_privilege extends ORM
{
	public $table = "law_privileges";
	
	public $has_many = array('law_link_privilege');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
