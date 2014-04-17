<!--
Filename: login.php
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
				<h1>Login Page</h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
				<form method="post" action="validate_login.php">
					<div>
						<label>Username</label></br>
						<input name="username" maxlength="16" />
					</div>
					<div>
						<label>Password</label></br>
						<input name="password" type="password" maxlength="16" />
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