<?php
class Law_datalaw extends ORM
{
	public $table = "law_datalaws";
	
	public $has_one = array('law_group','law_type');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
