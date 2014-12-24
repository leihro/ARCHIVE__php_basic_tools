 <?php 
 	require_once "class.crypt_cookie.php";

 	$my_salt = 'disashdfiahHIHFIauhiH829739hu8df';
 	$test_string = 'I do not want to go to school';
 	$crypt = new Crypt;

 	echo "Original String: " . $test_string . "<br>";
 	echo "<br>";

 	$encrypted_string = $crypt->encrypt_string($my_salt, $test_string);
 	echo "Encrypted String: " . $encrypted_string . "<br>"; 
 	echo "<br>";

 	$decrypted_string = $crypt->decrypt_string($my_salt, $encrypted_string);
 	echo "Decrypted String: " . $decrypted_string . "<br>";
 	echo "<br>";

 	$encrypted_encoded_string = $crypt->encrypt_encode_string($my_salt, $test_string);
 	echo "Encrypted and Encoded String: " . $encrypted_encoded_string . "<br>";
 	echo "<br>";

 	$decrypted_decoded_string = $crypt->decrypt_decode_string($my_salt, $encrypted_encoded_string);
 	echo "Decrypted and Decoded String: " . $decrypted_decoded_string . "<br>";
 	echo "<br>";
 	
  ?>