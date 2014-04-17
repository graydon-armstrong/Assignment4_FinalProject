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
				<h1>Create New Incident</h1>
				<hr />
			</div>
		</div>

		<div class="row">
			<div id="content">
				<div class="large-12 columns">
					<form method="post" action="validate_incident.php">
						<div>
							<label>Incident Title</label></br>
							<input name="incident_description" maxlength="200" />
						</div>
						<div>
							</br>
							<label>Incident Priority</label></br>
							<select name="incident_priority">
								<option value="1" selected>1 - Low Priority</option>
								<option value="2">2 - Medium Priority</option>
								<option value="3">3 - High Priority</option>
								<option value="4">4 - Very High Priority</option>
							</select>
						</div>
						<div>
							</br>
							<label>Customer Name</label></br>
							<input name="customer_name" maxlength="50" />
						</div>
						<div>
							</br>
							<label>Customer Email</label></br>
							<input name="customer_email" maxlength="100" />
						</div>
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