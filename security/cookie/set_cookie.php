<?php
	/**
	 * config setcookie param
	 */
	$name = "somename";
	$value = "value";
	$expire = 60*60*24*7 + time(); // one week from now
	$path = "/"; // /blog or /store can further restrict the use range
	$domain = "www.my_project.com";
	$secure = isset($_SERVER['HTTPS']); // with https only
	$httponly = true; // javascript cannot access cookie
	setcookie($name, $value, $expire, $path, $domain, $secure, $httponly)
 ?>