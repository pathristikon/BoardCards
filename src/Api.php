<?php


namespace App;

use App\Utils\Traits;
use App\Utils\BoardingPasses\BoardingPassesFactory;
use App\Utils\Interfaces\ApiInterface;

/**
 * Class Api
 *
 * Main program.
 *
 * It will prepare the boarding passes objects
 * and populate them.
 *
 * @package App
 */
class Api implements ApiInterface
{
    use Traits;

    private $cards;
    private $response;

    public function __construct(array $cards)
    {
        $this->cards = $cards;

        $allBoardingCards = $this->createCards();
        $this->sortBoardingCards($allBoardingCards);

        $this->response = $this->createBoardingPassesOutput($allBoardingCards);
    }

    /**
     * Return list of boarding cards
     *
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Create the boarding passes objects
     *
     * @return array
     */
    private function createCards()
    {
        return array_map([BoardingPassesFactory::class, 'createCardsCallback'], $this->cards);
    }

    /**
     * Output the result
     *
     * @param  array $boardingPasses
     * @return array
     */
    private function createBoardingPassesOutput(array $boardingPasses)
    {
        $boardingPassesOutputs = array_map(
            function ($pass) {
                return $pass->output;
            }, $boardingPasses
        );

        array_push($boardingPassesOutputs, 'You arrived at the destination!');

        return $boardingPassesOutputs;
    }
}
