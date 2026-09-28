<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p5.php";
require_once __DIR__ . "/p1.php";

class p5Test extends TestCase{
    public function testExampleFromQuestion(): void{
        $Q5list1=[4, 5, 2, 3, 1, 6];
        $Q5list2=[8, 7, 6, 9, 4, 5];
        $expected=[1, 2, 3, 7, 8, 9];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testNoSimilarItem(): void{
        $Q5list1=[1, 2, 3];
        $Q5list2=[4, 5, 6];
        $expected=[1, 2, 3, 4, 5, 6];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testIdenticalListsReturnEmptyArray(): void{
        $Q5list1=[1, 2, 3];
        $Q5list2=[1, 2, 3];
        $expected=[];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testFirstListEmpty(): void{
        $Q5list1=[];
        $Q5list2=[1, 2];
        $expected=[1, 2];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testSecondListEmpty(): void{
        $Q5list1=[1, 2];
        $Q5list2=[];
        $expected=[1, 2];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testBothListsEmpty(): void{
        $Q5list1=[];
        $Q5list2=[];
        $expected=[];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testDuplicatesInList1(): void{
        $Q5list1=[2, 2, 4];
        $Q5list2=[4];
        $expected=[2];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testDuplicatesInList2(): void{
        $Q5list1=[1, 2];
        $Q5list2=[2, 3, 3];
        $expected=[1, 3];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    public function testOneListContainsTheOther(): void{
        $Q5list1=[1, 2, 3, 4];
        $Q5list2=[3, 4];
        $expected=[1, 2];
        $this->assertSame($expected,sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
    }
    


}