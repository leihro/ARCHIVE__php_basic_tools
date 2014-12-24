<?php 
	//hash the data, add hash to the end of data
	class Sign {
		private $_salt = "salt"; //improve the security

		public function sign_string($string){
			$checksum = sha1($string.$this->_salt); // or ohter hash algos
			return $string . '--' . $checksum;
		}

		public function signed_string_is_valid($signed_string){
			$arr = explode('--', $signed_string);
			if(count($arr) != 2) {
				return false;
			}
			$new_signed_string = $this->sign_string($arr[0]);
			if($new_signed_string === $signed_string) {
				return true;
			} else {
				return false;
			}
		}
	}
 ?>