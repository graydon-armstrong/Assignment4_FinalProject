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
				<h1>Incident Dashboard</h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
					<p>Incident Dashboard Page Stuff Temp</p>
					<a href="add_incident.php">Create New Incident</a>
					<?php
						//create connection to database
						$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts");

						//check for connection errors
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						//select all the contacts from the mysql database
						$sql = "SELECT * FROM incidents WHERE incident_status != 'closed' ORDER BY record_number";
						$result = mysqli_query($conn, $sql) or die('Error querying database.');

						//echo the top of the table
						echo 	'<table border="0">
								<tr><td>Record Number</td><td>Incident Title</td><td>Incident Status</td><td>Incident Priority</td><td>Customer Name</td><td>Timestamp</td></tr>';

						//go through all the results of the sql query and echo the names into the table. Also set the names for a modal
					  	while ($row = mysqli_fetch_array($result))
						{
							echo '<tr><td><a href="incident_update.php?id='. $row['id'] .'">' . $row['record_number'] . '</a></td><td>' . $row['incident_description'] . '</td><td>' . $row['incident_status'] . '</td><td>' . $row['incident_priority'] . '</td><td>' . $row['customer_name'] . '</td><td>' . $row['timestamp'] . '</td></tr>';
					 	}

						//finish the table and close the database connection
						echo '</table>';

						//close the database connection
						mysqli_close($conn);
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