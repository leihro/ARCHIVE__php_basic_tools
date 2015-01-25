<?php 

	require_once "functions.php";

	class FunctionsTest extends PHPUnit_Framework_TestCase {
		protected $util;

		protected function setUp(){
			$this->util = new Util();
		}

		/**
		 * @dataProvider inStringProvider
		 */
		public function testInString($haystack, $needle){
			$this->assertTrue($this->util->in_string($haystack, $needle));
		}
		public function inStringProvider(){
			return array(
				array("lei@example.com", "@"),
				array("0", "0")
				);
		}

		public function testMultiDelimiter(){
			$str = 'Tomorrow:is another/day';
			$this->assertEquals(array('Tomorrow','is','another','day'), $this->util->multi_explode(array(':', ' ', '/'), $str));
		}

		/**
		 * @dataProvider subStrStartProvider
		 * @param  string $str 
		 * @param  string $sub 
		 */
		public function testStartWith($str, $sub){
			$this->assertTrue($this->util->start_with($str, $sub));

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
			$this->assertTrue($this->util->end_with($str, $sub));
		}
		public function subStrEndProvider(){
			return array(
				array('Hallo', 'lo'),
				array('node', 'ode')
				);
		}

		public function testSortArray(){
			$this->assertEquals(array(3,2,1), $this->util->sort_array(array(2,3,1)));
			$this->assertEquals(array('c','b','a'), $this->util->sort_array(array('c','a','b')));
		}


	}