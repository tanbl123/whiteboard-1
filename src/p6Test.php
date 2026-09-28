<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p6.php";

class p6Test extends TestCase{
    public function testExampleFromQuestion(){
        $input="Hello, world!";
        $expected=['character' => 'l', 'count' => 3];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testPunctuationIsIgnored(){
        $input="Hello, world!!!!!";
        $expected=['character' => 'l', 'count' => 3];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testWhitespaceIsIgnored(){
        $input="a   b   a";
        $expected=['character' => 'a', 'count' => 2];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testCaseSensitive(){
        $input="aAa";
        $expected=['character' => 'a', 'count' => 2];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testTieReturnsFirstCharacter(){
        $input=	"abab";
        $expected=['character' => 'a', 'count' => 2];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testDigitReturnedAsString(){
        $input="a111";
        $expected=['character' => '1', 'count' => 3];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testOnlyPunctuationReturnsNull(){
        $input="!!! ,,,";
        $expected=['character' => null, 'count' => 0];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testEmptyStringReturnsNull(){
        $input="";
        $expected=['character' => null, 'count' => 0];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testUnicodeCharacters(){
        $input="世界世";
        $expected=['character' => '世', 'count' => 2];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }
    public function testUnicodeMixedWithAscii(){
        $input="café é";
        $expected=['character' => 'é', 'count' => 2];
        $this->assertSame($expected,maxOccurringCharacter($input));
    }

}