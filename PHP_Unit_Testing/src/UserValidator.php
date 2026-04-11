<?php

namespace App;

class UserValidator
{
    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isValidPassword($password)
    {
        return strlen($password) >= 8;
    }
}