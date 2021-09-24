<?php

require_once('snakeException.php');

class World
{
    public function __construct (int $width, int $height, Snake $snake)
    {
        if ($width < 0 || $height < 0)
        {
            throw new SnakeException("illegal dimensions for world");
        }
        $this->width = $width;
        $this->height = $height;
        $this->snake = $snake;
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

    private int $width;

    private int $height;

    private Snake $snake;
}

?>