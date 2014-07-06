<?php

require 'cell.php';

class World
{
	private $world = array();
	
	public function generate($rows, $columns)
	{
		for ($r = 0; $r < $rows; $r++)
		{
			for ($c = 0; $c < $rows; $c++)
			{
				$this -> world[$r][$c] = new Cell;
			}
		}
	}	
}

?>