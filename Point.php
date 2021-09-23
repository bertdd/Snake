<?php

class Point
{
    public function __construct(int $x, int $y)
    {
        if ($x < 0 || $y < 0)
        {
            throw new Exception ("Invalid Coordinate ");
        }
        $this->X = $x;
        $this->Y = $y;
    }

    public function __toString() : string
    {
        return sprintf("(%d , %d)", $this->X, $this->Y);
    }

    public int $X;

    public int $Y;
}

?>