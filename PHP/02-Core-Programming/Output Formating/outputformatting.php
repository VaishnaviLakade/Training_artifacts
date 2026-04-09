<?php
//echo

echo "Hello World";
echo "Hello", " ", "Vaishnavi"; 
echo "<br>";
$name = "Vaishnavi";
echo "Hello $name";

echo "<br>";

//print

print "Hello World";

$a = print "Hello";
echo "<br>";
echo "$a has value: ".$a; // Output: Hello
echo "Hello\nWorld"; 

echo "<br>";
//Concatenation (. operator)
$name = "Vaishnavi";
echo "Hello " . $name;

echo "<br>";
//printf() (Formatted Output)

echo "<br>";
$name = "Vaishnavi";
$marks = 95.567;

printf("Name: %s, Marks: %.2f", $name, $marks);

//Same as printf(), but instead of printing, it stores the formatted text in a variable.
$name = "Vaishnavi";
$salary = 25000.5;

$msg = sprintf("Employee: %s, Salary: %.2f", $name, $salary);

?>