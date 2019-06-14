<?php


namespace App;

use App\Utils\Cards;
use App\Utils\Traits;

class Api
{
    use Traits;

    private $cards;
    private $types;

    public function __construct(array $cards)
    {
        $this->cards = $cards;
        $this->types = Cards::$types;

        $allBoardingCards = $this->createCards();
        $this->sortBoardingCards($allBoardingCards);

        $this->returnResponse([
           'status' => 200,
           'message' => $this->createBoardingPassesOutput($allBoardingCards)
        ]);
    }

    private function createCards()
    {
        return array_map([$this, 'createCardsCallback'], $this->cards);
    }

    private function createCardsCallback(array $val)
    {
        if(in_array($val['type'], array_keys($this->types)))
        {
            $class = $this->types[$val['type']];
            return new $class($val);
        }

        return true;
    }

    private function createBoardingPassesOutput(array $boardingPasses)
    {
        return array_map(function($pass){
           return $pass->output;
        }, $boardingPasses);
    }
}
