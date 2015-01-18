<?php

class Util {

	/**
	 * commonly used functions
	 */

/*------------------------------------------------------
	STRING
-------------------------------------------------------*/

	/**
	 * check a string if needle is in the haystack
	 * @param  string $haystack 
	 * @param  mixed $needle  
	 * @return boolean         
	 */
	public function in_string($haystack, $needle){
		if (strpos($haystack, $needle)===false){
			return false;
		} else {
			return true;
		}
	}

	/**
	 * check $str starts with $sub
	 * @param  string $str 
	 * @param  string $sub
	 * @return boolean
	 */
	public function start_with($str, $sub){
		return (substr($str, 0, strlen($sub)) === $sub);
	}

	/**
	 * check $str ends with $sub
	 * @param  string $str
	 * @param  string $sub
	 * @return boolean
	 */
	public function end_with($str, $sub){
		return (substr($str, strlen($str)-strlen($sub)) === $sub);
	}	

	/**
	 * explode with multi delimiters
	 * @param  string $delimiters 
	 * @param  string $str        string to be exploded
	 * @return array             string after exploded
	 */
	public function multi_explode($delimiters, $str){
		$replace = str_replace($delimiters, $delimiters[0], $str);
		$result = explode($delimiters[0], $replace);
		return $result;
	}



}
 ?>