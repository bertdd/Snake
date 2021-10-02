<?php

class Point
{
    public function __construct(int $x, int $y)
    {
        $this->X = $x;
        $this->Y = $y;
    }

    public function __toString() : string
    {
        return "($this->X , $this->Y)";
    }

    public function Equals(Point $point)
    {
        return $this->X == $point->X && $this->Y == $point->Y;
    }

    public function Add(Vector $vector) : Point
    {
        return new Point($this->X + $vector->X, $this->Y + $vector->Y);
    }

    public int $X;

    public int $Y;
}

?>