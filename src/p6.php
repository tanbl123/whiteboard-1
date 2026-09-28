<?php
require_once __DIR__ . "/helpers.php";
/*
Problem 6 - Find Character with Maximum Occurrence
Find the character that appears most often in a string, and return
both the character and its count.
Example: "Hello, world!" -> Character: 'l', Occurrence: 3

Rules:
- Case-sensitive: 'H' and 'h' are counted as different characters.
- Whitespace and punctuation are ignored.
- If several characters share the highest count, the first one found is returned (the question accepts any of them).
- If the string has no letters or digits, the result is ['character' => null, 'count' => 0].

Approach (three steps, each in its own function):
1. splitCharacters()   - split the string into an array of characters.
2. countCharacters()   - count each letter/digit, skipping whitespace
                         and punctuation, using the character as the
                         array key: ['H' => 1, 'l' => 3, ...].
3. findMaxOccurrence() - loop through the counts and keep the
                         character with the highest count.


Complexity (n = number of characters, u = number of unique characters):
Time:  O(n^2) - for each character, numberExistence() scans the whole
       array again to count it. Splitting and finding the maximum
       are O(n) and O(u), so counting dominates.

Space: O(n + u) - the array of characters plus the counts array.

*/

//Finds the character with the highest count.
//On a tie, the first character found is kept.
function findMaxOccurrence(array $counts): array{
    $maxAppearChar=null;
    $maxOccurrence=0;
    foreach ($counts as $char=>$numExist){
        if($numExist>$maxOccurrence){
            // Cast back to string: PHP turns numeric keys like '1' into integers
            $maxAppearChar=(string)$char;
            $maxOccurrence=$numExist;
        }
    }
    return ['character' => $maxAppearChar, 'count' => $maxOccurrence];
}

//Returns the most frequent letter or digit in a string and its count.
function maxOccurringCharacter(string $str): array{
    $chars = splitCharacters($str);
    $counts = countCharacters($chars);
    return findMaxOccurrence($counts);
}

echo '<pre>';
echo "\nQuestion 6\n";
$result = maxOccurringCharacter("Hello, world!");
echo "Character: '" . $result['character'] . "', Occurrence: ". $result['count']."\n";
echo '</pre>';

