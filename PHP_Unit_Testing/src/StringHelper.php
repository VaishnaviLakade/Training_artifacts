<?php

namespace App;

class StringHelper
{
    public function makeUpper($text)
    {
        return strtoupper($text);
    }

    public function reverse($text)
    {
        return strrev($text);
    }

    public function isPalindrome($text)
    {
        $clean = strtolower(str_replace(' ', '', $text));
        return $clean === strrev($clean);
    }
}