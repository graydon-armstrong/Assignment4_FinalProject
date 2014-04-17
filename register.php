<!--
Filename: register.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: The login page for users
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
				<h1>Register Page</h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
				<form method="post" action="save_admin.php">
					<div>
						<label>Username</label></br>
						<input name="username" maxlength="16" />
					</div>
					<div>
						<label>Password</label></br>
						<input name="password" type="password" maxlength="16" />
					</div>
					<div>
						<label>Confirm Password</label></br>
						<input name="confirm_password" type="password" maxlength="16" />
					</div>
					<div>
						<label>Email</label></br>
						<input name="email" maxlength="100" />
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