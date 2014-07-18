<?php

require 'world.php';

$rows = 20;
$columns = 20;

class Game
{
	private $game;
	
	public function __construct($rows, $columns)
	{
		$this -> game = new World($rows, $columns);
	}
	
	public function tick($generation)
	{
		 
	}
}

?>