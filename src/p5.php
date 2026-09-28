<?php
require_once __DIR__ . "/helpers.php";
require_once __DIR__ . "/p1.php";
/*
Problem 5 - Find List Symmetric Difference

Find the values that appear in ONE list but not in both.
Example: [4, 5, 2, 3, 1, 6] and [8, 7, 6, 9, 4, 5] -> [1, 2, 3, 7, 8, 9]

Approach (two passes):
1. Loop through list 1 and keep items that are NOT in list 2.
2. Loop through list 2 and keep items that are NOT in list 1.

The two passes never add the same value twice: pass 1 only keeps values missing 
from list 2, while pass 2 only looks at values from list 2.

Duplicates:
If a list contains the same value more than once (e.g. [2, 2, 4]),
each value is added only once, by checking the result with inArray() before adding.

Order:
findSymmetricDifference() returns values in their original order
(list 1's values first, then list 2's). The result is passed through sortNumbers() 
from Problem 1 when displaying and testing.

Complexity (n = length of list 1, m = length of list 2, k = size of the result, 
at most n + m):

Time:  O(n × m) - each item in one list is compared with every item
                  in the other list. The duplicate check adds a scan of the
                  result, but the total stays quadratic.
                  Sorting the result with bubble sort adds O(k^2).

Space: O(k) - only the result array grows with the input.

*/

//Returns the unique values that appear in exactly one of the two arrays.
function findSymmetricDifference(array $arr1, array $arr2): array{
    $difference=[];
    // Pass 1: keep values that are only in list 1
    foreach($arr1 as $item1){
        // Skip values found in list 2, or already added (duplicates)
        if(!inArray($item1,$arr2) && !inArray($item1, $difference)){
            $difference[]=$item1;
        }
    }
    // Pass 2: keep values that are only in list 2
    foreach($arr2 as $item2){   
        if(!inArray($item2,$arr1) && !inArray($item2, $difference)){
            $difference[]=$item2;
        }
    }
    return $difference;
}


$Q5list1=[4, 5, 2, 3, 1, 6];
$Q5list2=[8, 7, 6, 9, 4, 5];

echo '<pre>';
echo "\nQuestion 5\n";
displayArray(sortNumbers(findSymmetricDifference($Q5list1,$Q5list2)));
echo '</pre>';