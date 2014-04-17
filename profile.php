<!--
Filename: profile.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: When logged in a page that shows the username and email for the user. Also lets you change your password
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
				<h1><?php echo($_SESSION['username'] . "'s User Profile"); ?></h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
					<?php
						//create connection to database
						$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts");

						//check for connection errors
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						$sql = "SELECT email FROM admins WHERE id='". $_SESSION['user_id'] ."'";

						$result = mysqli_query($conn, $sql) or die('Error querying database.');						

						//go through all the results of the sql query and echo the names into the table. Also set the names for a modal
					  	while ($row = mysqli_fetch_array($result))
						{
							echo '<p>Email Address: '. $row['email'] .'</p>';
						}

						//close the database connection
						mysqli_close($conn);
					?>

					<form method="post" action="validate_password_update.php">
						<div>
							<label>Old Password</label></br>
							<input name="oldpassword" type="password" maxlength="16" />
						</div>
						<div>
							<label>New Password</label></br>
							<input name="newpassword" type="password" maxlength="16" />
						</div>
						<div>
							<label>Confirm New Password</label></br>
							<input name="confirm_password" type="password" maxlength="16" />
						</div>
						<input type="submit" value="Submit" />
					</form>

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