<?php


namespace App;

use App\Utils\Traits;
use App\Utils\BoardingPasses\BoardingPassesFactory;

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
class Api
{
    use Traits;

    private $cards;
    private $types;

    public function __construct(array $cards)
    {
        $this->cards = $cards;

        $allBoardingCards = $this->createCards();
        $this->sortBoardingCards($allBoardingCards);

        $this->returnResponse([
           'status' => 200,
           'message' => $this->createBoardingPassesOutput($allBoardingCards)
        ]);
    }

    /**
     * Create the boarding passes objects
     * @return array
     */
    private function createCards()
    {
        return array_map([BoardingPassesFactory::class, 'createCardsCallback'], $this->cards);
    }

    /**
     * Output the result
     * @param array $boardingPasses
     * @return array
     */
    private function createBoardingPassesOutput(array $boardingPasses)
    {
        return array_map(function($pass){
           return $pass->output;
        }, $boardingPasses);
    }
}
