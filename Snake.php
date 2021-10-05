<?php

require('Segment.php');

class Snake
{
    public function __construct(array $segments)
    {
        foreach ($segments as $segment)
        {
            $this->Segments[] = $segment;
        }
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

    public function IsSnake(Point $point) : bool
    {
        foreach ($this->Segments as $segment)
        {
            if ($segment->IsSnake($point))
            {
                return true;
            }
        }
        return false;
    }

    public function Move(Point $newHead)
    {
        // Set a new starting point if we can extend the segment, if not create a new segment.
        if ($this->CanSegmentBeExtended($newHead))
        {
            $this->Segments[0]->SetStart($newHead);
        }
        else
        {
            $this->NewSegment($newHead);
        }

        // Shrink the last segment
        $lastSegment = end($this->Segments);
        $lastSegment->Shrink();

        // Remove the last segment if its size hase become insignificant
        if ($lastSegment->Length() == 0)
        {
            unset($this->Segments[count($this->Segments) - 1]);
        }
    }

    public function IsHead(Point $point)
    {
        $head = $this->Head();
        return $head->X == $point->X && $head->Y == $point->Y;
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

    private function CanSegmentBeExtended(Point $to) : bool
    {
        $firstSegment = $this->Segments[0];
        return ($firstSegment->IsVertical()) ?
            $to->X == $firstSegment->start->X :
            $to->Y == $firstSegment->start->Y;
    }

    private array $Segments = [];
}