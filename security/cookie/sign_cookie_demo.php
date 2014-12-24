 <?php 
 	require_once "class.sign_cookie.php";

 	$sign = new Sign;
 	$string = "some string will work";

 	echo "Original String: " . $string . "<br>";
 	echo "<br>";
 	$signed_string = $sign->sign_string($string);
 	echo "Signed String: " . $signed_string . "<br>";
	echo "<br>";
 	$valid = $sign->signed_string_is_valid($signed_string);
 	echo "Valid? " . ($valid ? 'true' : 'false') . "<br>";
  ?>