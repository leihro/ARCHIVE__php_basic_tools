<?php 

	require_once "functions.php";

	class FunctionsTest extends PHPUnit_Framework_TestCase {


		/**
		 * @dataProvider inStringProvider
		 */
		public function testInString($haystack, $needle){
            $util = new Util();
			$this->assertTrue($util->in_string($haystack, $needle));
		}

		public function inStringProvider(){
			return array(
				array("lei@example.com", "@"),
				array("0", "0")
				);
		}

		public function testMultiDelimiter(){
            $util = new Util();
			$str = 'Tomorrow:is another/day';
			$this->assertEquals(array('Tomorrow','is','another','day'), $util->multi_explode(array(':', ' ', '/'), $str));
		}
	}