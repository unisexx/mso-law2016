<?php
class Law_group extends ORM
{
	public $table = "law_groups";
	
	public $has_many = array('law_type','law_datalaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
