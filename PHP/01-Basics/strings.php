<?php

//Two ways of creating the string:

$a="Vaishnavi";
$b='vaishnavi';

echo $a." ".$b;

//String Functions

//Adding the Slashes
$str = addcslashes("\nHello World!","W");
echo($str);

//Add a backslash in front of each double quote ("):

$str = addslashes('\n What does "yolo" mean?');
echo($str);


$str = "Hello World!";
echo $str . "<br>";
echo ltrim($str,"Hello");

//Join array elements with a string:

$arr = array('Hello','World!','Beautiful','Day!');
echo join(" ",$arr);

//Return the ASCII value of "h":

echo ord("h")."<br>";
echo ord("hello")."<br>";

$str = "Hello World!";
echo $str . "<br>";
echo trim($str,"Hed!");
echo "<br>";
echo ucfirst("hello world!");

?>