<?php


$data = [
    [
        'type' => 'plane',
        'departure' => 'Munchen',
        'arrival' => 'Londra'
    ],
    [
        'type' => 'boat',
        'departure' => 'Belgrad',
        'arrival' => 'Munchen'
    ],
    [
      'type' => 'plane',
      'departure' => 'Paris',
      'arrival' => 'Belgrad'
    ]
];

usort($data, function($a, $b){
   if($a['arrival'] !== $b['departure'])
   {
       return 1;
   }
});

$toSend = json_encode($data);

echo $result;



