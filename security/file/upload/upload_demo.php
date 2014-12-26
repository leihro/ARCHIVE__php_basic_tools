<?php 
	require_once "class.myFile.php";
	$file = new MyFile;
 ?>
 <html>
 <head>
 	<title>File Upload</title>
 </head>
 <body>
 	<form action = "" method = "POST" enctype = "multipart/form-data">
 		<p>Choose a File to upload</p>
 		<input type = "hidden" name = "MAX_FILE_SIZE" value = "<?php echo $file->max_file_size; ?>">
 		<input type = "file" name = "my_file" /><br />
 		<input type = "submit" name = "submit" value = "Upload File" />
 	</form>

 	<?php 
 		echo "<hr />";
 		echo "<tt><pre>" . var_export($_FILES, true) . "</pre></tt>";
 		echo "<hr />";

 		
 		$file->upload_file('my_file');
 	 ?>
 </body>
 </html>