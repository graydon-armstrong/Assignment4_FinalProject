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
						$incident_narrative = $_POST['incident_narrative'];
						$incident_status = $_POST['incident_status'];
						$id = $_GET['id'];

						//Check for incident description value
						if (empty($incident_narrative)) {
							echo 'Incident Update Comment is required</br>';
							$formOK = false;
						}

						//Check for incident priority value
						if (empty($incident_status)) {
							echo 'Incident Status is required</br>';
							$formOK = false;
						}

						$timestamp = date ("Y-m-d H:i:s", time());

						//If we have all the required fields save to the database
						if ($formOK == true) {
							$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts") or die('Could not connect: ' . mysql_error());

							$sql = "INSERT INTO incident_updates (incident_id,incident_narrative,timestamp) VALUES ('$id', '$incident_narrative','$timestamp')";

							mysqli_query($conn, $sql);

							$sql = "UPDATE incidents SET incident_status='". $incident_status ."' WHERE id='". $id ."'";

							mysqli_query($conn, $sql);

							mysqli_close($conn);
							echo 'Incident Update Successful';
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