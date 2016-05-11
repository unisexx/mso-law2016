<?php
class Law_optioninlaw extends ORM
{
	public $table = "law_optioninlaws";
	
	public $has_one = array('law_datalaw','law_option');
	
	public $has_many = array('law_optionfile');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
