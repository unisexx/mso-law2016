<?php
class Law_link_privilege extends ORM
{
	public $table = "law_link_privileges";
	
	public $has_one = array('law_privilege','law_datalaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
