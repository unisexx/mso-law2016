<?php
class Law_committee extends ORM
{
	public $table = "law_committees";
	
	public $has_one = array('law_committee_type');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
