<link rel="stylesheet" href="snake.css" />
<?php

require('world.php');
require('buttons.php');

$world = !isset($_SESSION["world"]) ?
   $_SESSION["world"] = new World(50, 50) : $_SESSION["world"];

$buttons = new Buttons();

if (isset($_GET["dir"]))
{
    $world->MoveSnake($_GET["dir"]);
}

$world->Render();
$buttons->Render();

?>
