<?php
class Law_answer extends ORM
{
	public $table = "law_answers";

	public $has_one = array('law_quiz');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
