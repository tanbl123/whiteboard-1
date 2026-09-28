<?php
//.\vendor\bin\phpunit src

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/p1.php';

class p1Test extends TestCase{
    public function testSortsGivenList(): void{
        $input = [21, 400, 8, -3, 77, 99, -16, 55, 111, -36, 28];
        $expected = [-36, -16, -3, 8, 21, 28, 55, 77, 99, 111, 400];
        $this->assertSame($expected, sortNumbers($input));
    }
    public function testEmptyArray(): void{
        $this->assertSame([],sortNumbers([]));
    }
    public function testAlreadySorted(): void{
        $this->assertSame([1,2,3], sortNumbers([1,2,3]));
    }
    public function testDuplicates(): void{
        $this->assertSame([1, 2, 2, 3], sortNumbers([2,3,1,2]));
    }
}
