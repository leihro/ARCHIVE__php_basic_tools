<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 04.01.15
 * Time: 01:50
 */

/**
 * test of SplDoublyLinkedList
 * use SplDoublyLinkedList to sort xml data
 */
$data = simplexml_load_file('../../common/data/courses.xml');
$courses = new SplDoublyLinkedList();

/**
 * @param $author
 * @return string first name of the author
 */
function getFirstname($author){
    $pos = strrpos($author, ' ');
    return substr($author, 0, $pos);
}

/**
 * insert sort based on first name of author
 */
foreach($data as $item) {
    // init DoublyLinkedList by adding the first item
    if($courses->isEmpty()){
        $courses->push($item);
    } else {
        $first_name = getFirstname($item->author);
        // for each to be inserted item, rewind the iterator to the beginning
        $courses->rewind();
        // there are more item in the DoublyLinkedList && current item is less than or equal to the to be inserted item
        while($courses->valid() && (getFirstname($courses->current()->author) <= $first_name)){
            // next the iterator
            $courses->next();
        }
        // add to be inserted item to the place when the check fails
        $courses->add($courses->key(),$item);
    }
}
/**
 * print in asc order
 */
foreach($courses as $course) {
    echo $course->author . " : " . $course->title . " (" . $course->duration . ").<br />";
}

echo "<hr />";
/**
 * print in dec order and delete DoublyLinkedList after printing
 */
$courses->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_DELETE);
foreach($courses as $course) {
    echo $course->author . " : " . $course->title . " (" . $course->duration . ").<br />";
}

echo "<hr />";
/**
 * check if $courses are deleted
 */
var_dump($courses->isEmpty());