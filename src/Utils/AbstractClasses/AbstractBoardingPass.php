<?php

namespace App\Utils\AbstractClasses;

use App\Utils\Interfaces\BoardingPassInterface;
use App\Utils\Cards;
use App\Utils\Traits;

abstract class AbstractBoardingPass implements BoardingPassInterface
{
    use Traits;

    private $destination;
    private $departure;
    private $sit;
    private $type;
    private $requirements;
    public  $output;

    public function __construct($card)
    {
        $this->requirements = Cards::$requirements;
        $this->checkingCardRequirements($card);

        $this->destination = $card['arrival'];
        $this->departure   = $card['departure'];
        $this->sit   = $card['sit'];
        $this->type        = $card['type'];

        $this->output = 'Take ' . $this->type .
            ' from ' . $this->departure .
            ' to ' . $this->destination .
            '. Sit in seat ' . $this->sit;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getDeparture(): string
    {
        return $this->departure;
    }

    public function getSit(): string
    {
        return $this->sit;
    }

    public function getType(): string
    {
        return $this->type;
    }

    private function checkingCardRequirements($card)
    {
        $cardKeys = array_keys($card);

        if(!empty(array_diff($this->requirements, $cardKeys)))
        {
            $this->returnResponse([
               'status' => 500,
               'message' =>  'Missing structure error!'
            ]);

            exit;
        }
    }
}