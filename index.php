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
					<p>Welcome to my portfolio site.</p>
					<p>Graydon Armstrong, Web Design Extraordinaire.</p>
					<p>I am a Programming Analyst Student who aspires to run my own business. I want to do web design and programming for clients that is regarded as professional and of high quality. I enjoy programming and the challenges that it gives me from day to day.</p>
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