<?php 
/**
 * PW principle:
 * 1. never use plain text
 * 2. never store PW that can be decrypted
 * 3. use one-way PW to store and compare encryped PW for verification
 * 4. use salt
 */
 ?>
<html>
<head>
	<title>set password</title>
</head>
<body>

<?php 
if (isset($_POST['submit'])) {
	$password = $_POST['password'];
	echo "Plain Text password: " . $password. "<br>";

	$hashed_password = password_hash($password, PASSWORD_BCRYPT);
	echo "Hashed Password: " . $hashed_password . "<br>";

	$wrong_password = "some_pw";
	$is_match = password_verify($wrong_password, $hashed_password);
	echo ($is_match ? "right password" : "wrong password");
	echo "<br>";

	$is_match = password_verify($password, $hashed_password);
	echo ($is_match ? "right password" : "wrong password");
	echo "<br>";
}
 ?>

<p>Set Password</p>
<form action = "set_pw_demo.php" method = "POST" accept-charset = "utf-8">
	Password: <input type = "password" name = "password" value = "" /><br><br>
	<input type = "submit" name = "submit" value = "Set password">
</form>

</body>
</html>