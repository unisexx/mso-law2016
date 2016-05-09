<?php
class Law_version extends ORM
{
	public $table = "law_versions";
	
	public $has_one = array('law_datalaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
