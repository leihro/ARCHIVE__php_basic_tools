<?php

/**
 * setting:
 * 1. max file size for update is $max_file_size = 10MB
 * 2. uploaded file will be moved to $_upload_path
 * 3. only types(png, gif, jpg, jpeg) are allowed
 */
class MyFile
{
    protected $_file_name;
    protected $_file_type;
    protected $_tmp_file;
    protected $_error;
    protected $_file_size;

    // upload path: better not in the public dir and php have access to
    protected $_upload_path = "/Applications/MAMP/htdocs/phpREF/security/file/upload/uploaded_file";
    protected $_file_path;

    // max file size set to 10MB
    public $max_file_size = 10485760; // 10MB in bytes

    // allowd file type
    protected $_file_extension;
    protected $_allowed_mime_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
    protected $_allowed_extensions = ['png', 'gif', 'jpg', 'jpeg', 'PNG', 'GIF', 'JPG', 'JPEG'];
    protected $_check_is_image = true;
    protected $_check_for_php = true;

    /**
     * plain text error for file uploading
     */
    protected function _file_upload_error($error_integer)
    {
        $upload_errors = array(
            UPLOAD_ERR_OK         => "No errors.",
            UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
            UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
            UPLOAD_ERR_PARTIAL    => "Partial upload.",
            UPLOAD_ERR_NO_FILE    => "No file.",
            UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
            UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
            UPLOAD_ERR_EXTENSION  => "File upload stopped by extension.",
        );

        return $upload_errors[$error_integer];
    }

    /**
     * output successful message
     */
    protected function _success_msg()
    {
        $output = "File was uploaded without errors. <br />";
        $output .= "File name is '{$this->_file_name}'.<br />";
        $output .= "Upload file size was {$this->_file_size} bytes. <br />";
        $output .= "Temp file location: {$this->_tmp_file}<br />";

        return $output;
    }

    /**
     * print messages based on upload error
     */
    protected function _report()
    {
        // display error caught by PHP
        if ($this->_error > 0) {
            echo "Error : " . $this->_file_upload_error($this->_error);
        } elseif (!is_uploaded_file($this->_tmp_file)) {
            echo "Error : Does not reference a recently upload file.<br />";
        } elseif (file_exists($this->_file_path)) {
            echo "Error : A file with that name already exists in target location.<br />";
        } elseif ($this->_file_size > $this->max_file_size) {
            echo "Error : File size is too big.<br />";
        } elseif (!in_array($this->_file_type, $this->_allowed_mime_types)) {
            echo "Error : Not an allowed MIME type.<br />";
        } elseif (!in_array($this->_file_extension, $this->_allowed_extensions)) {
            echo "Error : Not an allowed file extension.<br />";
        } elseif ($this->_check_is_image && getimagesize($this->_tmp_file) === false) {
            echo "Error : Not a valid image file.<br />";
        } elseif ($this->_check_for_php && $this->_file_contains_php($this->_tmp_file)) {
            echo "Error : File contains PHP code. <br />";
        } else {
            // Success
            echo $this->_success_msg();
        }
    }

    /**
     * check
     * 1. if there is upload error,
     * 2. if tmp file is the intended upload file
     * 3. if the file already existed at target location
     * 4. if file size is smaller than max file size
     * 5. if file type is in the allowed white list
     * 6. if extension is in the allowed white list
     * 7. if file is image
     * 8. if file contains php
     */
    protected function _has_no_upload_error()
    {
        return !($this->_error > 0) && is_uploaded_file($this->_tmp_file) && !file_exists($this->_file_path && $this->_file_size < $this->max_file_size && (in_array($this->_file_type, $this->_allowed_mime_types)) && (in_array($this->_file_extension, $this->_allowed_extensions)) && ($this->_check_is_image && getimagesize($this->_tmp_file) === true) && ($this->_check_for_php && !$this->_file_contains_php($this->_tmp_file)));
    }

    /**
     * move the file from tmp to target location
     */
    protected function _move()
    {
        if ($this->_has_no_upload_error()) {
            if (move_uploaded_file($this->_tmp_file, $this->_file_path)) {
                echo "File moved to: {$this->_file_path} <br />";
            }
        }
    }

    /**
     * sanitize a file name
     */
    protected function _sanitize_file_name($filename)
    {
        // only number or chars or no more than 1 point
        $filename = preg_replace("/([^A-Za-z0-9_\-\.]|[\.]{2})/", "", $filename);
        // only take the basename other than a path
        $filename = basename($filename);

        return $filename;
    }

    /**
     * get extension of file
     */
    protected function _get_file_extension($file)
    {
        $path_parts = pathinfo($file);

        return $path_parts['extension'];
    }

    /**
     * check if file contains php
     */
    protected function _file_contains_php($file)
    {
        $contents = file_get_contents($file);
        $position = strpos($contents, '<?php');

        return $position !== false;
    }

    /**
     * actions on uploaded files
     */
    public function upload_file($field_name)
    {
        if (isset($_FILES[$field_name])) {
            $this->_file_name = $this->_sanitize_file_name($_FILES[$field_name]['name']);
            $this->_file_extension = $this->_get_file_extension($this->_file_name);
            $uniqid = uniqid('file_', true);
            $this->_file_name = "{$uniqid}.{$this->_file_extension}";

            $this->_file_type = $_FILES[$field_name]['type'];
            $this->_tmp_file = $_FILES[$field_name]['tmp_name'];
            $this->_error = $_FILES[$field_name]['error'];
            $this->_file_size = $_FILES[$field_name]['size'];

            // not use relative file path here.
            $this->_file_path = $this->_upload_path . '/' . $this->_file_name;

            $this->_report();
            $this->_move();
        }
    }
}