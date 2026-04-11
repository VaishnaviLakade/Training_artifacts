<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    private $calc;

    protected function setUp(): void
    {
        $this->calc = new Calculator();
    }

    public function testAdd(): void
    {
        $this->assertEquals(10, $this->calc->add(5, 5));
    }

    public function testSubtract(): void
    {
        $this->assertEquals(2, $this->calc->subtract(5, 3));
    }

    public function testMultiply(): void
    {
        $this->assertEquals(15, $this->calc->multiply(5, 3));
    }

    public function testDivide(): void
    {
        $this->assertEquals(2, $this->calc->divide(10, 5));
    }

    public function testDivideByZero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calc->divide(10, 0);
    }

    #[DataProvider('addDataProvider')]
    public function testAddMultiple($a, $b, $expected): void
    {
        $this->assertEquals($expected, $this->calc->add($a, $b));
    }

    public static function addDataProvider(): array
    {
        return [
            [1, 2, 3],
            [5, 5, 10],
            [10, 0, 10],
            [-1, 1, 0]
        ];
    }
}