<?php

//if

$age = 20;

if ($age >= 18) {
    echo "You are eligible to vote.";
}

//if-- else

$marks = 35;

if ($marks >= 40) {
    echo "Pass";
} else {
    echo "Fail";
}

//if...elseif...else

$marks = 82;

if ($marks >= 90) {
    echo "Grade A+";
} elseif ($marks >= 75) {
    echo "Grade A";
} elseif ($marks >= 60) {
    echo "Grade B";
} elseif ($marks >= 40) {
    echo "Grade C";
} else {
    echo "Fail";
}

//Nested if..

$age = 22;
$hasID = true;

if ($age >= 18) {
    if ($hasID) {
        echo "Entry allowed";
    } else {
        echo "ID card required";
    }
} else {
    echo "Underage";
}

//Switch

$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of the week";
        break;
    case "Friday":
        echo "Almost weekend";
        break;
    case "Sunday":
        echo "Holiday";
        break;
    default:
        echo "Regular day";
}

//Switch Without break

$num = 2;

switch ($num) {
    case 1:
        echo "One";
    case 2:
        echo "Two";
    case 3:
        echo "Three";
}

//match expression

$day = "Sunday";

$result = match($day) {
    "Monday" => "Working day",
    "Sunday" => "Holiday",
    "Friday" => "Weekend is near",
    default => "Normal day"
};

echo $result;





?>