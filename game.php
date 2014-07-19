<?php

require 'world.php';

class Game
{
	private $background;
	private $cell;
	private $image;
	
	private $rows;
	private $columns;
	private $game;
	
	public function __construct($rows, $columns, $generations)
	{
		$this -> initialize($rows, $columns);
		$this -> tick($generations);
	}
	
	private function initialize($rows, $columns)
	{
		$this -> columns = $columns;
		$this -> rows = $rows;
		$this -> game = new World($rows, $columns);
	}
	
	private function createImage($rows, $columns)
	{
		$this -> image = imagecreate($columns * 2, $rows * 2);
		$this -> background = imagecolorallocate($this -> image, 0, 255, 0);
		$this -> cell = imagecolorallocate($this -> image, 0, 0, 0);
	}
	
	private function tick($generations)
	{
		$rows = $this -> rows;
		$columns = $this -> columns;
		
		//	Number of game generations
		for ($i = 0; $i < $generations; $i++)
		{
			//	Create new image
			$this -> createImage($rows, $columns);
			//	Tick
			$state = $this -> game -> getState();
			$world = $this -> game -> generation($state);
			
			for ($r = 0; $r < $rows; $r++)
			{
				for ($c = 0; $c < $columns; $c++)
				{
					if ($world[$c][$r]() == 1)
					{
						imagefilledrectangle($this -> image, $r * 2, $c * 2, $r * 2 + 1, $c * 2 + 1, $this -> cell);
					}
				}
			}
			
			//	Save and destroy image
			imagegif($this -> image, 'img' . $i . '.gif');
			imagedestroy($this -> image);
		}
	}
}

$game = new Game(100, 100, 10);

?>