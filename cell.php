<?php

class Cell
{
	//	Alive = TRUE
	//	Dead = FALSE
	public $attribute = FALSE;
	
	public function __construct()
	{
		//	Generate random attribute
		$this -> setAttribute($this -> random());
	}
	
	public function setAttribute($attribute)
	{
		$this -> attribute = $attribute;
	}
	
	private function random()
	{
		//	check other random functions for benchmarking
		return (bool)rand(0,1);
	}
}

?>