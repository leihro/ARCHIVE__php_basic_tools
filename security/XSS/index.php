<?php 
	/**
	 * the site will echo value of 'trash' attr from URL
	 * if <script> is included, the js code will be exec
	 * some Browser use XSS Auditor to protect XSS attack
	 * a safe way at server site would be:
	 * never trust user and sanatize any Input from Anywhere
	 * URL, Post, Cookie, Session, DB.
	 */
	echo $_GET['trash'];
	//url: index.php?trash=<script>some JS code</script>
 ?>