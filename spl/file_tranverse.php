<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 31.12.14
 * Time: 12:11
 */

/**
 * test of DirectoryIterator
 * -------------------------
 * 1. Result include . && .. files
 * 2. Keys are number
 * 3. Paths not included in the result
 * 4. No configuration options
 * 5. Array requires cloned objects
 */
$files = new DirectoryIterator('../common/images');
foreach($files as $key => $file){
    if($file->isFile()) {
        echo $key . " : " . $file . "<br />";
        // push obj into arr must use clone method
        $files_arr[] = clone($file);
    }
}
// get the third file name
echo $files_arr[2]->getFilename();

unset($files);
unset($files_arr);
echo "<hr />";

/**
 * test of FilesystemIterator extends DirectoryIterator
 * -------------------------
 * 1. . && .. files are skipped
 * 2. Keys are Pathname
 * 3. Paths included in the result
 * 4. Configurable user Class Constant
 * 5. cloning not necessary
 */
$files = new FilesystemIterator('../common/images');
$files->setFlags(FilesystemIterator::KEY_AS_FILENAME);
foreach($files as $key => $file){
    echo $key . " : " . $file . "<br />";
    $files_arr[] = $file;
}
// get the third file name
echo $files_arr[2]->getFilename();

unset($files);
unset($files_arr);
echo "<hr />";

/**
 * test of RecursiveDirectoryIterator && RecursiveIteratorIterator
 */
$files = new RecursiveDirectoryIterator('../common/');
$files->setFlags(FilesystemIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($files, RecursiveIteratorIterator::SELF_FIRST);
$files->setMaxDepth(1);
foreach($files as $key => $file) {
    echo $file . "<br />";
}

unset($files);
echo "<hr />";