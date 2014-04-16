<!--
Filename: header.php
Authors name: Graydon Armstrong
Website name: Graydon Web Design
File Description: This is the header that is included on everypage. It includes the top bar and all the nav links inside it. There is also a php function to get the current page thats loaded and to set the id of current page to the nav button that applies.
-->

<script>
window.mobilecheck = function() {
var check = false;
(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
return check; }

if(window.mobilecheck())
{
	console.log("Mobile");
	<?php
	
	if($_GET['version'] == 'full') {
	$_SESSION['version'] = 'full';
    }
	
	if(!isset($_SESSION['version']))
	{
		$temp = curPageName();
		$temp = substr($temp,0,strlen($temp)-4);
		echo('window.location.href = "mobilesite.html#' . $temp . '";');	
	}
	?>
}
else
{
	console.log("Non-Mobile");
}

</script>

<div class="row" id="header_logo">
		</br>
	<div class="large-12 columns">
		<img src="img/logo.png" width=64 height=64>
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
				<li class="active"><a href="index.php<?php if (isset($_SESSION['version'])) {echo("?version=full");}?>" <?php if(curPageName() =="index.php") {echo('id="current_page"');}?>>Home</a></li>
				<li class="active"><a href="aboutme.php<?php if (isset($_SESSION['version'])) {echo("?version=full");}?>" <?php if(curPageName() =="aboutme.php") {echo('id="current_page"');}?>>About Me</a></li>
				<li class="active"><a href="projects.php<?php if (isset($_SESSION['version'])) {echo("?version=full");}?>" <?php if(curPageName() =="projects.php") {echo('id="current_page"');}?>>Projects</a></li>
				<li class="active"><a href="services.php<?php if (isset($_SESSION['version'])) {echo("?version=full");}?>" <?php if(curPageName() =="services.php") {echo('id="current_page"');}?>>Services</a></li>
				<li class="active"><a href="https://github.com/graydon-armstrong/Assignment1">Github</a></li>
				<li class="active"><a href="contactme.php<?php if (isset($_SESSION['version'])) {echo("?version=full");}?>" <?php if(curPageName() =="contactme.php") {echo('id="current_page"');}?>>Contact Me</a></li>
			</ul>
			</section>
		</nav>
	</div>
</div>