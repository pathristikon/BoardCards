<?php

namespace App\Utils;

class Cards
{
    static $types = [
      'Plane' => BoardingPasses\Plane::class
    ];

    static $requirements = [
      'arrival',
      'departure',
      'type'
    ];
}