<?php 
	// hacker can hijack or send back fake session id to the server.
	// solution: use HttpOnly cookies, SSL, secure cookies and only cookies, not POST and GET

	// session setting in php.ini file
	// sessino.cookie_lifetime = 0 // until browser is closed
	// session.cookie_secure = 1 // 0 if not using SSL
	// session.cookie_httponly = 1 // prevent XSS
	// session.use_only_cookies = 1 // ID cannot come from GET or POST, just from cookie
	// session.entropy_file = "/dev/urandom" // add entropy in ID

	session_start();
	class MySession {

		const MAX_ELAPSED = 86400;
		/**
		 * forcibly end the session
		 */
		protected function end_session(){
			//compatibility consideration
			session_unset();
			session_destroy();
		}

		/**
		 * check if request IP match the stored value
		 */
		protected function request_ip_matches_session(){
			if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])){
				return false;
			}
			if($_SESSION['ip'] == $_SERVER['REMOTE_ADDR']){
				return true;
			} else {
				return false;
			}
		}

		/**
		 * check if request user agent match the stored value
		 */
		protected function request_user_agent_matches_session(){
			if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
				return false;
			}
			if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * how long since last login
		 */
		protected function last_login_is_recent(){
			if(!isset($_SESSION['last_login'])){
				return false;
			} 
			if(($_SESSION['last_login'] + self::MAX_ELAPSED) >= time()) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * check if session is valid, remove old session id, check ip and user agent 
		 */
		public function is_session_valid(){
			$is_check_ip = true;
			$is_check_user_agent = true;
			$is_check_last_login = true;

			if($is_check_ip && !$this->request_ip_matches_session()) {
				return false;
			}
			if($is_check_user_agent && !$this->request_user_agent_matches_session()) {
				return false;
			}
			if($is_check_last_login && !$this->last_login_is_recent()) {
				return false;
			}	
			return true;					
		}

		/**
		 * if session is not valid, end the session and user must login first
		 */
		protected function confirm_session_is_valid(){
			if(!$this->is_session_valid()) {
				$this->end_session();
			
				header("Location: login.php");
				exit;
			}
		}

		/**
		 * check if user has already login
		 */
		public function is_logged_in() {
			return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']);
		}

		/**
		 * if user has not logged in, end the session and user must login first
		 */
		protected function confirm_user_logged_in(){
			if(!$this->is_logged_in()) {
				$this->end_session();
			
				header("Location: login.php");
				exit;
			}
		}

		/**
		 * actions after successful_login, set credential session and obj attrs
		 */
		public function after_successful_login(){
			// generate a new session id for user
			session_regenerate_id();

			$_SESSION['logged_in'] = true;

			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION['last_login'] = time();
		}

		/**
		 * actions after successful_logout, reset credential session and obj attrs
		 */
		public function after_successful_logout(){
			$_SESSION['logged_in'] = false;
			// end old session immediately
			$this->end_session();
		}

		/**
		 * actions before accessing any restricted page, this should be abstract here
		 */
		public function before_every_protected_page(){
			$this->confirm_user_logged_in();
			$this->confirm_session_is_valid();
		}

	}