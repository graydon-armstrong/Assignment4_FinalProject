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
					<h1><a href="index.php<?php if (isset($_SESSION['version'])) {echo("?version=full");}?>">Graydons Web Design</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
			</ul>
						
			<section class="top-bar-section" id="nav_links">
			<ul class="right">
				<li class="active"><a href="index.php" <?php if(curPageName() =="index.php") {echo('id="current_page"');}?>>Home</a></li>
				<li class="active"><a href="aboutme.php" <?php if(curPageName() =="aboutme.php") {echo('id="current_page"');}?>>About Me</a></li>
				<li class="active"><a href="projects.php" <?php if(curPageName() =="projects.php") {echo('id="current_page"');}?>>Projects</a></li>
				<li class="active"><a href="services.php" <?php if(curPageName() =="services.php") {echo('id="current_page"');}?>>Services</a></li>
				<li class="active"><a href="https://github.com/graydon-armstrong/Assignment1">Github</a></li>
				<li class="active"><a href="contactme.php" <?php if(curPageName() =="contactme.php") {echo('id="current_page"');}?>>Contact Me</a></li>
			</ul>
			</section>
		</nav>
	</div>
</div>