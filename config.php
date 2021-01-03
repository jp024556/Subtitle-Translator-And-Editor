<?php
	// Function to extract base url
	function baseURL(){
	  return sprintf(
	    "%s://%s%s",
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
	}
	// Define constant for base url
	define("BASE_URL", baseURL()."/");
?>