<?php
	//start a session
	session_start();

	//see if the user is logged in to the website and if they are not redirect them to a login screen so they cant access this page
	if(!isset($_SESSION['user_id'])) {
		header("Location: .\login.php");
		//echo 'You must login to see this page. Click <a href="login.php">Login</a> to enter your credentials.';
	}
	else
	{
		$loggedin = true;
	}
?>