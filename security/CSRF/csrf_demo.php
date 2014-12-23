<?php 
/**
 * cross-site request forgery(CSRF) protected by sending a hidden csrf token,
 * this token should be sent back with the form if it is the valid form
 * ohterwise form will not be proceeded
 */
	session_start();
	require_once "csrf_token_functions.php";
	//check post
	if(request_is_post()){
		//check valid csrf token
		if(csrf_token_is_valid()){
			$message = "Valid FROM Submission";
			// check expire or not
			if(csrf_token_is_recent()){
				$message .= " (recent)";
			} else {
				$message .= " ( not recent)";
			}
		} else {
			$message = "CSRF token missing or mismatched";
		}
	} else {
		$message = "not from POST";
	}
 ?>

 <html>
 <head>
 	<title>csrf demo</title>
 </head>
 <body>
 	<p>config message: <?php echo $message; ?></p><br>
 	<p>click submit to post the form</p><br>
 	<form action="" method = "post">
 		<?php echo csrf_token_tag(); ?>
 		<input type = "submit" value = "Submit">
 	</form>
 </body>
 </html>