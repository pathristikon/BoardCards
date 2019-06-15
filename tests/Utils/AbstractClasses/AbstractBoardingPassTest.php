<?php

use PHPUnit\Framework\TestCase;
use App\Utils\AbstractClasses\AbstractBoardingPass;

class AbstractBoardingPassTest extends TestCase
{
   public function testMissingRequirements()
   {
       $this->expectException(\Exception::class);

       $card = [
           'file' => 0
       ];

       $obj = new CreateObject($card);
   }
}

class CreateObject extends AbstractBoardingPass
{
    public function __construct($card)
    {
        parent::__construct($card);
    }
}