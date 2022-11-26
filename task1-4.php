<?php

// ini_set('memory_limit', '4G');

/*
Užduotis nuo 1 iki 4 atlikite galite į vieną failą, rekomenduojame 5, 6, 7 užduotis atlikti atskiruose failuose. 
Funkcijų ir kintamųjų pavadinimus vadinkite suprantamai,
taip kad kiti galėtu suprasti ką funkicija daro ar kintamasis saugo (vertinime atsižvelgsime į teisingus namingus)
Pabandykite laikykis code standartų, tiek kiek esame apie juos šnekėje.
*/

/*
1.  Grąžinkite visų lyginių skaičių, esančių $numbers masyve, sumą (1 balas) +0.5 jeigu array funkcijos naudojamos
*/

$numbers = [
    15,
    55,
    66,
    91,
    100,
    995,
    17,
    550,
];

function exercises1($numbers): int
{
    $evenNumbersSum = 0;
    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            $evenNumbersSum += $number;
        }
    }
    return $evenNumbersSum;
}

echo "Exercises 1" . PHP_EOL;

var_dump(exercises1($numbers) . PHP_EOL);

/*
2. Grąžinkite visų skaičių, esančių $numbers masyve, sandaugą (1 balas), +0.5 jeigu array funkcijos naudojamos
*/

$numbers2 = [
    [1, 3, 5],
    [55, 87, 100],
    [12],
    [],
];

function exercises2($numbers): int
{
    $multiply = multiplication($numbers);

    return $multiply;
}

function multiplication($array, $multiply = 1): int
{

    foreach ($array as $number) {

        if (is_array($number)) {

            $multiply = multiplication($number, $multiply);

        } else {

            $multiply *= $number;
        }
    }

    return $multiply;
}

echo "Exercises 2" . PHP_EOL;

var_dump(exercises2($numbers2) . PHP_EOL);

/*
3. Masyve $holidays turime kelionių agentūros siūlomas keliones su kaina ir dalyvių skaičiumi.
Terminale išspausdinkite santrauką, kurioje matytusi miesto pavadinimas, kelionių pavadinimai ir dalyvių sumokėta suma
Dėmesio! Santraukoje nerodykite tų kelionių, kurių kaina yra null. (2 balai)
*/

//   Destination "Paris".
//   Titles: "Romantic Paris", "Hidden Paris"
//   Total: 99500
//   ************
//   Destination "New York"

$holidays = [
    [
        'title' => 'Romantic Paris',
        'destination' => 'Paris',
        'price' => 1500,
        'tourists' => 55,
    ],
    [
        'title' => 'Amazing New York',
        'destination' => 'New York',
        'price' => 2699,
        'tourists' => 21,
    ],
    [
        'title' => 'Spectacular Sydey',
        'destination' => 'Sydey',
        'price' => 4130,
        'tourists' => 9,
    ],
    [
        'title' => 'Hidden Paris',
        'destination' => 'Paris',
        'price' => 1700,
        'tourists' => 10,
    ],
    [
        'title' => 'Emperors of the past',
        'destination' => 'Beijing',
        'price' => null,
        'tourists' => 10,
    ],
];

function exercises3($holidays): void
{
    $newHolidaysArray = newTotalArray($holidays);

    foreach ($newHolidaysArray as $city) {

        $cityTitle = explode(',', $city['title']);

        echo sprintf('Destination: "%s".', $city['destination']) . PHP_EOL;
        echo "Title: ";

        foreach ($cityTitle as $title) {
            echo next($cityTitle) ? sprintf('"%s", ', $title) : sprintf('"%s".', $title);
        }
        echo PHP_EOL;
        echo 'Total: ' . $city['total'] . PHP_EOL;
        echo '************' . PHP_EOL;
    }
}

function newTotalArray($holidays, $newArray = []): array
{

    foreach ($holidays as $entry) {
        if ($entry['price'] !== null) {
            if (!isset($newArray[$entry['destination']])) {
                $newArray[$entry['destination']] = $entry['destination'];
                $newArray[$entry['destination']] = ['destination' => $entry['destination']];
                $newArray[$entry['destination']]['title'] = $entry['title'];
                $newArray[$entry['destination']]['total'] = $entry['price'] * $entry['tourists'];
            } else {
                $newArray[$entry['destination']]['title'] .= ',' . $entry['title'];
                $newArray[$entry['destination']]['total'] += $entry['price'] * $entry['tourists'];
            }
        }
    }
    return $newArray;
}

echo "Exercises 3" . PHP_EOL;

exercises3($holidays);

/*
4. Pakoreguokite 3 užduotį taip, kad ji duomenis rašytų ne į terminalą, o spausdintų į failą. (1 balas)
*/

function exercises4($holidays): void
{

    $newHolidaysArray = newTotalArray($holidays);
    $file = fopen('exercises4.txt', 'w');

    foreach ($newHolidaysArray as $city) {

        $cityTitle = explode(',', $city['title']);

        fwrite($file, sprintf('Destination: "%s".', $city['destination']) . PHP_EOL);
        fwrite($file, "Title: ");

        foreach ($cityTitle as $title) {

            if (next($cityTitle)) {
                fwrite($file, sprintf('"%s", ', $title));

            } else {

                fwrite($file, sprintf('"%s".', $title));
            }
        }

        fwrite($file, PHP_EOL);
        fwrite($file, 'Total: ' . $city['total'] . PHP_EOL);
        fwrite($file, '************' . PHP_EOL);
    }
    fclose($file);

}

echo "Exercises 4" . PHP_EOL;

exercises4($holidays);