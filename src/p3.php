<?php
require_once __DIR__ . "/helpers.php";
/*
Problem 3 - Fibonacci Sequence
Generate the first N numbers of the Fibonacci sequence using recursion.
Each number is the sum of the two numbers before it:
0, 1, 1, 2, 3, 5, 8, 13, 21, 34, ...

Approach:
The recursive function builds the sequence step by step. Each call
adds ONE new number to the array and passes the array on to the next
call, until the array holds the requested number of elements.

- Stop condition: the array has reached $totalCount elements (or $totalCount is 0 or negative) -> return the array.
- Empty array    -> add 0 (first Fibonacci number).
- One element    -> add 1 (second Fibonacci number).
- Otherwise      -> add the sum of the last two numbers.

Complexity:
Time:  O(n^2) - there are n recursive calls, and each call counts the array with countArray(), which is O(n).

Space: O(n) recursion depth (n calls waiting on the call stack). Each call may also 
get its own copy of the array when a new number is added, so total memory can grow 
towards O(n^2).

Bonus - Preventing stack overflow for large sequences:
Every recursive call stays on the call stack until the final call
returns, so a very large N (e.g. 100,000) can use up all available
memory. Ways to prevent this:

1. Use an iterative loop instead of recursion. A loop only needs the
   last two numbers, so it runs in O(n) time with no call stack growth.
   This is the most reliable solution.

2. Limit the input size. PHP integers overflow after about 93
   Fibonacci numbers (larger values become imprecise floats), so
   capping N at 93 is sensible anyway.

3. Pass the array by reference (&$arr) and track the length in a
   variable, which avoids copying the array and recounting it on
   every call.

Note: PHP does not optimise tail calls, so rewriting the recursion in
tail-call form alone does not prevent stack overflow in PHP.

*/

//Recursively generates the Fibonacci sequence.
function fibonacci(int $totalCount, array $arr=[]): array{
    if(countArray($arr)===$totalCount || $totalCount<=0){  //stop condition
        return $arr;
    }
    elseif(!$arr){  //if it is empty array
        $arr[]=0;
        return fibonacci($totalCount,$arr);
    }
    elseif(countArray($arr)===1){   //if the array only have one elment
        $arr[]=1;
        return fibonacci($totalCount,$arr);
    }
    else{  
        $arrayLen=countArray($arr);
        $newNum=$arr[$arrayLen-2]+$arr[$arrayLen-1]; //sum of the two preceeding number
        $arr[]=$newNum;
        return fibonacci($totalCount,$arr);
    }
}

function displayFibonacci(int $num){
    $count=0;
    $result=fibonacci($num);
    $totalCount=countArray($result);
    foreach($result as $item){
        $count++;
        if($totalCount===$count){
            echo $item."\n";
        }else{
            echo $item.", ";
        }
    }
}

echo '<pre>';
echo "\nQuestion 3\n";
displayFibonacci(10);
echo '</pre>';
