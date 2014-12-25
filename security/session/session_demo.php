<?php
	require_once "class.mySession.php";
	
	$mysession = new MySession;

	// actions after login or logout
 	if(isset($_GET['action'])){
		if($_GET['action'] == 'login'){
			$mysession->after_successful_login();
		}
		if ($_GET['action'] == 'logout') {
			$mysession->after_successful_logout();
		}
	}

	// print log status
	echo "SESSION ID: " . session_id() . "<br />";
	echo "Logged in: " . ($mysession->is_logged_in() ? 'true' : 'false') . "<br />";
	echo "Session valid: " . ($mysession->is_session_valid() ? 'true' : 'false') . "<br />";
	echo "<br>";

	echo "----- SESSION -----<br>";
	echo "<tt><pre>" . var_export($_SESSION, true) . "</pre></tt>";
	echo "--------------------<br>";
	echo "<br>";

	//simulate new page, login and logout
	echo "<a href = \"?action=new_page\">Simulate a new page request</a><br>";
	echo "<a href = \"?action=login\">Simulate a log in</a><br>";
	echo "<a href = \"?action=logout\">Simulate a log out</a><br>";

 ?>