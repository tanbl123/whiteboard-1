<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p8.php";

class p8Test extends TestCase{
    public function testExample1ListenSilent(): void{
        $string1="listen";
        $string2="silent";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testExample2IgnoresSpacesAndCase(): void{
        $string1="debit card";
        $string2="Bad credit";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testExample3DifferentLetters(): void{
        $string1="hello";
        $string2="bye";
        $this->assertFalse(isAnagram($string1,$string2));
    }
    public function testExample4RestfulFluster(): void{
        // The question lists this as false, but both words contain
        // r, e, s, t, f, u, l exactly once each, so they ARE anagrams.
        // expected: true
        $string1="restful";
        $string2="fluster";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testExample5ExtraCharacter(): void{
        $string1="listen";
        $string2="silentt";
        $this->assertFalse(isAnagram($string1,$string2));
    }
    public function testExample6IgnoresPunctuation(): void{
        $string1="Conversation";
        $string2="Voices, rant on";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testIgnoresCase(): void{
        $string1="Listen";
        $string2="silent";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testAllUppercase(): void{
        $string1="LISTEN";
        $string2="silent";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testSameLettersDifferentCounts(): void{
        $string1="aab";
        $string2="abb";
        $this->assertFalse(isAnagram($string1,$string2));
    }
    public function testIdenticalStrings(): void{
        $string1="listen";
        $string2="listen";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testBothEmpty(): void{
        $string1="";
        $string2="";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testOneEmpty(): void{
        $string1="abc";
        $string2="";
        $this->assertFalse(isAnagram($string1,$string2));
    }
    public function testOnlyPunctuationAndSpaces(): void{
        $string1="!!! ,,,";
        $string2="   ...";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testUnicodeAnagram(): void{
        $string1="世界";
        $string2="界世";
        $this->assertTrue(isAnagram($string1,$string2));
    }
    public function testUnicodeCaseInsensitive(): void{
        $string1="Éa";
        $string2="aé";
        $this->assertTrue(isAnagram($string1,$string2));
    }
}
