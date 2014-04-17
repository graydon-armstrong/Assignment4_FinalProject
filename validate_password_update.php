<!--
Filename: index.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: The home page for the website. Has the tag and mission statements, a more work button, and a slider
-->
<?php include('php/check_login_redirect.php'); ?>
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
						$oldpassword = $_POST['oldpassword'];
						$newpassword = $_POST['newpassword'];
						$id = $_SESSION['user_id'];

						//Check for username value

						if (empty($oldpassword)) {
							echo 'Old Password is required</br>';
							$formOK = false;
						}

						//Check for password value
						if (empty($newpassword)) {
							echo 'New Password is required</br>';
							$formOK = false;
						}

						//Check for password value
						if ($newpassword != $_POST['confirm_password']) {
							echo 'New Passwords do not match</br>';
							$formOK = false;
						}

						//make sure old password is correct
						if($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());
							$sql = "SELECT password FROM admins WHERE id = '$id'";
							$result = mysqli_query($conn, $sql);							

							while ($row = mysqli_fetch_array($result))
							{
								if($row['password']==$oldpassword)
								{
									$formOK = true;
								}
								else
								{
									$formOK = false;
									echo 'Old Password Does Not Match Password in Database</br>';
								}
							}
						 	mysqli_close($conn);
						}


						//If we have both a name and an email value, save the user to the database
						if ($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());

							$sql = "UPDATE admins SET password='". $newpassword ."' WHERE id='". $id ."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							echo 'Password Change Successful';
							echo '</br>';
							echo '<a href="profile.php">Profile</a>';
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