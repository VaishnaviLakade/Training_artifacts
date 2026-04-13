<?php
$fruits = ["Apple", "Banana", "Mango"];
echo "Count is :".count($fruits);

echo "<br>";
// array_push(): Used to add one or more elements at the end.

array_push($fruits, "Mango", "Orange");

print_r($fruits);
echo "<br>";

//array_pop(): Removes the last element.

array_pop($fruits);

print_r($fruits);
echo "<br>";

//sort(): Sorts an indexed array in ascending order.

$nums = [40, 10, 30, 20];
sort($nums);
print_r($nums);
echo "<br>";

//rsort() : Sorts in descending order.

rsort($nums);
print_r($nums);
echo "<br>";

//asort() :Sort associative array by value.

$marks = [
    "Amit" => 78,
    "Neha" => 92,
    "Vaishnavi" => 85
];

asort($marks);
print_r($marks);
echo "<br>";

//ksort(): Sort associative array by key.
$marks = [
    "Neha" => 92,
    "Amit" => 78,
    "Vaishnavi" => 85
];

ksort($marks);
print_r($marks);
echo "<br>";
//in_array() : Checks if a value exists in array.
$fruits = ["Apple", "Banana", "Mango"];

if (in_array("Banana", $fruits)) {
    echo "Found";
} else {
    echo "Not Found";
}
?>