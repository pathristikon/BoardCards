<?php


namespace App;

use App\Utils\Traits;
use App\Utils\BoardingPasses\BoardingPassesFactory;

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

    private function createCards()
    {
        return array_map([BoardingPassesFactory::class, 'createCardsCallback'], $this->cards);
    }

    private function createBoardingPassesOutput(array $boardingPasses)
    {
        return array_map(function($pass){
           return $pass->output;
        }, $boardingPasses);
    }
}
