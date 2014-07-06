<?php

require 'world.php';

class Game
{
	//	add game constants
	private $game;
	
	public function begin()
	{
		$this -> game = new World;
		$this -> game -> generate(20, 20);
	}
}

$test = new Game;
$test -> begin();
?>