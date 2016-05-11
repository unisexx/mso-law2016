<?php
class Law_optionfile extends ORM
{
	public $table = "law_optionfiles";
	
	public $has_one = array('law_optioninlaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
