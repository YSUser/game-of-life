<?php

class Cell
{
	//	Alive = 1
	//	Dead = 0
	private $attribute = 0;
	
	public function __construct($state)
	{
		$this -> attribute = $state;
	}
	
	public function __invoke()
	{
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
}

?>