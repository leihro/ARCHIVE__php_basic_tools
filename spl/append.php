<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 03.01.15
 * Time: 14:41
 */
class AuthorFilterIterator extends FilterIterator
{
    protected $author;

    public function __construct($iterator, $author)
    {
        parent::__construct($iterator);
        $this->author = $author;
    }

    public function accept()
    {
        return $this->current()->author == $this->author;
    }
}

$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');
$powers = new AuthorFilterIterator($courses, "David Powers");
$peck = new AuthorFilterIterator($courses, "Jon Peck");

/**
 * test of AppendIterator
 * iterate courses by 2 diff authors
 */
$courses = new AppendIterator();
$courses->append($powers);
$courses->append($peck);
$previous = "";
foreach($courses as $course){
    if($previous != $course->author){
        echo "<h3>Courses by " . $course->author . "</h3>";
    }
    echo $course->title . "<br />";
    $previous = (string) $course->author;
}
echo "<hr />";

/**
 * test of MultipleIterator
 */
$multiple = new MultipleIterator(MultipleIterator::MIT_NEED_ANY);
$multiple->attachIterator($powers);
$multiple->attachIterator($peck);
echo "<pre>";
foreach($multiple as $author) {
    echo print_r($multiple);
}
echo "</pre>";