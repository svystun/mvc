<?php

use App\Phones\{CellNokia, CellPhilips};
use GuzzleHttp\Client as Client2;


//$phone = new CellPhone(['sim1', 'sim2'], 1000);
//
//$phone->setMoney(20);
//$phone->call(380675643732);
//$phone->sendSMS(380675643732, 'Hello world!');

$philips = new CellPhilips(['sim1', 'sim2'], 1000, 'Philips');

$nokia = new CellNokia(['sim1', 'sim2'], 1000, 'Nokia');

$philips->setMoney(20)->call(380675643732)->sendSMS(3806756437325345345, 'Hello world!');



$cars = ['BWM', 'DAEWOO'];

foreach ($cars as &$car) {
        $car = $car . ' - 1';
}

//print_r($cars);

//$word2 = 'World';
//
//$var = function ($word1) use ($word2) {
//        echo $word1 . $word2 . PHP_EOL;
//};
//
//$var('Hello');


