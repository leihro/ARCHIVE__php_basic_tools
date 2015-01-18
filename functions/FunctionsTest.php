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

		/**
		 * @dataProvider subStrStartProvider
		 * @param  string $str 
		 * @param  string $sub 
		 */
		public function testStartWith($str, $sub){
			$util = new Util();
			$this->assertTrue($util->start_with($str, $sub));

		}
		public function subStrStartProvider(){
			return array(
				array('Hallo', 'Ha'),
				array('nodue', 'nodu')
				);
		}

		/**
		 * @dataProvider subStrEndProvider
		 * @param  string $str
		 * @param  string $sub
		 */
		public function testEndWith($str, $sub){
			$util = new Util();
			$this->assertTrue($util->end_with($str, $sub));
		}
		public function subStrEndProvider(){
			return array(
				array('Hallo', 'lo'),
				array('node', 'ode')
				);
		}


	}