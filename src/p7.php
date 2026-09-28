<?php

/*
Problem 7 - Square Root
Calculate the square root of a non-negative integer without using
any built-in square root or library function.
Example: 36 -> 6

Approach (binary search):
The square root of x must lie between 0 and x. Instead of trying
every number, check the middle of the current range:

- if mid x mid equals x, mid is the answer.
- if mid x mid is smaller than x, the answer is in the upper half.
- if mid x mid is larger than x, the answer is in the lower half.

Each step halves the range, so the answer is found quickly even for large numbers.

Extra behaviour:
- Non-perfect squares return the floor of the square root
(e.g. 10 -> 3). When the search ends without an exact match,
$high holds the largest number whose square is <= x.

- Negative numbers return -1, since they have no real square root.

Complexity:
Time:  O(log x) - the search range is halved on every step
                  (about 20 steps for x = 1,000,000).
Space: O(1) - only a few variables are used.

*/

//Returns the square root of a non-negative integer.
function squareRoot(int $number): int{
    // Negative numbers have no real square root
    if($number<0){
        return -1;
    }
    $low=0;
    $high=$number;
    while($low<=$high){ 
        // (int) keeps mid a whole number; without it, an odd sum 
        // such as 17 / 2 would give 8.5
        $mid=(int)(($low+$high)/2); 
        $productMid=$mid*$mid;
        if($productMid===$number){
            return $mid;    // exact square root found
        }elseif($productMid<$number){
            $low=$mid+1;    // answer is in the upper half
        }else{      //if $ProductMid>number
            $high=$mid-1;   // answer is in the lower half
        }
    }
    // No exact match: $high is now the floor of the square root
    return $high;
}

echo '<pre>';
echo "\nQuestion 7\n";
echo squareRoot(9)."\n";
echo '</pre>';
