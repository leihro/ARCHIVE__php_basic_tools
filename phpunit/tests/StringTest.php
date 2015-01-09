<?php 

class StringTest extends PHPUnit_Framework_TestCase{

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
    
    /**
     * test of substr
     */

    /**
     * test of explode/implode
     */
    
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