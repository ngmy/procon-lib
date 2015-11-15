<?php

namespace Ngmy\ProconLib\Graph;

class BFS
{
    /**
     * Return true if there's a connected path from $start to $end. false otherwise.
     *
     * @param array   $graph
     * @param integer $start
     * @param integer $end
     * @return boolean
     */
    function existsPath($graph, $start, $end) {
        $queue = new \SplQueue;
        $queue->enqueue($start);
        $visited = [$start];

        while ($queue->count() > 0) {
            $node = $queue->dequeue();

            if ($node === $end) {
                return true;
            }

            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;

                    $queue->enqueue($neighbour);
                }
            }
        }

        return false;
    }

    /**
     * Return a path as an array if there's a connected path from $start to $end. false otherwise.
     *
     * @param array   $graph
     * @param integer $start
     * @param integer $end
     * @return array|boolean Path
     */
    function getPath($graph, $start, $end) {
        $queue = new \SplQueue;
        $queue->enqueue([$start]);
        $visited = [$start];

        while ($queue->count() > 0) {
            $path = $queue->dequeue();
            $node = $path[sizeof($path) - 1];

            if ($node === $end) {
                return $path;
            }

            foreach ($graph[$node] as $neighbour) {
                if (!in_array($neighbour, $visited)) {
                    $visited[] = $neighbour;

                    $new_path = $path;
                    $new_path[] = $neighbour;

                    $queue->enqueue($new_path);
                }
            }
        }

        return false;
    }
}
