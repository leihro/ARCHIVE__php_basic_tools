<?php 

class StringTest extends PHPUnit_Framework_TestCase{
    protected $str = 'A new day is comming.';

    /**
     * test of strstr
     */
    public function testStrstr(){
        $email = "lei@example.com";
        $this->assertEquals('@example.com', strstr($email, '@'));
    }

    /**
     * test of strtolower && strtoupper
     */
    public function testStrToLowerAndUpper(){
        $this->assertEquals('A NEW DAY IS COMMING.', strtoupper($this->str));
        $this->assertEquals('a new day is comming.', strtolower($this->str));
    }

    /**
     * test of substr
     */
    public function testSubstr(){
        $this->assertEquals('is comming.', substr($this->str, 10));
    }

    /**
     * test of explode/implode
     */
    public function testExplode(){
        $arr = explode(" ", $this->str);
        $this->assertEquals('new', $arr[1]);
    }
    /**
     * test of nl2br
     */
    
    /**
     * test of sprintf
     */
    
    /**
     * test of strip_tags
     */
    
    /**
     * test of str_replace
     */
    
    /**
     * test of strpos
     */
    
    /**
     * test of strrev
     */
    
}