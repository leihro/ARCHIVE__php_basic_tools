<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 01.01.15
 * Time: 15:46
 */

/**
 * test of GlobIterator to filter files
 * get a certain type of file
 */
$files = new GlobIterator('../common/images/*.jpg');
foreach($files as $file){
    echo $file->getFilename() . "<br />";
}

unset($files);
echo "<hr />";

/**
 * test of RegexIterator to filter files
 * get all csv and docx files under a certain dir
 */
$files = new RecursiveDirectoryIterator('../common/');
$files = new RecursiveIteratorIterator($files, RecursiveIteratorIterator::SELF_FIRST);
$files = new RegexIterator($files, '/\.(csv|docx)$/i');
foreach($files as $key => $file) {
    if($file->isFile()){
        echo $file . "<br />";
    }
}

unset($files);
echo "<hr />";

/**
 * test of SimpleXmlIterator and LimitIterator
 * get the first 10 courses in an xml file
 */
$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');
// control the range of the iterator result
$courses = new LimitIterator($courses,0,10);
foreach($courses as $course) {
    echo $courses->getPosition() + 1 . ". " . $course->title . " with " . $course->author . "<br >";
}

unset($courses);
echo "<hr />";

/**
 * test of CallbackFilterIterator
 * get all courses and authors with beginner level in an xml file
 */
$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');
$courses = new CallbackFilterIterator($courses, 'getBeginner');
foreach($courses as $course) {
    echo "$course->title with $course->author (level: $course->level)<br />";
}
function getBeginner($current){
    return strtolower($current->level) == 'beginner';
}

unset($courses);
echo "<hr />";

/**
 * test of RecursiveCallbackFilterIterator
 * get all files greater than 6 kb under a certain dir
 */
$files = new RecursiveDirectoryIterator('../common');
$files->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
// current elem, current key and iterator, filter results only when callback function returns true
$files = new RecursiveCallbackFilterIterator($files, function($current, $key, $iterator){
    // hasChildren must be invoked by $iterator
   if($iterator->hasChildren()){
       return true;
   } else {
       // greater than 6 kb
       return $current->getSize() > 1024 * 6;
   }
});
$files = new RecursiveIteratorIterator($files);
foreach($files as $file) {
    echo $file->getPathname() . ' is ' . round($file->getSize()/1024, 1) . 'kb.<br />';
}

unset($files);
echo"<hr />";