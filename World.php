<?php

require_once('snakeException.php');
require_once('snake.php');
require_once('vector.php');
require_once('vegetable.php');

class World
{
    public function __construct (int $width, int $height)
    {
        if ($width < 0 || $height < 0)
        {
            throw new SnakeException("illegal dimensions for world");
        }

        $this->width = $width;
        $this->height = $height;
        $this->snake = $this->InitialSnake();

        for ($i = 0; $i < 10; $i++)
        {
            $this->vegetables[] = new Vegetable("chives", 2,
                new Point(rand(0, $width - 1), rand(0, $height - 1)));
        }
    }

    private function RenderCell(Point $point) : string
    {
        $snake = $this->snake;
        $style = $snake->IsSnake($point) ?
            $snake->IsHead($point) ? "cell snake head" : "cell snake" :
            ($this->IsVegetable($point) ? "cell vegie" : "cell");
        return "<td class='$style'/>";
    }

    public function Render()
    {
        echo "<table cellspacing='0'>";
        for ($y = 0; $y < $this->height; $y++)
        {
            echo '<tr>';
            for ($x = 0; $x < $this->width; $x++)
            {
                echo $this->RenderCell(new Point($x, $y));
            }
            echo '</tr>';
        }
    }

    private function OnWorld(Point $point) : bool
    {
        return $point->X >= 0 && $point->X <= $this->width &&
               $point->Y >= 0 && $point->Y <= $this->height;
    }

    public function MoveSnake(string $direction)
    {
        $vector = $this->GetVector($direction);
        $snake = $this->snake;
        $head = $this->snake->Head();
        $newhead = $head->Add($vector);
        if ($this->OnWorld($newhead) && !$this->snake->IsSnake($newhead))
        {
            if ($this->IsVegetable($newhead))
            {

            }
            $snake->Move($newhead);
        }
    }

    private function InitialSnake() : Snake
    {
        $snake = new Snake();

        $snake->Add(new Segment(new Point(7,16), new Point(7,30)));
        $snake->Add(new Segment(new Point(7, 30), new Point(45, 30)));
        $snake->Add(new Segment(new Point(45, 30), new Point(45, 5)));
        return $snake;
    }

    private function GetVector(string $direction) : Vector
    {
        return [
            "UP" => new Vector(0, -1),
            "RIGHT" => new Vector(1, 0),
            "DOWN" => new Vector(0, 1),
            "LEFT" => new Vector(-1, 0)
           ][$direction];
    }

    private function IsVegetable(Point $point)
    {
        foreach ($this->vegetables as $vegetable)
        {
            if ($vegetable->location->Equals($point))
            {
                return true;
            }
        }
        return false;
    }

    private int $width;

    private int $height;

    private Snake $snake;

    private array $vegetables;
}

?>