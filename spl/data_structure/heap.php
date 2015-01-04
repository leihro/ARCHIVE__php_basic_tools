<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 04.01.15
 * Time: 03:08
 */

/**
 * MinHeap: binary tree, first value is the smallest
 * MaxHeap: binary tree, first value is the largest
 */
$colors = array('red','blue','orange','black','yellow','green','purple');

$min_heap = new SplMinHeap();
foreach($colors as $color) {
    $min_heap->insert($color);
}

$max_heap = new SplMaxHeap();
foreach($colors as $color) {
    $max_heap->insert($color);
}

echo "<pre>";
print_r($min_heap);
print_r($max_heap);
echo "</pre>";

unset($colors);
unset($min_heap);
unset($max_heap);
echo "<hr />";