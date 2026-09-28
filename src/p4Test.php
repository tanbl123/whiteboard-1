<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p4.php";

class p4Test extends TestCase{
    public function testExampleFromQuestion(): void{
        $Q4list1=[4, 5, 2, 3, 1, 6];
        $Q4list2=[8, 7, 6, 9, 4, 5];
        $expected=[4,5,6];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testNoCommonItemsReturnsEmptyArray(): void{
        $Q4list1=[1, 2, 3];
        $Q4list2=[4, 5, 6];
        $expected=[];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testFirstListEmptyArray(): void{
        $Q4list1=[];
        $Q4list2=[4, 5, 6];
        $expected=[];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testBothListEmptyArray(): void{
        $Q4list1=[];
        $Q4list2=[];
        $expected=[];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testIdenticalList(): void{
        $Q4list1=[1, 2, 3];
        $Q4list2=[1, 2, 3];
        $expected=[1, 2, 3];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testDuplicateInList1(): void{
        $Q4list1=[4, 4, 5];
        $Q4list2=[4, 5];
        $expected=[4, 5];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testDuplicateAfterFirstItem(): void{
        $Q4list1=[4, 5, 5];
        $Q4list2=[4, 5];
        $expected=[4, 5];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
    public function testDuplicateInList2(): void{
        $Q4list1=[4, 5];
        $Q4list2=[5, 5, 4];
        $expected=[4, 5];
        $this->assertSame($expected,findIntersection($Q4list1,$Q4list2));
    }
}