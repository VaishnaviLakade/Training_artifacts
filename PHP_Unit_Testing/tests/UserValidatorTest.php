<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\UserValidator;

class UserValidatorTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = new UserValidator();
    }

    public function testValidEmail()
    {
        $this->assertTrue($this->validator->isValidEmail("test@example.com"));
    }

    public function testInvalidEmail()
    {
        $this->assertFalse($this->validator->isValidEmail("wrong-email"));
    }

    public function testValidPassword()
    {
        $this->assertTrue($this->validator->isValidPassword("password123"));
    }

    public function testInvalidPassword()
    {
        $this->assertFalse($this->validator->isValidPassword("pass"));
    }
}