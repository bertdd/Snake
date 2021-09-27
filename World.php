<?php

require_once('snakeException.php');
require_once('point.php');

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
    }

    public function RenderCell(int $x, int $y) : string
    {
        $style = $this->snake->IsSnake($x, $y) ? "cell snake" : "cell";
        return "<td class='" . $style . "'/>";
    }

    public function Render()
    {
        echo "<table cellspacing='0'>";
        for ($y = 0; $y < $this->height; $y++)
        {
            echo '<tr>';
            for ($x = 0; $x < $this->width; $x++)
            {
                echo $this->RenderCell($x, $y);
            }
            echo '</tr>';
        }
    }

    public function CoordinatesOnWorld(int $x, int $y) : bool
    {
        return $x >= 0 && $y >= 0 && $x < $this->width && $y <= $this->height;
    }

    public function OnWorld(Point $point) : bool
    {
        return $this->CoordinatesOnWorld($point->X, $point->Y);
    }

    private function InitialSnake() : Snake
    {
        $snake = new Snake();

        $snake->Add(new Segment(new Point(7,16), new Point(7,30)));
        $snake->Add(new Segment(new Point(7, 30), new Point(45, 30)));
        $snake->Add(new Segment(new Point(45, 30), new Point(45, 5)));
        return $snake;
    }

    private int $width;

    private int $height;

    private Snake $snake;
}

?>