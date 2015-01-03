<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 03.01.15
 * Time: 13:20
 */

/**
 * Class AuthorFilterIterator
 */
class AuthorFilterIterator extends FilterIterator {
    protected $author;

    /**
     * @param Iterator $iterator
     * @param $author
     */
    public function __construct(Iterator $iterator, $author) {
        parent::__construct($iterator);
        $this->author = $author;
    }

    /**
     * @return bool
     */
    public function accept(){
        return $this->current()->author == $this->author;
    }

}

/**
 * test of Array Iterator
 * create AuthorFilterIterator using author attri to filter data in json
 */
//$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');
$courses = file_get_contents('../common/data/courses.json');
$courses = json_decode($courses);
$courses = new ArrayIterator($courses);

$courses = new AuthorFilterIterator($courses, "Kevin Skoglund");
foreach($courses as $course) {
    echo $course->title . " with " . $course->author . "<br />";
}
unset($courses);
echo "<hr />";

/**
 * test of RecursiveArrayIterator
 * print multi-dimensional array based on its structure
 */
$products = array(
    'Cameras'     => array('DSLR', 'smartphone', 'compact'),
    'Lenses'      => array('telephoto', 'wide angle', 'fisheye'),
    'Accessories' => array('tripod', 'camera bag', 'Filters' =>
        array('polarizing', 'UV', 'neutral density')));
$products = new RecursiveArrayIterator($products);
$products = new RecursiveIteratorIterator($products, RecursiveIteratorIterator::SELF_FIRST);
foreach($products as $category => $item) {
    $level = $products->getDepth();
    if($products->hasChildren()){
        echo $level . " : " . $category . "<br />";
    } else {
        echo $level . " : " . $item . "<br />";
    }
}
unset($products);
echo "<hr />";

