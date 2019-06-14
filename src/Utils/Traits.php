<?php

namespace App\Utils;


trait Traits
{
    public function sortBoardingCards(array &$cards): int
    {
        return usort($cards, function($a, $b) {
            if($a->getDestination() !== $b->getDeparture())
            {
                return 1;
            }
            return false;
        });
    }

   public function returnResponse(array $params)
   {
       var_dump([
           'status'  => $params['status'],
           'message' => $params['message']
       ]);
   }
}