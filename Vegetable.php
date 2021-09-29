<?php

require_once ('Point.php');

class Vegetable
{
    public function __construct(string $name, int $score, Point $location)
    {
        $this->name = $name;
        $this->score = $score;
        $this->location = $location;
    }

    public string $name;

    public int $points;

    public Point $location;
}