<?php

require('point.php');
require('snakeException.php');

class Segment
{
    public function __construct (Point $start, Point $end)
    {
        $this->start = $start;
        $this->end = $end;

        if (!($this->IsHorizontal() || $this->IsVertical()))
        {
            throw new SnakeException("Segment must be horizontal or vertical");
        }
    }

    public function __toString() : string
    {
        return $this->start . ' - ' . $this->end;
    }

    public function IsVertical() : bool
    {
        return $this->start->X == $this->end->X;
    }

    public function IsHorizontal() : bool
    {
        return $this->start->Y == $this->end->Y;
    }

    public Point $start;

    public Point $end;
}