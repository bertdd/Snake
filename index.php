<?php

require('snake.php');

$snake = new Snake();
$snake->Add(new Segment(new Point(7,16), new Point(7,30)));
$snake->Add(new Segment(new Point(7, 30), new Point(45, 30)));

echo $snake;

?>

