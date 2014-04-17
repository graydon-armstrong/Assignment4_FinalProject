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

		<?php
			$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts");

			//check for connection errors
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			//select all the contacts from the mysql database
			$sql = "SELECT * FROM incidents WHERE id='" . $_GET['id'] . "'";
			$result = mysqli_query($conn, $sql) or die('Error querying database.');

			while ($row = mysqli_fetch_array($result))
			{
				$id = $row['id'];
				$record_number = $row['record_number'];
				$incident_description = $row['incident_description'];
				$incident_priority = $row['incident_priority'];
				$incident_narrative = $row['incident_narrative'];
				$incident_status = $row['incident_status'];
				$customer_name = $row['customer_name'];
				$customer_email = $row['customer_email'];
				$incident_timestamp = $row['timestamp'];
			}

			mysqli_close($conn);
		?>
		
		<div class="row">
			<div class="large-12 columns">
				<h1>Incident <?php echo $record_number; ?></h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
					<?php
						include('php/convert_priority.php');

						echo '<h2>Customer Info</h2>';

						echo '<table border="0">
							<tr><td>Customer Name</td><td>Customer Email</td></tr>
							<tr><td>'. $customer_name .'</td><td>'. $customer_email .'</td></tr>
							</table>';

						echo '<h2>Incident Info</h2>';						

						echo '<table border="0">
							<tr><td>Incident Title</td><td>Incident Comment</td><td>Incident Priority</td><td>Incident Status</td><td>Timestamp</td></tr>
							<tr><td>'. $incident_description .'</td><td>'. $incident_narrative .'</td><td>'. convert_priority($incident_priority) .'</td><td>'. $incident_status .'</td><td>'. $incident_timestamp .'</td></tr>
							</table>';

						//create connection to database
						$conn = mysqli_connect("localhost", "graydonw_admin", "peasoup123", "graydonw_contacts");

						//check for connection errors
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						//select all the contacts from the mysql database
						$sql = "SELECT * FROM incident_updates WHERE incident_id = '". $id ."' ORDER BY id";
						$result = mysqli_query($conn, $sql) or die('Error querying database.');
						$count = mysqli_num_rows($result);

						if($count > 0)
						{
							echo '<h2>Incident Updates</h2>';
							//echo the top of the table
							echo 	'<table border="0">
									<tr><td>Update Comment</td><td>Timestamp</td></tr>';

							//go through all the results of the sql query and echo the names into the table. Also set the names for a modal
						  	while ($row = mysqli_fetch_array($result))
							{
								echo '<tr><td>' . $row['incident_narrative'] . '</td><td>' . $row['timestamp'] . '</td></tr>';
						 	}

							//finish the table and close the database connection
							echo '</table>';
						}

						//close the database connection
						mysqli_close($conn);

						echo '<h2>Update Incident Progress</h2>';
					?>

					<form method="post" action="validate_incident_update.php?id=<?php echo $id; ?>">
						<div>
							</br>
							<label>Incident Comments</label></br>
							<textarea  name="incident_narrative" rows="4" cols="50"></textarea>
						</div>
						<div>
							<label>Incident Status</label></br>
							<select name="incident_status">
								<option value="open" selected>Open</option>
								<option value="inprogress">In-Progress</option>
								<option value="dispatched">Dispatched</option>
								<option value="closed">Closed</option>
							</select>
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