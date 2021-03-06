<!--
Filename: header.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: This is the header that is included on everypage. It includes the top bar and all the nav links inside it. There is also a php function to get the current page thats loaded and to set the id of current page to the nav button that applies.
-->

<div class="row" id="header_logo">
		</br>
	<div class="large-12 columns">
		<img src="images/logo.png" width=64 height=64>
		<?php include('php/display_login_logout.php');?>
	</div>
</div>

<?php
	function curPageName() {
	 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
?>
	
<div class="row">
	<div class="contain-to-grid sticky">	
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
					<h1><a href="index.php?rand=<?php echo rand(); ?>">Graydons Web Design</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
			</ul>
						
			<section class="top-bar-section" id="nav_links">
			<ul class="right">
				<li class="active"><a href="index.php?rand=<?php echo rand(); ?>" <?php if(curPageName() =="index.php") {echo('id="current_page"');}?>>Home</a></li>
				<li class="active"><a href="register.php?rand=<?php echo rand(); ?>" <?php if(curPageName() =="register.php") {echo('id="current_page"');}?>>Register</a></li>
				<li class="active"><a href="profile.php?rand=<?php echo rand(); ?>" <?php if(curPageName() =="profile.php") {echo('id="current_page"');}?>>Profile</a></li>
				<li class="active"><a href="incident_dashboard.php?rand=<?php echo rand(); ?>" <?php if(curPageName() =="incident_dashboard.php") {echo('id="current_page"');}?>>Incident Dashboard</a></li>
			</ul>
			</section>
		</nav>
	</div>
</div>