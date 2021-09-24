<link rel="stylesheet" href="snake.css" />
<?php

require('snake.php');
require('world.php');

$snake = new Snake();
$snake->Add(new Segment(new Point(7,16), new Point(7,30)));
$snake->Add(new Segment(new Point(7, 30), new Point(45, 30)));
$snake->Add(new Segment(new Point(45, 30), new Point(45, 5)));

$world = new World(50, 50, $snake);
$world->Render();

?>

