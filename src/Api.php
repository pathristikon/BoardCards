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

        $this->createCards();
    }

    private function createCards()
    {
        array_map([$this, 'createCardsCallback'], $this->cards);
    }

    private function createCardsCallback($val)
    {
        if(in_array($val['type'], array_keys($this->types)))
        {
            $class = $this->types[$val['type']];
            new $class($val);
        }
    }

}
