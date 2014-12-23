<?php
/**
 * session is optional, both session auth or class auth will work
 *
 */

class Csrf {
	private $_token;
	private $_token_time;
	/**
	 * check if request type
	 *
	 */
	function requist_is_get(){
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}
	function request_is_post(){
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	/**
	 * generate a unique random token
	 */
	function csrf_token(){
		return md5(uniqid(rand(), TRUE));
	}

	/**
	 * generate and store a token in user session
	 */
	function create_csrf_token(){
		$token = $this->csrf_token();
		$_SESSION['csrf_token'] = $this->_token = $token;
		$_SESSION['csrf_token_time'] = $this->_token_time = time();
		return $token;
	}

	/**
	 * destroy a token by removing a from the session
	 */
	function destroy_csrf_token(){
		$_SESSION['csrf_token'] = $this->_token = null;
		$_SESSION['csrf_token_time'] = $this->_token_time = null;
		return true;
	}

	/**
	 * return an HTML tag including the CSRF token
	 * echo csrf_token_tag();
	 */
	function csrf_token_tag(){
		$token = $this->create_csrf_token();
		return "<input type = \"hidden\" name = \"csrf_token\" value = \"" . $token . "\">";
	}

	/**
	 * return true if user's submitted csrf token is identical to the previous stored SESSION one
	 */
	function csrf_token_is_valid(){
		if(isset($_POST['csrf_token'])){
			$user_token = $_POST['csrf_token'];
			$stored_token = $this->_token;//same as: $stored_token = $_SESSION['csrf_token'];
			return $user_token === $stored_token;
		} else {
			return false;
		}
	}

	/**
	 * handle csrf token failure
	 */
	function die_on_csrf_token_failure(){
		if(!$this->csrf_token_is_valid()){
			die("CSRF token validation failed");
		}
	}

	/**
	 * check if csrf token is recent
	 */
	function csrf_token_is_recent(){
		$max_expire = 60 * 60 * 24;
		if(isset($this->_token_time)) {
			$stored_time = $this->_token_time;
			return ($stored_time + $max_expire) >= time();
		} else {
			$this->destroy_csrf_token();
			return false;
		}
	}

}