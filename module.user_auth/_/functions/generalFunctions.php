<?php 
/**
 * 经常使用的常规methods class
 */

	/**
	 * redirect to another location
	 * @param  url $new_location another location
	 */
	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

	/**
	 * escape a string to render it for SQL
	 * @param  string $string 
	 * @return string
	 */
	function sql_prep($string) {
		global $database;
		if($database) {
			return mysqli_real_escape_string($database, $string);
		} else {
			// addslashes is almost the same, but not quite as secure.
			// Fallback only when there is no database connection available.
		 	return addslashes($string);
		}
	}

	/**
	 * check value是否存在
	 * @param  mixed  $value
	 * @return boolean
	 */
	function has_presence($value) {
		$trimmed_value = trim($value);
	 	return isset($trimmed_value) && $trimmed_value !== "";
	}

	/**
	 * 检查一个value是否有max, min, exact值
	 * @param  string  $value   has length
	 * @param  string  $options max, min or exact
	 * @return boolean
	 * has_length($first_name, ['exact' => 20])
	 * has_length($first_name, ['min' => 5, 'max' => 100])
	 */
	function has_length($value, $options=[]) {
		if(isset($options['max']) && (strlen($value) > (int)$options['max'])) {
			return false;
		}
		if(isset($options['min']) && (strlen($value) < (int)$options['min'])) {
			return false;
		}
		if(isset($options['exact']) && (strlen($value) != (int)$options['exact'])) {
			return false;
		}
		return true;
	}

	/**
	 * 检查一个值是否在max和min的区间中
	 * @param  number  $value  	a number
	 * @param  string  $options max, min
	 * @return boolean
	 */
	function has_number($value, $options=[]) {
		if(!is_numeric($value)) {
			return false;
		}
		if(isset($options['max']) && ($value > (int)$options['max'])) {
			return false;
		}
		if(isset($options['min']) && ($value < (int)$options['min'])) {
			return false;
		}
		return true;
	}

	/**
	 * validate value has a format matching a regular expression
	 * Be sure to use anchor expressions to match start and end of string.
	 * (Use \A and \Z, not ^ and $ which allow line returns.) 
	 * @param  mixed  $value 
	 * @param  regex  $regex 
	 * @return boolean       
	 */
	function has_format_matching($value, $regex='//') {
		return preg_match($regex, $value);
	}

 ?>
