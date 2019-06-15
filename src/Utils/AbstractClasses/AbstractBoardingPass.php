<?php

namespace App\Utils\AbstractClasses;

use App\Utils\Interfaces\BoardingPassInterface;
use App\Utils\Interfaces\RequiredInputInterface;
use App\Utils\Traits;

/**
 * Class AbstractBoardingPass
 *
 * Abstract class for the boarding cards loaded.
 * This is the main structure of the boarding card.
 *
 * @package App\Utils\AbstractClasses
 */
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
        // loading the requirements
        $this->requirements = RequiredInputInterface::class;

        // checking the card requirements
        $this->checkingCardRequirements($card);

        // populating the object
        $this->destination = $card[RequiredInputInterface::required_arrival];
        $this->departure   = $card[RequiredInputInterface::required_departure];
        $this->sit         = $card[RequiredInputInterface::required_sit];
        $this->type        = $card[RequiredInputInterface::required_type];
    }

    /**
     * Get the current class name
     *
     * @return string
     */
    public static function getClassName()
    {
        return __CLASS__;
    }

    /**
     * Check if the card has the required fields
     *
     * @param  $card
     * @return bool
     * @throws \Exception
     */
    private function checkingCardRequirements($card)
    {
        $cardKeys = array_keys($card);

        foreach($cardKeys as $key)
        {
            $const = "$this->requirements::required_" . $key;

            if(!defined($const)) {
                throw new \Exception("Missing structure error!");
            }
        }
        return true;
    }
}
