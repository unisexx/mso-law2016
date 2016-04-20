<?php
class Law_committee_type extends ORM
{
	public $table = "law_committee_types";
	
	public $has_many = array('law_committee');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
