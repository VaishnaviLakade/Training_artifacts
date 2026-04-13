
<?php
//Arithmetic Opearators:

$x=10;
$y=20;

echo "Arithmetic Opearators: "; 
// Addition
echo "Addition: " . ($x + $y) . "<br>";

// Subtraction
echo "Subtraction: " . ($x - $y) . "<br>";

// Multiplication
echo "Multiplication: " . ($x * $y) . "<br>";

// Division
echo "Division: " . ($x / $y) . "<br>";

// Modulus
echo "Modulus: " . ($x % $y) . "<br>";

// Exponentiation
echo "Exponentiation: " . ($x ** $y) . "<br>";

echo "-------------- LOGICAL OPERATORS ------------";


// OR (||)
$s = $p || $q;
echo "OR (||): s = " . ($s ? 'true' : 'false') . "<br>";

// NOT (!)
$t = !$p;
echo "NOT (!): t = " . ($t ? 'true' : 'false') . "<br>";

// AND (and keyword)
$u = $p and $q;
echo "AND (and): u = " . ($u ? 'true' : 'false') . "<br>";

// OR (or keyword)
$v = $p or $q;
echo "OR (or): v = " . ($v ? 'true' : 'false') . "<br>";

// XOR
$w = $p xor $q;
echo "XOR: w = " . ($w ? 'true' : 'false') . "<br>";

echo "-------------- PHP Increment / Decrement Operators ------------";


$h = 5;

// Pre-increment
$i = ++$h;
echo "Pre-increment (++h): i = $i, h = $h <br>";

// Reset
$j = 5;

// Post-increment
$k = $j++;
echo "Post-increment (j++): k = $k, j = $j <br>";

// Reset
$l = 5;

// Pre-decrement
$m = --$l;
echo "Pre-decrement (--l): m = $m, l = $l <br>";

// Reset
$n = 5;

// Post-decrement
$o = $n--;
echo "Post-decrement (n--): o = $o, n = $n <br>";


echo "-------------- PHP Array Operators ------------";



$arr1 = array("a" => 1, "b" => 2);
$arr2 = array("b" => 2, "c" => 3);

// Union (+)
$union = $arr1 + $arr2;
echo "Union (+): ";
print_r($union);
echo "<br>";

// Equality (==)
$eq = ($arr1 == $arr2);
echo "Equality (==): " . ($eq ? 'true' : 'false') . "<br>";

// Identity (===)
$id = ($arr1 === $arr2);
echo "Identity (===): " . ($id ? 'true' : 'false') . "<br>";

// Inequality (!=)
$neq = ($arr1 != $arr2);
echo "Inequality (!=): " . ($neq ? 'true' : 'false') . "<br>";

// Inequality (<>)
$neq2 = ($arr1 <> $arr2);
echo "Inequality (<>): " . ($neq2 ? 'true' : 'false') . "<br>";

// Non-identity (!==)
$nid = ($arr1 !== $arr2);
echo "Non-identity (!==): " . ($nid ? 'true' : 'false') . "<br>";



echo "------------ Assignment Operators --------------";

$a1 = 12;
$b1 = 3;

// Assign (=)
$a1 = $b1;
echo "Assign (=): a1 = $a1 <br>";

// Add and assign (+=)
$c1 = 12;
$c1 += $b1;
echo "Add and Assign (+=): c1 = $c1 <br>";

// Subtract and assign (-=)
$d1 = 12;
$d1 -= $b1;
echo "Subtract and Assign (-=): d1 = $d1 <br>";

// Multiply and assign (*=)
$e1 = 12;
$e1 *= $b1;
echo "Multiply and Assign (*=): e1 = $e1 <br>";

// Divide and assign (/=)
$f1 = 12;
$f1 /= $b1;
echo "Divide and Assign (/=): f1 = $f1 <br>";

// Modulus and assign (%=)
$g1 = 12;
$g1 %= $b1;
echo "Modulus and Assign (%=): g1 = $g1 <br>";



?>