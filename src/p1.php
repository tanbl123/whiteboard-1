<?php
require_once __DIR__ . "/helpers.php";
/*
Problem 1 - Sorting

Approach: Bubble Sort
Repeatedly compare neighbouring numbers and swap them if they are in the wrong order.

After each pass the largest remaining number moves to the end,
so each pass can check one fewer position (-$i in the inner loop).

Time complexity: O(n^2)     -nested loop

Space complexity: O(1)      -sorts in place, only use 1 temp variable
*/

function sortNumbers(array $arr) : array {
    $arrLen=countArray($arr);
    for($i=0;$i<$arrLen-1;$i++){
        for($j=0;$j<$arrLen-1-$i;$j++){     //-$i skip the numbers that already sorted at the end
            if($arr[$j]>$arr[$j+1]){        //current number > next number
                $temp=$arr[$j];             //store current number
                $arr[$j]=$arr[$j+1];        //replace the current biggest number with the next number in the array
                $arr[$j+1]=$temp;           //replace the next number from array to stored number
            }
        }
    }
    return $arr;
}

$testArr=[21, 400, 8, -3, 77, 99, -16, 55, 111, -36, 28];
echo '<pre>';
echo "\nQuestion 1\n";
displayArray(sortNumbers($testArr));
echo '</pre>';