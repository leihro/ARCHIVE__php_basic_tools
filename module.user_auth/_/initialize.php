<?php

/**
 * 作用: Perform all initialization here, in private
 */

/**
 * define app root and public, private dir
 */
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "/_");
define("PUBLIC_PATH", APP_ROOT . "/public");

session_start();


require_once(PRIVATE_PATH . "/functions/generalFunctions.php");
require_once(PRIVATE_PATH . "/functions/class.Csrf.php");
require_once(PRIVATE_PATH . "/functions/class.Validation.php");
require_once(PRIVATE_PATH . "/functions/class.LoginSession.php");
require_once(PRIVATE_PATH . "/functions/class.XssSanitize.php");

$csrf = isset($csrf) ? $csrf : new Csrf;
$my_session = isset($my_session) ? $my_session : new LoginSession;
$validate = isset($validate) ? $validate : new Validation;
$xss = isset($xss) ? $xss : new XssSanitize;
?>
