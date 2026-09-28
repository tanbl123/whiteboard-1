<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/p9.php";

class p9Test extends TestCase{
    public function testExample1DToB(): void{
        // expected: True (D --> E --> F --> B)
        $expected = ['exists' => true, 'path' => ['D', 'E', 'F', 'B']];
        $this->assertSame($expected, findPath(exampleGraph(), 'D', 'B'));
    }
    public function testExample2FToA(): void{
        // expected: True (F --> B --> A)
        $expected = ['exists' => true, 'path' => ['F', 'B', 'A']];
        $this->assertSame($expected, findPath(exampleGraph(), 'F', 'A'));
    }
    public function testExample3GToC(): void{
        // expected: False (G has no outgoing edges)
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath(exampleGraph(), 'G', 'C'));
    }
    public function testExample4EToD(): void{
        // expected: True (E --> F --> B --> D)
        $expected = ['exists' => true, 'path' => ['E', 'F', 'B', 'D']];
        $this->assertSame($expected, findPath(exampleGraph(), 'E', 'D'));
    }
    public function testShortestPathChosen(): void{
        // B --> C --> F and B --> E --> F are both 2 steps (shortest);
        // B --> D --> E --> F is 3 steps and must NOT be returned.
        // BFS picks C first because it comes before E in B's neighbour list.
        // expected: True (B --> C --> F)
        $expected = ['exists' => true, 'path' => ['B', 'C', 'F']];
        $this->assertSame($expected, findPath(exampleGraph(), 'B', 'F'));
    }
    public function testShortestPathThroughCycle(): void
    {
        // A <--> B is a cycle; BFS must not loop and must find the
        // shortest route to G.
        // expected: True (A --> B --> D --> G)
        $expected = ['exists' => true, 'path' => ['A', 'B', 'D', 'G']];
        $this->assertSame($expected, findPath(exampleGraph(), 'A', 'G'));
    }
    public function testStartEqualsEnd(): void
    {
        // expected: True (A) - a node can always reach itself
        $expected = ['exists' => true, 'path' => ['A']];
        $this->assertSame($expected, findPath(exampleGraph(), 'A', 'A'));
    }
    public function testFromIsolatedNode(): void
    {
        // expected: False (H has no edges)
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath(exampleGraph(), 'H', 'A'));
    }
    public function testToIsolatedNode(): void
    {
        // expected: False (nothing points to H)
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath(exampleGraph(), 'A', 'H'));
    }
    public function testEndNodeNotInGraph(): void
    {
        // expected: False (Z does not exist in the graph)
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath(exampleGraph(), 'A', 'Z'));
    }
    public function testStartAndEndNotInGraph(): void
    {
        // expected: False (Z does not exist, even though start equals end)
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath(exampleGraph(), 'Z', 'Z'));
    }
    public function testLabelsAreCaseSensitive(): void
    {
        // expected: False ('f' is not the same node as 'F')
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath(exampleGraph(), 'f', 'A'));
    }
    public function testCycleWithUnreachableNode(): void
    {
        // X <--> Y is a cycle and Z is disconnected.
        // BFS must stop instead of looping between X and Y forever.
        // expected: False
        $graph = [
            'X' => ['Y'],
            'Y' => ['X'],
            'Z' => [],
        ];
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath($graph, 'X', 'Z'));
    }
    public function testEmptyGraph(): void
    {
        // expected: False (no nodes at all)
        $expected = ['exists' => false, 'path' => []];
        $this->assertSame($expected, findPath([], 'A', 'B'));
    }
    public function testDisplayPathFound(): void
    {
        // expected output: True (F --> B --> A)
        $this->expectOutputString("True (F --> B --> A)\n");
        displayPath(findPath(exampleGraph(), 'F', 'A'));
    }
    public function testDisplayPathNotFound(): void
    {
        // expected output: False
        $this->expectOutputString("False\n");
        displayPath(findPath(exampleGraph(), 'G', 'C'));
    }

}