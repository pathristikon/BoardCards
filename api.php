<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Api;

$data = [
    [
        'type' => 'Plane',
        'departure' => 'Munchen',
        'arrival' => 'Londra'
    ],
    [
        'type' => 'boat',
        'departure' => 'Belgrad',
        'arrival' => 'Munchen'
    ],
    [
        'type' => 'Plane',
        'departure' => 'Paris',
        'arrival' => 'Belgrad'
    ]
];

new Api($data);
