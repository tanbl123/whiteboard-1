<?php

/*
Problem 2 - FizzBuzz

For each number from 1 to 100:
- divisible by both 3 and 5 -> "FizzBuzz"
- divisible by 3 only       -> "Fizz"
- divisible by 5 only       -> "Buzz"
- otherwise                 -> the number itself

Approach:
The logic is split into two functions:
- fizzBuzz() converts a single number into its FizzBuzz value.
- displayFizzBuzz() loops from 1 to 100 and joins the values into one comma-separated string.

The "divisible by both 3 and 5" check must come first. If the "divisible by 3" check came 
first, 15 would return "Fizz" and never reach the "FizzBuzz" case.

Time complexity:  O(n) - each number is processed once.
Space complexity: O(n) - the result string grows with n.

*/

//Converts a single number into its FizzBuzz value.
function fizzBuzz(int $num) : string{
    if($num%3===0 && $num%5===0){
        return "FizzBuzz";
    }elseif($num%3===0){
        return "Fizz";
    }elseif($num%5===0){
        return "Buzz";
    }else{
        return (string)$num;
    }
}

//Builds the FizzBuzz result for numbers 1 to 100.
function displayFizzBuzz(): string{
    $str="";
    for($i=1;$i<=100;$i++){
        if($i===100){   //last item don't have comma
            $str.= fizzBuzz($i)."\n";
        }else{
            $str.= fizzBuzz($i).", ";
        }
    }
    return $str;
}

echo '<pre>';
echo "\nQuestion 2\n";
echo displayFizzBuzz();
echo '</pre>';

