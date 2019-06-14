<?php

namespace App\Utils\BoardingPasses;

use App\Utils\AbstractClasses\AbstractBoardingPass;

class Boat extends AbstractBoardingPass
{
    public function __construct($val)
    {
        parent::__construct($val);
    }
}