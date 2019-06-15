<?php

use PHPUnit\Framework\TestCase;
use App\Utils\Traits;

class TraitsTest extends TestCase
{
    use Traits;

    public function provider()
    {
        return [
            [
                $this->doBoardingObjects(),
                $this->doBoardingObjects(true),
            ]
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testSortBoardingCards($a, $expected)
    {
        $this->sortBoardingCards($a);
        $this->assertEquals($expected, $a);
    }

    /**
     * Create an array of objects to assert
     * @param bool $reverse
     * @return array
     */
    private function doBoardingObjects($reverse = false)
    {
        $first = new \StdClass();
        $first->departure = 'London';
        $first->destination = 'Copenhagen';

        $second = new \StdClass();
        $second->departure = 'Copenhagen';
        $second->destination = 'Madrid';

        if($reverse)
        {
            return [
                $first,
                $second
            ];
        }

        return [
          $second,
          $first
        ];
    }
}