<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 31.12.14
 * Time: 16:59
 */

/**
 * test methods of SplFileObject
 */
$files = new FilesystemIterator('../common/documents');
foreach($files as $file){
    if($file->getExtension() == 'txt'){
        $text_file = $file->openFile('r+');
        $text_file->setFlags(SplFileObject::DROP_NEW_LINE | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);
        echo '<h2>' . $text_file->getFilename() . '</h2>';
        foreach($text_file as $line) {
            echo $line . "<br />";
        }
        $text_file->seek(4);
        echo "<br />";
        echo "this is the fifth line: ". $text_file->current();
    }
}

unset($files);
echo "<hr />";

/**
 * read file from csv and write into an array
 */
$file = new SplFileObject('../common/data/cars.csv');
// without this flag, target file will be treated as a normal txt file
$file->setFlags(SplFileObject::READ_CSV);
foreach($file as $line){
    $csv_arr[] = $line;
}
echo "<pre>" . var_export($csv_arr, true) . "</pre>";

unset($file);
unset($csv_arr);
echo "<hr />";

