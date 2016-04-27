<?php
class Law_overlap_or_skip extends ORM
{
	public $table = "law_overlap_or_skips";
	
	public $has_one = array('law_datalaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
