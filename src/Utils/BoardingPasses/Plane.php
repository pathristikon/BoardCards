<?php

namespace App\Utils\BoardingPasses;

use App\Utils\AbstractClasses\AbstractBoardingPass;

class Plane extends AbstractBoardingPass
{
    public function __construct($val)
    {
        parent::__construct($val);

        $this->output = <<<EOF
Take $this->type from $this->departure to $this->destination. Sit in seat $this->sit
EOF;
    }
}