<?php

namespace App\Utils\AbstractClasses;

use App\Utils\Interfaces\BoardingPassInterface;
use App\Utils\Cards;

abstract class AbstractBoardingPass implements BoardingPassInterface
{
    private $destination;
    private $departure;
    private $requirements;

    public function __construct($card)
    {
        $this->requirements = Cards::$requirements;
        $this->checkingCardRequirements($card);

        $this->destination  = $card['arrival'];
        $this->departure    = $card['departure'];
    }

    public function getDestination()
    {
        return $this->destination;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    private function checkingCardRequirements($card)
    {
        $cardKeys = array_keys($card);

        if(!empty(array_diff($this->requirements, $cardKeys)))
        {
            echo 'Error!';
            exit;
        }
    }
}