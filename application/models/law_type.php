<?php
class Law_type extends ORM
{
	public $table = "law_types";
	
	public $has_one = array('law_group');
	
	public $has_many = array('law_datalaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
