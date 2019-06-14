<?php

namespace App\Utils\AbstractClasses;

use App\Utils\Interfaces\BoardingPassInterface;
use App\Utils\Interfaces\RequiredInputInterface;
use App\Utils\Traits;


abstract class AbstractBoardingPass implements BoardingPassInterface
{
    use Traits;

    public $destination;
    public $departure;
    public $sit;
    public $type;
    private $requirements;
    public  $output;

    public function __construct($card)
    {
        $this->requirements = RequiredInputInterface::class;
        $this->checkingCardRequirements($card);

        $this->destination = $card['arrival'];
        $this->departure   = $card['departure'];
        $this->sit         = $card['sit'];
        $this->type        = $card['tp'];
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

    public static function getClassName()
    {
        return __CLASS__;
    }

    private function checkingCardRequirements($card)
    {
        $cardKeys = array_keys($card);

        foreach($cardKeys as $key)
        {
            $const = "$this->requirements::required_" . $key;
            if(!defined($const))
            {
                $this->returnResponse([
                    'status' => 500,
                    'message' =>  'Missing structure error!'
                ]);

                exit;
            }
        }
    }
}