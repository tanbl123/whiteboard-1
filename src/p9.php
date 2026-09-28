<?php
require_once __DIR__ . "/helpers.php";
/*
Problem 9 - Node Path Existence

Given a directed graph, a start node and an end node, return:
1. whether a path exists from start to end, and
2. the path itself, if it exists.
Example: F -> A gives True (F --> B --> A)

Data structure (adjacency list):
The graph is an associative array where each node maps to the list
of nodes it has an arrow pointing to:
  'B' => ['A', 'C', 'D', 'E']   means B -> A, B -> C, B -> D, B -> E

An adjacency list only stores edges that exist, and a node's
neighbours can be read directly with $graph[$node]. Nodes with no
outgoing edges (G, H) are still included, with an empty list.

Node labels are case-sensitive ('f' is not the same node as 'F').

Approach (Breadth-First Search):
BFS explores the graph level by level: first every node 1 step from
the start, then every node 2 steps away, and so on.
- A queue holds the nodes waiting to be explored. Instead of
  removing items with array_shift(), a $head index points at the
  next node to process.

- $visited records nodes already added to the queue, so cycles
  (e.g. A <-> B, or B -> E -> F -> B) cannot cause an infinite loop.

- $parent records which node each node was reached from, so the
  path can be rebuilt once the end node is found.

Shortest path:
Because BFS reaches every node 1 step away before any node 2 steps
away, the first time it reaches the end node is guaranteed to be
along a shortest path (when every edge has the same weight).

A depth-first search would find *a* path, but not necessarily the
shortest one. When several shortest paths exist (e.g. B -> C -> F and
B -> E -> F), the one through the neighbour listed first is returned.

Complexity (V = number of nodes, E = number of edges):
Time:  O(V + E) - each node enters the queue at most once, and each
       edge is checked at most once. Rebuilding the path is O(V).

Space: O(V) - for the queue, $visited, $parent and the path.

*/

//Returns the example graph from the question as an adjacency list.
function exampleGraph():array{
    return [
        'A' => ['B'],
        'B' => ['A', 'C', 'D', 'E'],
        'C' => ['F'],
        'D' => ['E', 'G'],
        'E' => ['F'],
        'F' => ['B', 'G'],
        'G' => [],
        'H' => [],
    ];
}

/*Rebuilds the path from start to end using the $parent records
created during the search.

Walks backwards from the end node, following each node's parent,
until the start node is reached. The nodes are collected in reverse
order, so they are copied into a new array from last to first
(instead of using array_reverse()).

*/
function buildPath(array $parent, string $start, string $end):array{
    $backward = [];
    $node=$end;
    $backward[]=$node;
    // Walk backwards from the end node until the start node is reached.
    // The start node has no parent, so the loop always stops there.
    while($node!==$start){
        $node=$parent[$node];
        $backward[]=$node;
    }
    // $backward is in reverse order (end -> start); copy it last-to-first
    $path=[];
    $arrLen=countArray($backward)-1;
    for($i=$arrLen;$i>=0;$i--){
        $path[]=$backward[$i];
    }
    return $path;
}

//Finds the shortest path between two nodes in a directed graph
//using Breadth-First Search.
function findPath(array $graph, string $start, string $end): array{
    // A node that isn't in the graph cannot be part of any path
    if (!isset($graph[$start]) || !isset($graph[$end])) {
        return ['exists' => false, 'path' => []];
    }
    $queue = [$start];
    $head=0;        // index of the next node to process
    $visited = [$start => true];        // mark start so cycles can't re-add it
    $parent=[];
    while(isset($queue[$head])){
        $current=$queue[$head]; 
        $head++;    
        // BFS reaches the end by the shortest route first
        if($current===$end){

            return ['exists'=>true, 'path'=>buildPath($parent,$start,$end)];
        }
        //find neighbor
        $neighbor=$graph[$current]??[]; // [] if the node has no entry
        foreach ($neighbor as $next){
            // Skip nodes already queued, to avoid loops and repeated work
            if(!isset($visited[$next])){
                $visited[$next]=true;
                $parent[$next]=$current;    // remember how we reached $next
                $queue[]=$next; // explore it after the current level
            }
        }
    }

    // The queue ran out without reaching the end node
    return ['exists' => false, 'path' => []];
}

//Prints a findPath() result in the question's format,
//e.g. "True (F --> B --> A)" or "False".
function displayPath(array $result){
    if($result['exists']){
        echo 'True ';
        echo "(";
        $arrLen=countArray($result['path'])-1;
        $count=0;
        foreach($result['path'] as $item){
            if($count===$arrLen){
                echo $item;
            }else{
                echo $item." --> ";
            }
            $count++;
        }
        echo ")\n";
    }else{
        echo "False\n";
    } 
}

echo '<pre>';
echo "\nQuestion 9\n";
displayPath(findPath(exampleGraph(),'E','D'));
echo '</pre>';