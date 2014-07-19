<?php

require 'cell.php';

class World
{
	private $world = array();
	private $future = array();
	
	private $columns;
	private $rows;
	
	public function __construct($rows, $columns)
	{
		$this -> initialize($rows, $columns);
	}
	
	private function initialize($rows, $columns)
	{
		$this -> columns = $columns;
		$this -> rows = $rows;
		
		for ($r = 0; $r < $rows; $r++)
		{
			for ($c = 0; $c < $columns; $c++)
			{
				$this -> world[$r][$c] = new Cell(mt_rand(0, 1));
			}
		}
	}
	
	public function getState()
	{
		if (!empty($this -> future))
			return $this -> future;
		else
			return $this -> world;
	}
	
	public function generation($state)
	{
		 $world = $state;
		 $rows = $this -> rows;
		 $columns = $this -> columns;
		 
		 for ($r = 0; $r < $rows; $r++)
		 {
			 for ($c = 0; $c < $columns; $c++)
			 {
			 	$neighbours = 0;
				
			 	//	North West
			 	if ($r > 0 && $c > 0)
					$neighbours += $world[$c - 1][$r - 1]();
			 	//	North East
			 	if ($r > 0 && $c < $columns - 1)
					$neighbours += $world[$c + 1][$r - 1]();
			 	//	South West
			 	if ($r < $rows - 1 && $c > 0)
					$neighbours += $world[$c - 1][$r + 1]();
			 	//	South East
			 	if ($r < $rows - 1 && $c < $columns - 1)
					$neighbours += $world[$c + 1][$r + 1]();
			 	// North
			 	if ($r > 0)
					$neighbours += $world[$c][$r - 1]();
			 	//	South
			 	if ($r < $rows - 1)
					$neighbours += $world[$c][$r + 1]();
			 	//	East
			 	if ($c < $columns - 1)
					$neighbours += $world[$c + 1][$r]();
			 	//	West
			 	if ($c > 0)
					$neighbours += $world[$c - 1][$r]();

				//	Game Rules
				if ($world[$c][$r]() == 1)
				{
					if ($neighbours == 2 || $neighbours == 3)
					{
						$this -> future[$c][$r] = new Cell(1);
					}
					else
					{
						$this -> future[$c][$r] = new Cell(0);
					}
				}
				else
				{
					if ($neighbours == 3)
					{
						$this -> future[$c][$r] = new Cell(1);
					}
					else
					{
						$this -> future[$c][$r] = new Cell(0);
					}
				}
			 }
		 }
		 //	Return new state
		 return $this -> future;
	}
	
}

?>