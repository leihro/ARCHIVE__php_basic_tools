<?php 
	namespace HelloTest;

	use BundleName\Hello\HelloWorld;
	use \PHPUnit_Framework_TestCase;

	class HelloTest extends PHPUnit_Framework_TestCase {
		public function testHello(){
			$hello = new HelloWorld;
			$this->assertEquals("hello", $hello->sayHello());
		}
	}