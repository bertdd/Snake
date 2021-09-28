<link rel="stylesheet" href="snake.css" />
<?php

require('world.php');
require('buttons.php');

// we need to start the session after the objects were defined (after the requires)
session_start();

// use the world from the session or create a new one i'f we do not have one yet
$world = isset($_SESSION["world"]) ?  $_SESSION["world"] :  new World(50, 50);
$_SESSION["world"] = $world;

// move the snake dependent on the direction..
if (isset($_GET["dir"]))
{
    $world->MoveSnake($_GET["dir"]);
}

// show the world with the snake
$world->Render();

// show the buttons
$buttons = new Buttons();
$buttons->Render();
?>
