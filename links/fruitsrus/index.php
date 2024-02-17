<?php if (session_id() == '') session_start();

/*
Filename: index.php
Author: Janet Bott
Date: 27 February 2018
Description: Home page for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "Home";

// import the head section
include "includes/head.php";
?>

	<body>
		<?php
		// import the nav section
		include "includes/nav.php";

		// import the head section
		include "includes/header.php";

		// import the login modal
		include "includes/loginModal.php";
		
		// import the top of page button
		include "includes/topofpagebutton.php";
		?>

		<!-- main content -->
		<section class="container mainContent">

			<!-- introduction row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">Welcome</h1>

					<p>This website is designed to display to students the interaction between a website and its server based database.  Using both PHP and embedded SQL, the various pages interact with the tables in the database to display information or allow certain activities to occur.</p>

					<p>Navigate the website by selecting options via the main menu (above) or the secondary menu (in the footer).</p>

				</section>
			</div> <!-- end of introduction row -->

			<br>

			<!-- contact us and about us row -->
			<div class="row">
				<article id="contactUs" class="col-sm-5 hidden-print">
					<h1 class="text-success">Contact Us</h1>

					<form action="#">
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
						</div>
						<div class="form-group">
							<label for="fname">First Name:</label>
							<input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
						</div>
						<div class="form-group">
							<label for="lname">Last Name:</label>
							<input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
						</div>
						<div class="form-group">
							<label for="comments">Comments:</label>
							<textarea class="form-control" rows="5" id="comments"></textarea>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" name="newsletter"> Subscribe To Email Newsletter</label>
						</div>
						<input type="submit" class="btn btn-default">
					</form>
				</article>

				<article id="aboutUs" class="col-sm-5 col-sm-offset-2">
					<h1 class="text-success">About Us</h1>

					<h3>Fruits 'R' Us</h3>
					<p>1 John Street</p>
					<p>Hawthorn, Victoria 3122</p>

					<br>

					<p><span class="glyphicon glyphicon-earphone"></span> 1234 5678</p>
					<p><span class="glyphicon glyphicon-envelope"></span> enquiries@fruitsrus.com.au</p>

					<br>

					<!-- Add Google Maps -->
					<div id="googleMap" style="height:400px;width:100%;"></div>

					<script>
					function myMap() {
					var myCenter = new google.maps.LatLng(41.878114, -87.629798);
					var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
					var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
					var marker = new google.maps.Marker({position:myCenter});
					marker.setMap(map);
					}
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaP2ZozqDUyBVDuWMmydBQHrgLQkJZrSw&callback=myMap"></script>
					<!--
					To use this code on your website, get a free API key from Google.
					Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
					-->
				</article>
			</div>	<!-- end of contact us and about us row -->


		</section> <!-- end of main content -->

		<!-- import the footer section -->
		<?php  
			//import the social media
			include "includes/socialMedia.php"; 
			//import the footer section 
			include "includes/footer.php";
		?>
	</body>
</html>