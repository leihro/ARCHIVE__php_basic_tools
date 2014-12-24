<?php 
	// encrypted with mcrypt
	class Crypt {

		//config type and mode
		private $_cipher_type = MCRYPT_RIJNDAEL_256;
		private $_cipher_mode = MCRYPT_MODE_CBC;

		// create initialization vector
		protected function _create_iv(){
			$iv_size = mcrypt_get_iv_size($this->_cipher_type, $this->_cipher_mode);
			$iv = mcrypt_create_iv($iv_size);
			return $iv;
		}

		protected function _get_iv_size(){
			return mcrypt_get_iv_size($this->_cipher_type, $this->_cipher_mode);
		}

		// encrypt a string
		public function encrypt_string($salt, $string){
			$iv = $this->_create_iv();
			$encrypted_string = mcrypt_encrypt($this->_cipher_type, $salt, $string, $this->_cipher_mode, $iv);

			return $iv . $encrypted_string;
		}

		// decrypt a string
		public function decrypt_string($salt, $iv_with_string){
			//get $iv and $encryted parts
			$iv_size = $this->_get_iv_size();
			$iv = substr($iv_with_string, 0, $iv_size);
			$encrypted_string = substr($iv_with_string, $iv_size);

			$original_string = mcrypt_decrypt($this->_cipher_type, $salt, $encrypted_string, $this->_cipher_mode, $iv);

			return $original_string;
		}

		// encode and decode to make it human friendly
		public function encrypt_encode_string($salt, $string){
			return base64_encode($this->encrypt_string($salt, $string));
		}

		public function decrypt_decode_string($salt, $string){
			return $this->decrypt_string($salt, base64_decode($string));
		}
	}
 ?>
