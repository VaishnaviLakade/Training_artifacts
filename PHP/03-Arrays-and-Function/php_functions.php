  <?php
function greet() {
    echo "Hello, welcome to PHP!";
}

greet();

//Function with Parameters..
function greetUser($name) {
    echo "Hello, " . $name;
}

greetUser("Vaishnavi");

//Multiple Parameters

function add($a, $b) {
    echo $a + $b;
}

add(10, 20);

//Function with return value..

function sub($a, $b) {
    return $a - $b;
}

$result = sub(10, 20);
echo $result;

//Defalut Parameter Values..

function greeting($name = "Guest") {
    echo "Hello, " . $name;
}

echo "<br>";
greeting("Vaishnavi");

?>