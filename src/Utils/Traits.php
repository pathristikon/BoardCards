<?php

namespace App\Utils;

/**
 * Trait Traits
 *
 * Placing traits here.
 *
 * The advantage of having them here consists in
 * the fact that you don't need to extend a base class,
 * just to use an method.
 * That way, the methods can be used exactly when they
 * are needed.
 *
 * @package App\Utils
 */
trait Traits
{
    /**
     * Here the magic happens.
     * A simple syntax for a complex problem.
     * Sorts the array of objects that we created.
     *
     * @param  array $cards
     * @return int
     */
    public function sortBoardingCards(array &$cards): int
    {
        return usort(
            $cards, function ($a, $b) {
                if ($a->destination !== $b->departure) {
                    return 1;
                }
                return false;
            }
        );
    }
}
