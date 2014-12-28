<?php
/**
 * 作用：use token to check if the submitted form is from the domain we want
 * session is optional, both session auth or class auth will work
 */
class Csrf {

	/**
	 * private token
	 * @var hex
	 */
	private $_token;

	/**
	 * token generate time
	 * @var time
	 */
	private $_token_time;

	/**
	 * check request type
	 * @return boolean if request is get
	 */
	function requist_is_get(){
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}

	/**
	 * check request type
	 * @return boolean if request is post
	 */
	function request_is_post(){
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	/**
	 * generate a random token
	 * @return hex a 32 bit hex number
	 */
	function csrf_token(){
		return md5(uniqid(rand(), TRUE));
	}

	/**
	 * generate and store a token in user session
	 * @return token the token generated
	 */
	function create_csrf_token(){
		$token = $this->csrf_token();
		$_SESSION['csrf_token'] = $this->_token = $token;
		$_SESSION['csrf_token_time'] = $this->_token_time = time();
		return $token;
	}

	/**
	 * destroy a token by removing a from the session
	 * @return boolean the token is destroyed
	 */
	function destroy_csrf_token(){
		$_SESSION['csrf_token'] = $this->_token = null;
		$_SESSION['csrf_token_time'] = $this->_token_time = null;
		return true;
	}

	/**
	 * return an html tag contains the token
	 * @return HTML tag
	 */
	function csrf_token_tag(){
		$token = $this->create_csrf_token();
		return "<input type = \"hidden\" name = \"csrf_token\" value = \"" . $token . "\">";
	}

	/**
	 * check if user's submitted csrf token is identical to the previous stored SESSION one
	 * @return boolean
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
	 * if token is not valid, die a message
	 * @return string
	 */
	function die_on_csrf_token_failure(){
		if(!$this->csrf_token_is_valid()){
			die("CSRF token validation failed");
		}
	}
	 
	/**
	 * check if csrf token is recent
	 * @return boolean
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
