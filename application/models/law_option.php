<?php
class Law_option extends ORM
{
	public $table = "law_options";
	
	public $has_many = array('law_optioninlaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
