<?php

namespace App\Utils\BoardingPasses;
use App\Utils\Interfaces\BoardingPassesFactoryInterface;
use App\Utils\Interfaces\BoardingPassInterface;
Use App\Utils\Interfaces\RequiredInputInterface;


class BoardingPassesFactory implements BoardingPassesFactoryInterface
{
    public static function createCardsCallback(array $val)
    {
        if(empty($val[RequiredInputInterface::required_type]))
        {
            throw new \Exception("Missing type!");
        }

        $class = __NAMESPACE__ . '\\' . $val[RequiredInputInterface::required_type];

        if(!class_exists($class) || !class_implements($class, BoardingPassInterface::class))
        {
            throw new \Exception("Class doesn't exists or not implementing BoardingPassInterface!");
        }

        return new $class($val);

    }
}