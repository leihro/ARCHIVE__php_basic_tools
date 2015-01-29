<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 08:39
 */

use DesignPatterns\Behavioral\Strategy\ArrayCompare;
use DesignPatterns\Behavioral\Strategy\NumberCompare;
use DesignPatterns\Behavioral\Strategy\StringCompare;

class StrategyPatternTest extends \PHPUnit_Framework_TestCase {
    protected $comparator;

    protected function setUp(){
        $this->comparator= new ArrayCompare();
    }

    public function testStrategy(){
        $this->assertTrue(isset($this->comparator));
        $this->comparator->setComparator(new NumberCompare());
        $this->assertEquals(array(1,2,3), $this->comparator->sort(array(2,3,1)));

        $this->comparator->setComparator(new StringCompare());
        $this->assertEquals(array('a','b','c'), $this->comparator->sort(array('b','a','c')));
    }
} 