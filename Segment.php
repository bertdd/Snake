<?php

require_once('point.php');
require_once('snakeException.php');

class Segment
{
    public function __construct (Point $start, Point $end)
    {
        $this->start = $start;
        $this->end = $end;
        $this->ComputeRange();

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

    public function SetStart(Point $start)
    {
        $this->start = $start;
        $this->ComputeRange();
    }

    public function Length() : int
    {
        return abs($this->IsHorizontal() ? $this->startX - $this->endX : $this->startY - $this->endY);
    }

    public function Shrink()
    {
        if ($this->IsHorizontal())
        {
            $x = $this->end->X > $this->start->X ? $this->end->X - 1 : $this->end->X + 1;
            $this->end = new Point($x, $this->end->Y);
        }
        else
        {
            $y = $this->end->Y > $this->start->Y ? $this->end->Y - 1 : $this->end->Y + 1;
            $this->end = new Point($this->end->X, $y);
        }
        $this->ComputeRange();
    }

    private function ComputeRange()
    {
        $this->startX = min($this->start->X, $this->end->X);
        $this->endX = max($this->start->X, $this->end->X);
        $this->startY = min($this->start->Y, $this->end->Y);
        $this->endY = max($this->start->Y, $this->end->Y);
    }

    private int $startX;

    private int $endX;

    private int $startY;

    private int $endY;

    public Point $start;

    private Point $end;
}