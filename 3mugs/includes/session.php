<?php 

    session_start();
	
	 
	include ('db.php');

	function logged_in() {
		return isset($_SESSION['username']);
	}

    function confirm_user_logged_in () {
		if (!logged_in()) {
	    header( 'Location: index.html' ) ;
		}
	}
	
	
	function admin_logged_in() {
		//return ((isset($_SESSION['username']))  && ($_SESSION['username'] == "admin")) ;
	     return $_SESSION['username'] == "admin" ;
	}
	
	
	function confirm_admin_logged_in () {
		if (!admin_logged_in()) {
	    header( 'Location: index.html' ) ;
		}
	
	}
	
	
?>  
	