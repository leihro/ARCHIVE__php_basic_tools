<?php
	/**
	 * 作用：常用的Validate函数
	 */
	class Validation {

	 	/**
	 	 * check来自同同一个Domain, 防止request forgery
	 	 * @return boolean
	 	 */
		public function is_from_same_domain(){
			if(!isset($_SERVER['HTTP_REFERER'])) {
				// No refererer sent, so can't be same domain
				return false;
			} else {
				$referer_host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
				$server_host = $_SERVER['HTTP_HOST'];

				return ($referer_host == $server_host) ? true : false;
			}
		}
	} 

 ?>