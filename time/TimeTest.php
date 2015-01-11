<?php 

class TimeTest extends PHPUnit_Framework_TestCase{
	/**
	 * test of date()
	 */
    public function testDate(){
    	$this->assertEquals('2015-01-11', date('Y-m-d'));
    	$this->assertEquals('2015-01-18', date('Y-m-d', strtotime('+1 week')));
    	$this->assertEquals('Sunday 11th of January 2015 09:12:30 PM', date('l jS \of F Y h:i:s A'));
    	$this->assertEquals('2015-01-18', date('Y-m-d', mktime(0,0,0,18,1,2015)));
    }

}