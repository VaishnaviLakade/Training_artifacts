<?php
//LOOPS in PHP

//1.  while loop

$i = 1;

while ($i <= 5) {
    echo $i . "<br>";
    $i++;
}

//do- while loop

$i = 1;

do {
    echo $i . "<br>";
    $i++;
} while ($i <= 5);

//For loop

for ($i = 1; $i <= 5; $i++) {
    echo $i . "<br>";
}

//Foreach

$colors = ["Red", "Green", "Blue"];

foreach ($colors as $color) {
    echo $color . "<br>";
}

//foreach with associative array

$student = [
    "name" => "Vaishnavi",
    "age" => 21,
    "city" => "Pune"
];

foreach ($student as $key => $value) {
    echo $key . " : " . $value . "<br>";
}

?>