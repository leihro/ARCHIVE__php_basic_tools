<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 04.01.15
 * Time: 03:08
 */

/**
 * Class SortCourses
 */
class SortCourses extends SplHeap {
    /**
     * return a MinHeap
     * @param mixed $val1
     * @param mixed $val2
     * @return ints ASC order
     */
    protected function compare($val1, $val2){
        $val1 = (string) $val1->title;
        $val2 = (string) $val2->title;
        if($val1 == $val2){
            return 0;
        } elseif($val1 < $val2){
            return 1;
        } else {
            return -1;

        }
    }
}


//test of xml data
//$data = simplexml_load_file('../../common/data/courses.xml');


//test of json data
$data = file_get_contents('../../common/data/courses.json');
$data = json_decode($data);

/**
 * init a self defined heap, which will sort values automatically
 */
$courses = new SortCourses();
foreach($data as $item){
    // it will sort automatically based on the title of each item
    $courses->insert($item);
}
foreach($courses as $course) {
    echo "<h4>$course->title with $course->author</h4>";
    echo "<p>$course->description</p>";
}
unset($data);
unset($courses);
echo "<hr />";

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