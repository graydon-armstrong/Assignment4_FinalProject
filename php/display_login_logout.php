<?php 
	if($loggedin==false) 
	{
		echo('<a href="login.php">Login</a>');
	}
	else
	{
		echo('<a href="php/logout.php">Logout</a>');
	}
?>