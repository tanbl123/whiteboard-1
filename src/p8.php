<?php
require_once __DIR__ . "/helpers.php";
/*
Problem 8 - Anagram Checker

Check whether two strings are anagrams: they contain exactly the same
letters and digits, the same number of times, in any order.

Example: "listen" and "silent" -> true

Rules:
- Case is ignored: "Listen" and "silent" are anagrams.
- Whitespace and punctuation are ignored:
"Conversation" and "Voices, rant on" are anagrams.

Approach:
Each string is normalised and turned into a character count:
1. toLowerString()   - convert to lowercase so 'B' and 'b' match.
2. splitCharacters() - split into whole characters (UTF-8 aware).
3. countCharacters() - count each letter/digit, skipping whitespace
                       and punctuation: ['d' => 2, 'e' => 1, ...].
The two strings are anagrams if their counts are equal.

Lowercasing:
ASCII letters are lowercased manually: uppercase and lowercase letters
differ only by bit 32, so 'A' | ' ' gives 'a'. mb_strtolower() is used
only for multi-byte (Unicode) characters, because case rules differ
between scripts and would be impractical to reproduce by hand.
Problem 8 does not forbid library functions.

The counts are compared with == rather than ===, because the letters
appear in a different order in each string. == checks that both arrays
have the same keys and values in any order; === would also require
the same key order.

Note on Example 4:
The question lists "restful" / "fluster" as NOT anagrams, but both
words contain r, e, s, t, f, u, l exactly once each, so they are
anagrams. This implementation returns true, which is correct by the
question's own definition.

Complexity (n and m = lengths of the two strings):
Time:  O(n^2 + m^2) - countCharacters() uses numberExistence(),
                      which rescans the whole character array for each character.
                      Lowercasing, splitting and comparing the counts are linear.

Space: O(n + m) - the character arrays and count arrays.

*/

//Checks whether two strings are anagrams of each other,
//ignoring case, whitespace and punctuation.
function isAnagram(string $str1, string $str2):bool{
    // Normalise and count the first string
    $str1=toLowerString($str1);
    $char1=splitCharacters($str1);
    $count1=countCharacters($char1);

    // Normalise and count the second string
    $str2=toLowerString($str2);
    $char2=splitCharacters($str2);
    $count2=countCharacters($char2);

    // == compares keys and values, ignoring order
    return $count1==$count2;
}

echo '<pre>';
echo "\nQuestion 8\n";
$str1="Conversation";
$str2="Voices, rant on";
echo (isAnagram($str1, $str2)?"true":"false")."\n";
echo '</pre>';