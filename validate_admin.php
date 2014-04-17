<!--
Filename: validate_admin.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: Validate the info put into the registration page, and print any error messages if there were things missing. Makes sure the username and email arent already in use.
				  Then sends up the new user to the database
-->
<?php include('php/check_login.php'); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

	<?php include('head.php'); ?>
	
	<body>
	
	<div class="row" id= "main_layout">
		<div class="large-12 columns">
		
		<?php include('header.php'); ?>
		
		<div class="row">
			<div class="large-12 columns">
				<h1>Home Page</h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
					<?php
						//Create a variable we can use to determine if the user input is good or not
						$formOK = true;
						//Create Variables for all the inputs except for confirm password since we only use it once
						$username = $_POST['username'];
						$password = $_POST['password'];
						$email = $_POST['email'];

						//Check for username value

						if (empty($username)) {
							echo 'Username is required</br>';
							$formOK = false;
						}

						//Check for password value
						if (empty($password)) {
							echo 'Password is required</br>';
							$formOK = false;
						}

						//Check for password value
						if ($password != $_POST['confirm_password']) {
							echo 'Passwords do not match</br>';
							$formOK = false;
						}

						//Check for email value
						if (empty($email)) {
							echo 'Email is required</br>';
							$formOK = false;
						}

						//validate email address is properly formatted
						if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
							echo 'E-mail is not valid</br>';
							$formOK = false;
						}

						//make sure email is not already used
						if($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());
							$sql = "SELECT email FROM admins WHERE email = '$email'";
							$result = mysqli_query($conn, $sql);
							$count = mysqli_num_rows($result);
							mysqli_close($conn);

							if($count > 0){
								$formOK = false;
								echo 'Email has been used by another user</br>';
							}
						}

						//make sure username is not already used
						if($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());
							$sql = "SELECT username FROM admins WHERE username = '$username'";
							$result = mysqli_query($conn, $sql);
							$count = mysqli_num_rows($result);
							mysqli_close($conn);

							if($count > 0){
								$formOK = false;
								echo 'Username has been used by another user</br>';
							}
						}


						//If we have both a name and an email value, save the user to the database
						if ($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());

							$sql = "INSERT INTO admins (username, password, email) VALUES ('$username', '$password', '$email')";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							echo 'Registration Successful';
							echo '</br>';
							echo '<a href="index.php">Home Page</a>';
						}
						else {
							echo 'Click <a href="javascript:history.go(-1)">HERE</a> to go back and adjust your entry.';
						}
					?>
				</div>
			</div>
		</div>

		<?php include('footer.php') ?>
		
		</div>
	</div>
	
	<script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	

	</body>

</html>