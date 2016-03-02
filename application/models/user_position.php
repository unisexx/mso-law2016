<?php
class User_position extends ORM
{
	public $table = "user_positions";

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>
