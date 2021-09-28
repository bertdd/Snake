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

    public function OnSnake(Point $point)
    {
        return $this->IsSnake($point->X, $point->Y);
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

    public function Move(Point $to)
    {
        if ($this->ExtendSegment($to))
        {
            $this->Segments[0]->SetStart($to);
        }
        else
        {
            $this->NewSegment($to);
        }
        $lastSegment = end($this->Segments);
        $lastSegment->Shrink();
        if ($lastSegment->Length() == 0)
        {
            unset($this->Segments[count($this->Segments) - 1]);
        }
    }

    public function IsHead(int $x, int $y)
    {
        $head = $this->Head();
        return $head->X == $x && $head->Y == $y;
    }

    public function Head() : Point
    {
        return $this->Segments[0]->start;
    }

    private function NewSegment(Point $to)
    {
        for ($i = count($this->Segments) - 1;  $i >= 0; $i--)
        {
            $this->Segments[$i + 1] = $this->Segments[$i];
        }
        $this->Segments[0] = new Segment($to, $this->Head());
    }

    private function ExtendSegment(Point $to) : bool
    {
        $firstSegment = $this->Segments[0];
        return ($firstSegment->IsVertical()) ?
            $to->X == $firstSegment->start->X :
            $to->Y == $firstSegment->start->Y;
    }

    private array $Segments = [];
}