<?php

/**
 * Given input data type array with the structure for
 * each element defined in App\Utils\Intefaces\RequiredInputInterface,
 * generate the boarding cards sorted by Destination = Departure on next
 * trip leg.
 *
 * The current file application.php can be considered an separate program
 * which needs in return the cards from the Api.
 *
 * Input and output are in array format.
 *
 * @author  Dumitru Alexandru <pathristikon@gmail.com>
 * @licence MIT
 */

require_once __DIR__ . '/vendor/autoload.php';

use App\Api;


$data = [
    [
        'type'      => 'Plane',
        'departure' => 'Munchen',
        'arrival'   => 'London',
        'sit'       => '32B'
    ],
    [
        'type'      => 'Boat',
        'departure' => 'Belgrad',
        'arrival'   => 'Munchen',
        'sit'       => '40'
    ],
    [
        'type'      => 'Plane',
        'departure' => 'Paris',
        'arrival'   => 'Belgrad',
        'sit'       => '54F'
    ],
    [
        'type'      => 'Boat',
        'departure' => 'London',
        'arrival'   => 'Feroe Islands',
        'sit'       => '21'
    ],
];

$app = new Api($data);

var_dump($app->getResponse());
