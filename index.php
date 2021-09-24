<link rel="stylesheet" href="snake.css" />
<?php
use function CommonMark\Render;

require('snake.php');
require('world.php');
require('buttons.php');

function InitialSnake() : Snake
{
    $snake = new Snake();

    $snake->Add(new Segment(new Point(7,16), new Point(7,30)));
    $snake->Add(new Segment(new Point(7, 30), new Point(45, 30)));
    $snake->Add(new Segment(new Point(45, 30), new Point(45, 5)));
    return $snake;
}

$world = new World(50, 50, InitialSnake());
$buttons = new Buttons();

$world->Render();
$buttons->Render();

?>
