<?php
$names = ["Amit", "Neha", "Vaishnavi"];

//Looping over array.
// for($i=0;$i<count($names);$i++){
//   echo $names[$i]." ";
// }

//Types of arrays..

//1. Indexed Arrays

echo "Indexed Array : ";
$colors = ["Red", "Green", "Blue"];

echo $colors[0] . " ";
echo $colors[1] . " ";
echo $colors[2];

//2. Associative array
echo "<br>Associative Array: ";
$student = [
    "name" => "Vaishnavi",
    "age" => 21,
    "city" => "Pune"
];

echo $student["name"] . " ";
echo $student["age"] . " ";
echo $student["city"];

echo "<br>";
//3. Multidimensional Array
echo "Multidimentional Array: ";
$students = [
    ["Amit", 20, "Pune"],
    ["Neha", 21, "Mumbai"],
    ["Vaishnavi", 22, "Nashik"]
];

echo $students[0][0] . " ";
echo $students[1][2] . " ";
echo $students[2][1];

echo "<br>";

?>