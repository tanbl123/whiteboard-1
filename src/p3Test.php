<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p3.php";

class p3Test extends TestCase{
    public function testGeneratesFirstTenNumbers(): void{
        $expected=[0, 1, 1, 2, 3, 5, 8, 13, 21, 34];
        $this->assertSame($expected,fibonacci(10));
    }
    public function testGeneratesZeroNumbers(): void{
        $expected=[];
        $this->assertSame($expected,fibonacci(0));
    }
    public function testNegativeCountReturnsEmptyArray(): void{
        $expected=[];
        $this->assertSame($expected,fibonacci(-10));
    }
    public function testGeneratesOneNumbers(): void{
        $expected=[0];
        $this->assertSame($expected,fibonacci(1));
    }
    public function testGeneratesTwoNumbers(): void{
        $expected=[0, 1];
        $this->assertSame($expected,fibonacci(2));
    }
    public function testGeneratesThreeNumbers(): void{
        $expected=[0, 1, 1];
        $this->assertSame($expected,fibonacci(3));
    }
}