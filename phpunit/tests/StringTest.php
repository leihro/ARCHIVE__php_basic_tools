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
     * test of sprintf
     */
    public function testPrintf(){
        $format = "Today is %s, 13.%d.2014";
        $string = "Sunday";
        $month = 11;
        $this->assertEquals("Today is Sunday, 13.11.2014", sprintf($format, $string, $month));
    }

    /**
     * test of strip_tags
     */
    public function testStripTags(){
        $html_text = "<p>foo,<a href = \"somewhere.com\"><b>bar</b></a></p>";
        $this->assertEquals("<p>foo,<a href = \"somewhere.com\">bar</a></p>", strip_tags($html_text, "<p><a>"));
    }

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
    public function testStrPos(){
        $this->assertEquals(1,strpos('haystack', 'a'));
        // use '===' to check strpos
        $this->assertEquals(false,strpos('haystack', 'e'));
    }

    /**
     * test of strrev
     */
    public function testStrRev(){
        $this->assertEquals('abc', strrev('cba'));
    }
    
}