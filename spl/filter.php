<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 01.01.15
 * Time: 15:46
 */

/**
 * test of GlobIterator to filter files
 */
$files = new GlobIterator('../common/images/*.jpg');
foreach($files as $file){
    echo $file->getFilename() . "<br />";
}

unset($files);
echo "<hr />";

/**
 * test of RegexIterator to filter files
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

