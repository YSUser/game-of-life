<?php

require 'game.php';

$game = new World(100, 100);
$world = $game -> world;
$image = imagecreatetruecolor(200, 200);
$green = imagecolorallocate($image, 0, 255, 0);
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);
imagefill($image, 0, 0, $green);

$blocks = array();

for ($i = 0; $i < 100; $i++)
{
	for ($j = 0; $j < 100; $j++)
	{
		if ($world[$i][$j] -> getAttribute())
		{
			imagefilledrectangle($image, $i*2, $j*2, $i*2+1, $j*2+1, $black);
		}
	}
}

header('Content-Type: image/gif');
imagegif($image);
imagedestroy($image);


?>