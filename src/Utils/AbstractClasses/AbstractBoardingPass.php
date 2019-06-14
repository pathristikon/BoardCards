<?php

namespace App\Utils\AbstractClasses;

use App\Utils\Interfaces\BoardingPassInterface;
use App\Utils\Cards;

abstract class AbstractBoardingPass implements BoardingPassInterface
{
    private $destination;
    private $departure;
    private $type;
    private $requirements;

    public function __construct($card)
    {
        $this->requirements = Cards::$requirements;
        $this->checkingCardRequirements($card);

        $this->destination = $card['arrival'];
        $this->departure   = $card['departure'];
        $this->type        = $card['type'];
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getDeparture(): string
    {
        return $this->departure;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getReturnString(): string
    {
        return 'Take the ' . $this->type . ' from ' . $this->departure . 'blablabla';
    }

    private function checkingCardRequirements($card)
    {
        $cardKeys = array_keys($card);

        if(!empty(array_diff($this->requirements, $cardKeys)))
        {
            echo 'Missing structure error!';
            exit;
        }
    }
}