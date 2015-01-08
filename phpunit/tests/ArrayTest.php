<?php
class ArrayTest extends PHPUnit_Framework_TestCase{
    
    public function testSplice(){
        $arr = array();
        $this->assertEquals(0, count($arr));
        /**
         * init array
         */
        for ($i = 1; $i < 5 ; $i++) { 
            $arr[] = $i;
        }
        $this->assertEquals(4, count($arr));   
        $this->assertEquals(array(1,2,3,4), $arr); 

        /**
         * simulate array_shift and array_unshift
         */
        array_splice($arr, 0, 1);
        $this->assertEquals(array(2,3,4), $arr);
        array_splice($arr, 0, 0, 1);
        $this->assertEquals(array(1,2,3,4), $arr);
        array_shift($arr);
        $this->assertEquals(array(2,3,4), $arr);
        array_unshift($arr, 1);
        $this->assertEquals(array(1,2,3,4), $arr);

        /**
         * simulate array_pop and array_push
         */
        array_splice($arr, -1);
        $this->assertEquals(array(1,2,3), $arr);
        array_splice($arr, count($arr), 0, 4);
        $this->assertEquals(array(1,2,3,4), $arr);
        array_pop($arr);
        $this->assertEquals(array(1,2,3), $arr);
        array_push($arr, 4);
        $this->assertEquals(array(1,2,3,4), $arr);
        /**
         * for general purpose: after 2 elems, replace next 1 elem with target arr  
         */
        array_splice($arr, 2, 1, array(5,6,7));
        $this->assertEquals(array(1,2,5,6,7,4), $arr);

    }
}
?>