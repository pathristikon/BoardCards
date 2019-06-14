<?php

namespace App\Utils;

class Cards
{
    static $types = [
      'Plane' => BoardingPasses\Plane::class,
      'Boat'  => BoardingPasses\Boat::class
    ];

    static $requirements = [
      'arrival',
      'departure',
      'type'
    ];
}