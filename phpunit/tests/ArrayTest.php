<?php
class ArrayTest extends PHPUnit_Framework_TestCase{

    /**
     * test of array_splice
     */
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

    /**
     * test of array_filter
     */
    public function testFilter(){
        $arr = array(0,1,2,null,false,'','a');
        /**
         * filter: use 'strlen' to remove "false, null and ''"
         */
        //array_values()以数字顺序返回array中全部的值
        $this->assertEquals(array(0,1,2,'a'), array_values(array_filter($arr, 'strlen')));
        /**
         * filter: use anonymous function to remove 'null'
         */
        $arr_without_null = array_filter($arr, function($value){
            return !is_null($value);
        });
        $this->assertEquals(array(0,1,2,false,'','a'), array_values($arr_without_null));

        //$this->assertEquals(array(0,1,2,null,false,'','a'), $arr);
    }

    /**
     * test of array_flip
     */
    public function testFlip(){
        $arr = array("red","blue","yellow");
        $this->assertEquals(array("red"=>0,"blue"=>1,"yellow"=>2),array_flip($arr));
    }

    /**
     * test of array_diff
     */
    public function testDiff(){
        $arr1 = array(1,2,3,4);
        $arr2 = array(1,2);
        $this->assertEquals(array(3,4), array_values(array_diff($arr1, $arr2)));

    }

    /**
     * test of array_intersect
     */
    public function testIntersect(){
        $arr1 = array(1,2,3,4);
        $arr2 = array(1,2);
        $this->assertEquals(array(1,2), array_values(array_intersect($arr1, $arr2)));
    }

    /**
     * test of array_merge
     */
    public function testMerge(){
        $arr1 = array(1,2,3,4);
        $arr2 = array(1 => "apple");
        $this->assertEquals(array(1, 2, 3, 4, "apple"), array_merge($arr1, $arr2));
        $arr3 = array();
        $this->assertEquals(array("apple"), array_merge($arr3, $arr2));
    }

    /**
     * test of in_array
     */
    public function testInArray(){
        $arr = array(1,2,3,4,5);
        $this->assertEquals(true, in_array(1, $arr));
    }

    /**
     * test of array_walk
     */
    // public function testWalk(){
    //     $arr = array("hello","you","thanks");
    //     array_walk($arr, function($value){
    //         return ucfirst($value);
    //     });
    //     $this->assertEquals(array("Hello","You","Thanks"), $arr);
    // }

    /**
     * test of array_search
     */
    
    /**
     * test of array_reverse
     */
}