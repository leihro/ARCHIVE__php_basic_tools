<?php 
	/**
	 * commonly used functions
	 */

	/**
	 * check if needle is in the haystack
	 * @param  string $haystack 
	 * @param  mixed $needle  
	 * @return boolean         
	 */
	function in_string($haystack, $needle){
		if (strpos($haystack, $needle)===false){
			return false;
		} else {
			return true;
		}
	}
 ?>