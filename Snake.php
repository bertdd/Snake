<?php

require('Segment.php');

class Snake
{
    public function Add(Segment $segment)
    {
        $this->Segments[] = $segment;
    }

    public function __toString() : string
    {
        $result = "";
        $first = true;
        foreach ($this->Segments as $segment)
        {
            $result .= (($first ? "" : " <-> ") . $segment);
            $first = false;
        }

        return $result;
    }

    public function IsSnake(int $x, int $y) : bool
    {
        foreach ($this->Segments as $segment)
        {
            if ($segment->IsSnake($x, $y))
            {
                return true;
            }
        }
        return false;
    }

    public function Up()
    {

    }

    function Head() : Point
    {
        return $this->Segments[0]->start;
    }

    private array $Segments = [];
}