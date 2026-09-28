<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p7.php";

class p7Test extends TestCase{
    public function testPerfectSquareExample(): void{
        $input=36;
        $expected=6;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testSmallPerfectSquares(): void{
        $input=4;
        $expected=2;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testZero(): void{
        $input=0;
        $expected=0;    
        $this->assertSame($expected, squareRoot($input));
    }
    public function testOne(): void{
        $input=1;
        $expected=1;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testLargePerfectSquare(): void{
        $input=1000000;
        $expected=1000;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testVeryLargePerfectSquare(): void{
        $input=9999800001;
        $expected=99999;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testNonPerfectSquareReturnsFloor(): void{
        $input=10;
        $expected=3;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testNonPerfectSquareJustBelowNext(): void{
        $input=24;
        $expected=4;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testTwoReturnsOne(): void{
        $input=2;
        $expected=1;
        $this->assertSame($expected, squareRoot($input));
    }
    public function testNegativeReturnsMinusOne(): void{
        $input=-4;
        $expected=-1;
        $this->assertSame($expected, squareRoot($input));
    }
}