<?php 
	/**
	 * 作用：对于经常使用的Sanitize methods进行简化
	 * 
	 */
	class XssSanitize {

		/**
		 * Sanitize for HTML output
		 * @param  string $string
		 * @return string
		 */
		function h($string) {
			return htmlspecialchars($string);
		}

		/**
		 * Sanitize for JavaScript output
		 * @param  string $string 
		 * @return strign         
		 */
		function j($string) {
			return json_encode($string);
		}

		/**
		 * Sanitize for use in a URL
		 * @param  string $string 
		 * @return string         
		 */
		function u($string) {
			return urlencode($string);
		}
	}
 ?>