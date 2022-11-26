<?php


/*
6. Parašykite programą, kuri per argumentų padavimą terminale, paleidžiant funkciją juos priimtų, sudaugintų
tarpusavyje ir pakeltu kvadratu. Atkreipkite dėmesį, kad jeigu argumentas yra paduodamas ne skaičius, reikia, kad
terminale gautumėme atitinkamą klaidos kodą ir pranešimą. (2 balai)
*/

//  php index.php  3 5 -->> Jūsų skaičius: 225



$number = null;
$tries = 5;
$number1 = readline("Įveskite pirmą numerį: ");
$number2 = readline("Įveskite antrą numerį: ");

while (!is_numeric($number1) && !is_numeric($number2) && $tries > 0) {
    if (!is_numeric($number1)) {
        echo "Ivestas blogas pirmas numeris. Liko bandymų: " . $tries . PHP_EOL;
        $number1 = readline("Įveskite pirmą numerį: ");
    }
    if (!is_numeric($number2)) {
        echo "Ivestas blogas antras numeris. Liko bandymų: " . $tries . PHP_EOL;
        $number2 = readline("Įveskite antrą numerį: ");
    }
    $tries--;
}

if (!is_numeric($number) && !is_numeric($number2)) {
    echo "Baigėsi bandymai" . PHP_EOL;

    exit(1);
}

echo "Gautas skaičius:  " . ($number1 * $number2) ** 2;

?>