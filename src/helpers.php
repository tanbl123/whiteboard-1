<?php

function countArray(array $arr):int{
    $n=0;
    foreach($arr as $item){
        $n++;
    }
    return $n;
}

/*
Checks whether a value exists in an array (strict comparison).
Time complexity: O(n) - may check every item in the array.
*/
function inArray(mixed $value,array $array): bool{
    foreach($array as $item){
        if($value===$item){
            return true;
        }
    }
    return false;
}

function positionArray(mixed $value, array $array): int{
    $position=-1;
    foreach($array as $item){
        $position++;
        if($value===$item){
            return $position;
        }
    }
    return -1;
}

/*
Returns a new array with every occurrence of $value removed.
If $value is not found, all items are copied, so the result
matches the original array.
Time complexity: O(n) - each item is checked once.
*/
function removeArrayItem(mixed $value, array $array): array{
    $newArray=[];
    foreach($array as $item){
        // Copy every item except the one being removed
        if($item !== $value){
            $newArray[]=$item;
        }
    }
    return $newArray;
}

function numberExistence(mixed $value,array $array): int{
    $count=0;
    foreach($array as $arr){
        if($value===$arr){
            $count++;
        }
    }
    return $count;
}

function stringLength(string $str): int{
    $length=0;
    $i=0;
    while(isset($str[$i])){ //check if $str[$i] has been declared and is not null
        $byte=$str[$i];
        //"\x80" - a 1-byte ASCII character, which counts as one character.
        //"\xC0" - the first byte of a multi-byte character, which also counts as one character.
        //"café" as bytes:  [ c ][ a ][ f ][ \xC3 ][ \xA9 ]
        //                    0    1    2     3       4
        if($byte<"\x80" || $byte >="\xC0"){
            $length++;
        }
        $i++;
    }
    return $length;
}

//split input string to array of character out
function splitCharacters(string $str): array{
    $chars=[];
    $i=0;
    while(isset($str[$i])){
        $byte=$str[$i];
        if($byte>= "\xF0"){ //4 bytes
            $length=4;
        }elseif($byte>= "\xE0"){ //3 bytes
            $length=3;
        }elseif($byte>= "\xC0"){ //2 bytes
            $length=2;
        }else{ //1 byte
            $length=1;
        }

        $char='';
        for($j=0;$j<$length;$j++){
            $char.=$str[$i+$j];
        }
        $chars[]=$char;
        $i+=$length;

    }
    return $chars;
}

function isLetterOrDigit(string $char): bool{
    //\p{L} means any letter in any language.
    //\p{N} means any number.
    //u makes preg_match() read the string as UTF-8 characters instead of bytes.
    $pattern = '/^[\p{L}\p{N}]$/u';
    if(preg_match($pattern, $char)){
        return true;
    }
    return false;
}

//Counts how many times each letter or digit appears.
//Whitespace and punctuation are skipped.
function countCharacters(array $chars): array{
    $countArray=[];
    foreach($chars as $char){
        if(isLetterOrDigit($char)){
            $countArray[$char]=numberExistence($char,$chars);
        }
    }
    return $countArray;
} 

function toLowerChar(string $char): string{
    // Uppercase and lowercase ASCII letters differ only by bit 32.
    // A space ' ' is byte 32, so OR-ing with it switches that bit on:
    // 'A' (01000001) | ' ' (00100000) = 'a' (01100001)
    if($char>='A' && $char<='Z'){
        return $char | ' ';
    }
    // Other ASCII characters (lowercase, digits): already fine
    if($char < "\x80"){
        return $char;
    }
    // Multi-byte (Unicode) characters: case rules differ per language,
    // so use mb_strtolower(), which relies on official Unicode tables
    return mb_strtolower($char);
}

function toLowerString(string $str): string{
    $result="";
    foreach (splitCharacters($str) as $char){
        $result .= toLowerChar($char);
    }
    return $result;
}

function displayArray(array $array){
    $count=0;
    $arrLen=countArray($array);
    foreach($array as $item){
        $count++;
        if($count === $arrLen){
            echo $item."\n";
        }else{
            echo $item.", ";
        }
    }
}