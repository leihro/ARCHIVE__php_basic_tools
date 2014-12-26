<?php 
	class MyFile {
		function file_upload_error($error_message){
			$upload_errors = array(
				UPLOAD_ERR_OK			=>	"No errors.",
				UPLOAD_ERR_INI_SIZE		=>	"Larger than upload_max_filesize.",
				UPLOAD_ERR_FORM_SIZE	=>	"Larger than form MAX_FILE_SIZE.",
				UPLOAD_ERR_PARTIAL		=>	"Partial upload.",
				UPLOAD_ERR_NO_FILE		=>	"No file.",
				UPLOAD_ERR_NO_TMP_DIR	=>	"No temporary directory.",
				UPLOAD_ERR_CANT_WRITE	=>	"Can't write to disk.",
				UPLOAD_ERR_EXTENSION	=>	"File upload stopped by extension.",
			);
			return $upload_errors[$error_integer];
		}
		/**
		 * actions on uploaded files
		 */
		function upload_file($field_name) {
			if(isset($_FILES[$field_name])) {
				$file_name = $_FILES[$field_name]['name'];
				$file_type = $_FILES[$field_name]['type'];
				$tmp_file = $_FILES[$field_name]['tmp_name'];
				$error = $_FILES[$field_name]['error'];
				$file_size = $_FILES[$field_name]['size'];

				// display error caught by PHP
				if($error > 0) {
					echo "Error : " . file_upload_error($error);
				} else {
					// Success
					echo "File was uploaded without errors. <br />";
					echo "File name is '{$file_name}'.<br />";
					echo "Upload file size was {$file_size} bytes. <br />";
					echo "Temp file location: {$tmp_file}<br />";
				}
			}
		}
	}
 ?>