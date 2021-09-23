<?php

require('Segment.php');

class Snake
{
    function Add(Segment $segment)
    {
        $this->Segments[] = $segment; 
    }

    function __toString() : string
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

    private array $Segments = [];
}