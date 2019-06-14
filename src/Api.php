<?php


namespace App;

use App\Utils\Cards;

class Api
{

    private $cards;
    private $types;

    public function __construct($cards)
    {
        $this->cards = $cards;
        $this->types = Cards::$types;

        $allBoardingCards = $this->createCards();
        $this->sortBoardingCards($allBoardingCards);
        var_dump($allBoardingCards);
    }

    private function createCards()
    {
        return array_map([$this, 'createCardsCallback'], $this->cards);
    }

    private function createCardsCallback($val)
    {
        if(in_array($val['type'], array_keys($this->types)))
        {
            $class = $this->types[$val['type']];
            return new $class($val);
        }
    }

    public function sortBoardingCards(array $cards)
    {
        return usort($cards, function($a, $b) {
            if($a->getDeparture() !== $b->getDestination())
            {
                return 1;
            }
            return false;
        });
    }
}
