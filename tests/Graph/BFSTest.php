<?php

use Ngmy\ProconLib\Graph\BFS;

class BFSTest extends PHPUnit_Framework_TestCase
{
    protected $bfs;

    protected $graph;

    protected function setUp()
    {
        $this->bfs = new BFS;

        $this->graph = [
            'A' => ['B', 'C'],
            'B' => ['A', 'D'],
            'D' => ['B'],
            'C' => ['A'],
        ];
    }

    public function testExistsPathShouldReturnTrueWhenPathIsConnected()
    {
        $result = $this->bfs->existsPath($this->graph, 'A', 'D');

        $this->assertTrue($result);
    }

    public function testExistsPath02()
    {
        $result = $this->bfs->existsPath($this->graph, 'A', 'G');

        $this->assertFalse($result);
    }

    public function testGetPath01()
    {
        $path = $this->bfs->getPath($this->graph, 'A', 'D');

        $this->assertEquals(['A', 'B', 'D'], $path);
    }

    public function testGetPath02()
    {
        $path = $this->bfs->getPath($this->graph, 'A', 'G');

        $this->assertFalse($path);
    }
}
