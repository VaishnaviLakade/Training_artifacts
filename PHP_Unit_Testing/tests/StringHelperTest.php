<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\StringHelper;

class StringHelperTest extends TestCase
{
    private $helper;

    protected function setUp(): void
    {
        $this->helper = new StringHelper();
    }

    public function testMakeUpper()
    {
        $this->assertEquals("HELLO", $this->helper->makeUpper("hello"));
    }

    public function testReverse()
    {
        $this->assertEquals("olleh", $this->helper->reverse("hello"));
    }

    public function testIsPalindromeReturnsTrue()
    {
        $this->assertTrue($this->helper->isPalindrome("madam"));
    }

    public function testIsPalindromeReturnsFalse()
    {
        $this->assertFalse($this->helper->isPalindrome("hello"));
    }
}