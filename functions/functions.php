<?php

class Util {

	/**
	 * commonly used functions
	 */

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