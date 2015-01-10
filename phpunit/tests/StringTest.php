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
     * @dataProvider strReplaceProvider
     */
    public function testStrReplace($search, $replace, $subject, $result){
        $this->assertEquals($result, str_replace($search, $replace, $subject));
    }

    public function strReplaceProvider(){
        return array(
            array('Sunday','Saturday','Tomorrow is Sunday','Tomorrow is Saturday'),
            array(array(1,2,3), 5, 12345, 55545)
            );
    }
    
    /**
     * test of strpos
     */
    
    /**
     * test of strrev
     */
    
}