<?php 
	/**
	 * SQL Injection:
	 * hacker is able to execute arbitrary SQL requests, CRUD data
	 */
	$username = "'someone' or 1=1; --";
	$password = "something";

	$sql_danger = "SELECT * FROM table1 ";
	$sql_danger .= "WHERE  username = {$username} ";
	$sql_danger .= "AND password = {$password}";

	echo $sql_danger;
	// SELECT * FROM table1 WHERE username = 'someone' or 1=1; -- AND password = something
	// password will be ignored
 ?>
 <?php 
	/**
	 * Use Prepared Statement:
	 * secure and better performance
	 */

	/**
	 * die out message based on obj missing
	 * @param Object $obj
	 * @param String $str
	 * @return null
	 */
	function die_not_exist($obj, $str){
		if(!$obj){
			die("$str failed: " . $mysqli_errno . "->" . $mysql_error);
		}
	}
	// 1. Connect
	$mysqli = new mysqli('localhost', 'username', 'password', 'database');
	if($mysqli->connect_errno){
		die("Connect failed: " . $mysqli->connect_errno . $mysqli->connect_error);
	}

	// 2. Prepare
	$sql = "SELECT id, username FROM table1 WHERE username = ? AND password = ?";
	$stmt = $mysqli->prepare($sql);
	die_not_exist($stmt, "Prepare");

	// 3. Bind params
	/**
	 * s = string
	 * i = integer
	 * d = double (float)
	 * b = blob (binary)
	 */
	$username = 'someone';
	$password = 'secret';
	$bind_result = $stmt->bind_param("ss",$username,$password);
	die_not_exist($bind_result, "Binding");

	// 4. Execute
	$execute_result = $stmt->execute();
	die_not_exist($execute_result, "Execute");

	// 5. bind result to vars
	$stmt->bind_result($id, $username);

	// 6. use result
	while ($stmt->fetch()) {
		echo 'ID: ' . $id . '<br />';
		echo 'Username' . $username . '<br />';
	}

	// 7. free and close
	$stmt->free_result();
	$stmt->close();
	$mysqli->close();

  ?>