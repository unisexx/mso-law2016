<?php
class Law_quiz extends ORM
{
	public $table = "law_quizs";

	public $has_many = array('law_answer');

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
