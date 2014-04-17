<!--
Filename: index.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: The home page for the website. Has the tag and mission statements, a more work button, and a slider
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
						$incident_description = $_POST['incident_description'];
						$incident_priority = $_POST['incident_priority'];
						$incident_narrative = $_POST['incident_narrative'];
						$customer_name = $_POST['customer_name'];
						$customer_email = $_POST['customer_email'];

						//Check for incident description value
						if (empty($incident_description)) {
							echo 'Incident Title is required</br>';
							$formOK = false;
						}

						//Check for incident priority value
						if (empty($incident_priority)) {
							echo 'Incident Priority is required</br>';
							$formOK = false;
						}

						//Check for incident narrative value
						if (empty($incident_narrative)) {
							echo 'Incident Comments are required</br>';
							$formOK = false;
						}

						//Check for customer name value
						if (empty($customer_name)) {
							echo 'Customer Name is required</br>';
							$formOK = false;
						}

						//Check for email value
						if (empty($customer_email)) {
							echo 'Customer Email is required</br>';
							$formOK = false;
						}

						//validate email address is properly formatted
						if(!filter_var($customer_email, FILTER_VALIDATE_EMAIL)){
							echo 'CustomerE-mail is not valid</br>';
							$formOK = false;
						}


						$incident_status = 'new';
						$timestamp = date ("Y-m-d H:i:s", time());
						$record_number = date("YmdHis", time()) . '-' . rand(1000,9999);

						//If we have all the required fields save to the database
						if ($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());

							$sql = "INSERT INTO incidents (record_number,incident_description,incident_priority,incident_narrative,incident_status,customer_name,customer_email,timestamp) VALUES ('$record_number','$incident_description', '$incident_priority', '$incident_narrative', '$incident_status', '$customer_name', '$customer_email', '$timestamp')";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							echo 'Incident Creation Successful';
							echo '</br>';
							echo '<a href="incident_dashboard.php">Incident Dashboard</a>';
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