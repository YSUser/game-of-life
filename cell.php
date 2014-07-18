<?php

class Cell
{
	//	Alive = TRUE
	//	Dead = FALSE
	private $attribute = FALSE;
	
	public function __construct()
	{
		//	Generate random attribute
		$this -> setAttribute($this -> random());
		
		return $this -> attribute;
	}
	
	public function setAttribute($attribute)
	{
		$this -> attribute = $attribute;
	}
	
	public function getAttribute()
	{
		return $this -> attribute;
	}
	
	private function random()
	{
		//	check other random functions for benchmarking
		return (bool)rand(0,1);
	}
}

?>