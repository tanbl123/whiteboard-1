<?php
require_once __DIR__ . "/helpers.php";
require_once __DIR__ . "/p1.php";

/*
Problem 4 - Find List Intersection

Find the values that appear in BOTH lists.
Example: [4, 5, 2, 3, 1, 6] and [8, 7, 6, 9, 4, 5] -> [4, 5, 6]

Approach (nested loops):
For each item in list 1, scan list 2 looking for the same value.
- If a match is found, add it to the result, but only if it is not already there, 
so each common value appears once even when the lists contain duplicates.
- Stop scanning list 2 as soon as a match is found (break),
since there is no need to check the remaining items.
The result keeps the order in which values appear in list 1.

Complexity (n = length of list 1, m = length of list 2, k = number of common values):

Time:  O(n × m) - each item in list 1 may be compared with every item in list 2. 
                  The duplicate check (inArray) scans up to k items, giving O(n × (m + k)) strictly, 
                  but since k can be no larger than the shorter list, it stays quadratic.

Space: O(k) - only the result array grows with the input.

*/

//Returns the unique values found in both arrays, in the order they appear in the first array.
function findIntersection(array $arr1, array $arr2): array{
    $intersect=[];
    foreach($arr1 as $item1){
        foreach($arr2 as $item2){
            if($item1===$item2){
                // Skip values already added, so duplicates appear only once
                if(!inArray($item2,$intersect)){
                    $intersect[]=$item2;
                }
                // Match found - no need to check the rest of list 2
                break;
            }
        }
    }
    return $intersect;
}

$Q4list1=[4, 5, 2, 3, 1, 6];
$Q4list2=[8, 7, 6, 9, 4, 5];

echo '<pre>';
echo "\nQuestion 4\n";
displayArray(sortNumbers(findIntersection($Q4list1,$Q4list2)));
echo '</pre>';