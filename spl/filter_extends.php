<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 03.01.15
 * Time: 11:53
 */

/**
 * Class AuthorFilterIterator
 */
class AuthorFilterIterator extends FilterIterator {
    protected $author;

    public function __construct(Iterator $iterator, $author) {
        parent::__construct($iterator);
        $this->author = $author;
    }

    public function accept(){
        return $this->current()->author == $this->author;
    }

}

/**
 * test of extending FilterIterator
 * create AuthorFilterIterator using author attri to filter data in xml
 */
$courses = simplexml_load_file('../common/data/courses.xml', 'SimpleXMLIterator');
$courses = new AuthorFilterIterator($courses, "Kevin Skoglund");
foreach($courses as $course) {
    echo $course->title . " with " . $course->author . "<br />";
}
unset($courses);
echo "<hr />";


/**
 * Class ExtensionFilter
 */
class ExtensionFilter extends RecursiveFilterIterator {
    protected $extensions;

    /**
     * @param RecursiveIterator $iterator
     * @param $extensions
     */
    public function __construct(RecursiveIterator $iterator, $extensions){
        parent::__construct($iterator);
        $this->extensions = is_array($extensions) ? $extensions : (array) $extensions;
    }

    /**
     * @return bool
     */
    public function accept(){
        if($this->hasChildren()){
            return true;
        }

        return ($this->current()->isFile() && in_array(strtolower($this->current()->getExtension()),$this->extensions));
    }

    /**
     * @return ExtensionFilter
     */
    public function getChildren(){
        return new self($this->getInnerIterator()->getChildren(), $this->extensions);
    }
}

/**
 * test of extending RecursiveFilterIterator
 * get all images under a certain dir
 */
$files = new RecursiveDirectoryIterator('../');
//$files = new ExtensionFilter($files, array('img','png','jpg'));
$files = new ExtensionFilter($files, array('docx','txt'));
$files = new RecursiveIteratorIterator($files);
foreach($files as $file){
    echo $file->getPathname() . "<br />";
}
unset($files);
echo "<hr />";