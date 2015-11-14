<?php

require 'vendor/autoload.php';

use Ngmy\ProconLib\Math\Combinatorics;

class CombinatoricsTest extends PHPUnit_Framework_TestCase
{
    protected $combinatorics;

    protected function setUp()
    {
        $this->combinatorics = new Combinatorics;
    }

    public function testCombinations()
    {
        $combinations = $this->combinatorics->combinations(3, 2);

        $this->assertCount(3, $combinations);
        $this->assertTrue(in_array([0, 1], $combinations));
        $this->assertTrue(in_array([0, 2], $combinations));
        $this->assertTrue(in_array([1, 2], $combinations));
    }

    public function testPermutations()
    {
        $permutations = $this->combinatorics->permutations(3, 2);

        $this->assertCount(6, $permutations);
        $this->assertTrue(in_array([0, 1], $permutations));
        $this->assertTrue(in_array([0, 2], $permutations));
        $this->assertTrue(in_array([1, 0], $permutations));
        $this->assertTrue(in_array([1, 2], $permutations));
        $this->assertTrue(in_array([2, 0], $permutations));
        $this->assertTrue(in_array([2, 1], $permutations));
    }
}
