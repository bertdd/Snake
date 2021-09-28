<?php


class Vector
{
    public function __construct(int $x, int $y)
    {
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