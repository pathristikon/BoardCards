<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Api;

$data = [
    [
        'type'      => 'Plane',
        'departure' => 'Munchen',
        'arrival'   => 'Londra',
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
    ]
];

new Api($data);
