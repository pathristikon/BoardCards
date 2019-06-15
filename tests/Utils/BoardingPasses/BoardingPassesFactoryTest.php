<?php

use PHPUnit\Framework\TestCase;
use App\Utils\BoardingPasses\BoardingPassesFactory;

class BoardingPassesFactoryTest extends TestCase
{
    public function testCreateCardsCallback()
    {
        $this->expectException(\Exception::class);

        $arr = [
          'type' => 'Boating'
        ];

        BoardingPassesFactory::createCardsCallback($arr);
    }
}