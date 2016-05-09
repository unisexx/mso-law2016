<?php
class Law_datalaw extends ORM
{
	public $table = "law_datalaws";
	
	public $has_one = array('law_group','law_type');
	
	public $has_many = array('law_link_privilege','law_overlap_or_skip','law_version','law_optioninlaw');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
