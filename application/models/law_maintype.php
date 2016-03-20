<?php
class Law_maintype extends ORM
{
	public $table = "law_maintypes";
	
	public $has_many = array('law_submaintype');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
