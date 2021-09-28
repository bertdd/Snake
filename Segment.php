<?php

require_once('point.php');
require_once('snakeException.php');

class Segment
{
    public function __construct (Point $start, Point $end)
    {
        $this->start = $start;
        $this->startX = min($start->X, $end->X);
        $this->endX = max($start->X, $end->X);
        $this->startY = min($start->Y, $end->Y);
        $this->endY = max($start->Y, $end->Y);

        if (!($this->IsHorizontal() || $this->IsVertical()))
        {
            throw new SnakeException("Segment must be horizontal or vertical");
        }
    }

    public function IsVertical() : bool
    {
        return $this->startX == $this->endX;
    }

    public function IsHorizontal() : bool
    {
        return $this->startY == $this->endY;
    }

    public function IsSnake(int $x, int $y)
    {
        return
            ($y == $this->startY && $x >= $this->startX && $x <= $this->endX)
               ||
            ($x == $this->startX && $y >= $this->startY && $y <= $this->endY);
    }

    private int $startX;

    private int $endX;

    private int $startY;

    private int $endY;

    public Point $start;
}