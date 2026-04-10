<?php

class MagicTest {

    public function __construct() {
        echo "Object created<br>";
    }

    public function __get($name) {
        return "Accessing $name<br>";
    }

    public function __set($name, $value) {
        echo "$name set to $value<br>";
    }

    public function __call($name, $args) {
        echo "Method $name called<br>";
    }
}

$m = new MagicTest();

echo $m->city;

$m->age = 21;

$m->run();