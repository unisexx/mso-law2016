<?php
class Law_submaintype extends ORM
{
	public $table = "law_submaintypes";
	
	public $has_one = array('law_maintype');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
