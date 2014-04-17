<?php 
	if($loggedin==false) 
	{
		echo('<a href="login.php" style="float:right;" class="button">Login</a>');
	}
	else
	{
		echo('<a href="php/logout.php" style="float:right;" class="button">'.$_SESSION['username'].': Logout</a>');
	}
?>