<?php

namespace Ngmy\ProconLib\Math;

class Combinatorics
{
    /**
     * Calculate combinations (nCr)
     *
     * @param integer $n
     * @param integer $r
     * @return array Combinations
     */
    public function combinations($n, $r)
    {
        if ($n < $r) {
            return [];
        }

        if (!$r) {
            return [[]];
        }

        if ($n === $r) {
            return [range(0, $n - 1)];
        }

        $return = [];
        $n2 = $n - 1;

        foreach ($this->combinations($n2, $r) as $row) {
            $return[] = $row;
        }

        foreach ($this->combinations($n2, $r - 1) as $row) {
            $row[] = $n2;
            $return[] = $row;
        }

        return $return;
    }

    /**
     * Calculate permutations (nPr)
     *
     * @param integer $n
     * @param integer $r
     * @return array Permutations
     */
    public function permutations($n, $r)
    {
        if (!$r || $n < $r) {
            return [];
        }

        $return = [];
        $n2 = $n - 1;

        if ($r === 1) {
            for ($i = 0; $i < $n; $i++) {
                $return[] = [$i];
            }
            return $return;
        }

        foreach ($this->permutations($n2, $r) as $row) {
            $return[] = $row;
        }

        foreach ($this->permutations($n2, $r - 1) as $row) {
            for ($i = 0; $i < $r; $i++) {
                $return[] = array_merge(array_slice($row, 0, $i), [$n2], array_slice($row, $i));
            }
        }

        return $return;
    }
}
