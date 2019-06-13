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
        $this->destination = $card['arrival'];
        $this->departure   = $card['departure'];
        $this->requirements = Cards::$requirements;

        $this->checkingCardRequirements($card, $this->requirements);
    }

    public function getDestination()
    {
        return $this->destination;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    private function checkingCardRequirements($card, $requirements)
    {
        $cardKeys = array_keys($card);

        foreach($cardKeys as $key => $value)
        {
           if(!in_array($value, $requirements))
           {
               // TODO: output class instead of exception handling
               throw new \Exception('Missing required key ' . $value);
           }
        }
    }
}